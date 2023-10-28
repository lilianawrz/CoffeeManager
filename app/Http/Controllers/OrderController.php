<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Client;
use App\Models\Payment;

class OrderController extends Controller
{

    /**
     * Carrega a listagem de dados.
     */
    public function index()
    {
        $orders = Order::all();

        return view('order.list')->with(['orders' => $orders]);

    }

    /**
     * Carrega o formulário.
     */
    public function create()
    {
        $clients = Client::orderBy('name')->get();
        $payments = Payment::orderBy('name')->get();
        return view('order.form')->with(['clients' => $clients, 'payments' => $payments]);

    }

    /**
     * Salva os dados do formulário.
     */
    public function store(Request $request)
    {

        $request->validate([
            'clent_id' => 'required',
            'payment_id' => 'required'
        ], [
            ' client_id.required' => "O :attribute é obrigatório",
            ' payment_id.required' => "O :attribute é obrigatório",

        ]);
        $data = [
            'moment' => $request->moment,
            'status' => $request->status,
            'client_id' => $request->client_id,
            'payment_id' => $request->payment_id,
        ];

        Order::create($data);

        return redirect('order')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Carrega o formulário para edição.
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $clients = Client::orderBy('name')->get();
        $payments = Payment::orderBy('name')->get();

        return view('order.form')->with(['order' => $order, 'clients' => $clients, 'payments' => $payments]);
    }

    /**
     * Atualiza os dados do formulário.
     */
    public function update(Request $request, Order $order)
    {

        $request->validate([
            'client_id' => 'required',
            'payment_id' => 'required'
        ], [
            ' client_id.required' => "O :attribute é obrigatório",
            ' payment_id.required' => "O :attribute é obrigatório",

        ]);
        $data = [
            'moment' => $request->moment,
            'status' => $request->status,
            'client_id' => $request->client_id,
            'payment_id' => $request->payment_id,
        ];



        Order::updateOrCreate(['id' => $request->id], $data);


        return redirect('order')->with('success', "Atualizado com sucesso!");
    }

    /**
     * Remove o registro do banco de dados.
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect('order')->with('success', "Removido com sucesso!");
    }
    public function search(Request $request)
    {

        if (!empty($request->value)) {

            $orders = Order::where($request->type, 'like', "%" . $request->value . "%")->get();
        } else {
            $orders = Order::all();
        }
        return view('order.list')->with(['orders' => $orders]);

    }
}
