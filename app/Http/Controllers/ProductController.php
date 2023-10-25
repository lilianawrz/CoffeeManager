<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Company;

class ProductController extends Controller
{

    /**
     * Carrega a listagem de dados.
     */
    public function index()
    {
        $products = Product::all();

        return view('product.list')->with(['products' => $products]);

    }

    /**
     * Carrega o formulário.
     */
    public function create()
    {
        $category = Category::orderBy('name')->get();
        $company = Company::orderBy('name')->get();
        return view('product.form')->with(['category' => $category, 'company' => $company]);

    }

    /**
     * Salva os dados do formulário.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:250',
            'description' => 'required|max:350'
        ], [
            ' name.required' => "O :attribute é obrigatório",
            ' name.max' => "Só é permitido 250 caracteres no :attribute! ",
            ' description.required' => "O :attribute é obrigatório",
            ' description.max' => "Só é permitido 350 caracteres no :attribute! ",
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'limitWeight' => $request->limitWeight,
            'validity' => $request->validity,
            'category_id' => $request->category_id,
            'company_id' => $request->company_id,

        ];

        $image = $request->file('image');
        //verifica se existe imagem no formulário
        if ($image) {
            $file_name = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $diretory = "image/product/";
            //salva a imagem em uma pasta do sistema.
            $image->storeAs($diretory, $file_name, 'public');

            $data['image'] = $diretory . $file_name;
        }

        Product::create($data);

        return redirect('product')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Carrega o formulário para edição.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::orderBy('name')->get();
        $company = Company::orderBy('name')->get();

        return view('product.form')->with(['product' => $product, 'category' => $category, 'company' => $company]);
    }

    /**
     * Atualiza os dados do formulário.
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required|max:250',
            'description' => 'required|max:350'
        ], [
            ' name.required' => "O :attribute é obrigatório",
            ' name.max' => "Só é permitido 250 caracteres no :attribute! ",
            ' description.required' => "O :attribute é obrigatório",
            ' description.max' => "Só é permitido 350 caracteres no :attribute! ",
        ]);
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'limitWeight' => $request->limitWeight,
            'validity' => $request->validity,
            'category_id' => $request->category_id,
            'company_id' => $request->company_id,
            'image' => $request->image,
        ];

        $image = $request->file('image');
        //verifica se existe imagem no formulário
        if ($image) {
            $file_name = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $diretory = "image/product/";
            //salva a imagem em uma pasta do sistema.
            $image->storeAs($diretory, $file_name, 'public');

            $data['image'] = $diretory . $file_name;
        }

        Product::updateOrCreate(['id' => $request->id], $data);

        return redirect('product')->with('success', "Atualizado com sucesso!");
    }

    /**
     * Remove o registro do banco de dados.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('product')->with('success', "Removido com sucesso!");
    }
    public function search(Request $request)
    {

        if (!empty($request->value)) {

            $products = Product::where($request->type, 'like', "%" . $request->value . "%")->get();
        } else {
            $products = Product::all();
        }
        return view('product.list')->with(['products' => $products]);

    }
}
