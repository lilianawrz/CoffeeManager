<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Carrega a listagem de dados.
     */
    public function index()
    {
        $categories = Category::all();

        return view('category.list')->with(['categories' => $categories]);

    }

    /**
     * Carrega o formulário.
     */
    public function create()
    {
        $category = Category::orderBy('name')->get();
        return view('category.form')->with(['category' => $category]);

    }

    /**
     * Salva os dados do formulário.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:250',
        ], [
            ' name.required' => "O :attribute é obrigatório",
            ' name.max' => "Só é permitido 250 caracteres no :attribute! ",
        ]);

        $data = [
            'name' => $request->name,

        ];
        Category::create($data);

        return redirect('category')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Carrega o formulário para edição.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $category = Category::orderBy('name')->get();

        return view('category.form')->with(['category' => $category, 'categorias' => $category]);
    }

    /**
     * Atualiza os dados do formulário.
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            'name' => 'required|max:250',
        ], [
            ' name.required' => "O :attribute é obrigatório",
            ' name.max' => "Só é permitido 250 caracteres no :attribute! ",
        ]);

        $data = [
            'name' => $request->name,

        ];
        Category::updateOrCreate(['id' => $request->id], $data);

        return redirect('category')->with('success', "Atualizado com sucesso!");
    }

    /**
     * Remove o registro do banco de dados.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('category')->with('success', "Removido com sucesso!");
    }
    public function search(Request $request)
    {

        if (!empty($request->value)) {

            $categories = Category::where($request->type, 'like', "%" . $request->value . "%")->get();
        } else {
            $categories = Category::all();
        }
        return view('category.list')->with(['categories$categories' => $categories]);

    }
}
