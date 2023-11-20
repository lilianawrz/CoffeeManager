<?php

namespace App\Http\Controllers;

use App\Models\Company;

use Illuminate\Http\Request;

class CompanyController extends Controller
{


    /**
     * Carrega a listagem de dados.
     */
    public function index()
    {
        $companies = Company::all();

        return view('company.list')->with(['companies' => $companies]);

    }

    /**
     * Carrega o formulário.
     */
    public function create()
    {

        $company = Company::all();
        return view('company.form')->with(['company' => $company]);

    }

    /**
     * Salva os dados do formulário.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:250',
            'cnpj' => 'required|max:25',

        ], [
            ' name.required' => "O :attribute é obrigatório",
            ' name.max' => "Só é permitido 250 caracteres no :attribute! ",
            ' cnpj.required' => "O :attribute é obrigatório",
            ' cnpj.max' => "Só é permitido 25 caracteres no :attribute! ",
        ]);

        $data = [
            'name' => $request->name,
            'cnpj' => $request->cnpj,
            'email' => $request->email,
            'phone' => $request->phone,
            'paymentType' => $request->paymentType,
            'deadline' => $request->deadline,


        ];

        Company::create($data);

        return redirect('company')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Carrega o formulário para edição.
     */
    public function edit($id)
    {
        $company = Company::find($id);


        return view('company.form')->with(['company' => $company]);
    }

    /**
     * Atualiza os dados do formulário.
     */
    public function update(Request $request, Company $company)
    {

        $request->validate([
            'name' => 'required|max:250',
            'cnpj' => 'required|max:15',

        ], [
            ' name.required' => "O :attribute é obrigatório",
            ' name.max' => "Só é permitido 250 caracteres no :attribute! ",
            ' cnpj.required' => "O :attribute é obrigatório",
            ' cnpj.max' => "Só é permitido 15 caracteres no :attribute! ",
        ]);

        $data = [
            'name' => $request->name,
            'cnpj' => $request->cnpj,
            'email' => $request->email,
            'phone' => $request->phone,
            'paymentType' => $request->paymentType,
            'deadline' => $request->deadline,

        ];

        Company::updateOrCreate(['id' => $request->id], $data);

        return redirect('company')->with('success', "Atualizado com sucesso!");
    }

    /**
     * Remove o registro do banco de dados.
     */
    public function destroy($id)
    {
        $companies = Company::find($id);
        $companies->products()->delete();
        $companies->delete();
        return redirect('company')->with('success', "Removido com sucesso!");
    }
    public function search(Request $request)
    {

        if (!empty($request->value)) {

            $companies = Company::where($request->type, 'like', "%" . $request->value . "%")->get();
        } else {
            $companies = Company::all();
        }
        return view('company.list')->with(['companies' => $companies]);

    }
}