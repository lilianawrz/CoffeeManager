<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;


class ClientController extends Controller
{

    /**
     * Carrega a listagem de dados.
     */
    public function index()
    {
        $clients = Client::all();

        return view('client.list')->with(['clients' => $clients]);

    }

    /**
     * Carrega o formulário.
     */
    public function create()
    {
        return view('client.form');

    }

    /**
     * Salva os dados do formulário.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:250',
            'cpf' => 'required|max:20'
        ], [
            ' name.required' => "O :attribute é obrigatório",
            ' name.max' => "Só é permitido 250 caracteres no :attribute! ",
            ' cpf.required' => "O :attribute é obrigatório",
            ' cpf.max' => "Só é permitido 350 caracteres no :attribute! ",
        ]);
        $data = [
            'name' => $request->name,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $request->image,
        ];


        $image = $request->file('image');
        //verifica se existe imagem no formulário
        if ($image) {
            $file_name = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $diretory = "image/client/";
            //salva a imagem em uma pasta do sistema.
            $image->storeAs($diretory, $file_name, 'public');

            $data['image'] = $diretory . $file_name;
        }

        client::create($data);

        return redirect('client')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela.
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Carrega o formulário para edição.
     */
    public function edit($id)
    {
        $client = Client::find($id);


        return view('client.form')->with(['client' => $client]);
    }

    /**
     * Atualiza os dados do formulário.
     */
    public function update(Request $request, client $client)
    {

        $request->validate([
            'name' => 'required|max:250',
            'cpf' => 'required|max:20'
        ], [
            ' name.required' => "O :attribute é obrigatório",
            ' name.max' => "Só é permitido 250 caracteres no :attribute! ",
            ' cpf.required' => "O :attribute é obrigatório",
            ' cpf.max' => "Só é permitido 350 caracteres no :attribute! ",
        ]);
        $data = [
            'name' => $request->name,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $request->image,
        ];

        $image = $request->file('image');
        //verifica se existe imagem no formulário
        if ($image) {
            $file_name = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $diretory = "image/client/";
            //salva a imagem em uma pasta do sistema.
            $image->storeAs($diretory, $file_name, 'public');

            $data['image'] = $diretory . $file_name;
        }

        Client::updateOrCreate(['id' => $request->id], $data);

        return redirect('client')->with('success', "Atualizado com sucesso!");
    }

    /**
     * Remove o registro do banco de dados.
     */
    public function destroy($id)
    {
        $clients = Client::find($id);
        $clients->delete();
        return redirect('client')->with('success', "Removido com sucesso!");
    }
    public function search(Request $request)
    {

        if (!empty($request->value)) {

            $clients = Client::where($request->type, 'like', "%" . $request->value . "%")->get();
        } else {
            $clients = Client::all();
        }
        return view('client.list')->with(['clients' => $clients]);

    }
}
