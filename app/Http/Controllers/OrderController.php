<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Payment;

class OrderController extends Controller
{
    /**
     * Carrega a listagem de pedidos.
     */
    public function index()
    {
        $order = Order::all();

        return view('order.list')->with(['order' => $order]);
    }

    /**
     * Carrega o formulário de criação de pedido.
     */
    public function create()
    {
        $clients = User::orderBy('name')->get();
        $product = Product::orderBy('name')->get();
        $payments = Payment::orderBy('name')->get();

        return view('order.form')->with(['clients' => $clients, 'product' => $product, 'payments' => $payments]);
    }

    /**
     * Salva os dados do formulário de criação de pedido.
     */
    public function store(Request $request)
    {

        // Validação dos campos
        $request->validate([
            'name' => 'required|max:250',
            'moment' => 'required|date',
            'orderStatus' => 'required|max:250',



        ], [
            // Mensagens de erro personalizadas
            'name.required' => "O campo :attribute é obrigatório.",
            'name.max' => "O campo :attribute deve ter no máximo 250 caracteres.",
            'moment.required' => "O campo :attribute é obrigatório.",
            'moment.date' => "O campo :attribute deve ser uma data válida.",
            'orderStatus.required' => "O campo :attribute é obrigatório.",
            'orderStatus.max' => "O campo :attribute deve ter no máximo 250 caracteres.",


        ]);

        Order::create($request->all());

        return redirect('order')->with('success', "Pedido cadastrado com sucesso!");
    }


    /**
     * Mostra os detalhes de um pedido.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Carrega o formulário de edição de pedido.
     */
    public function edit($id)
    {

        $order = Order::find($id);
        $clients = User::orderBy('name')->get();
        $product = Product::orderBy('name')->get();
        $payments = Payment::orderBy('name')->get();

        return view('order.form')->with([
            'order' => $order,
            'clients' => $clients,
            'product' => $product,
            'payments' => $payments
        ]);
    }

    /**
     * Atualiza os dados do pedido.
     */
    public function update(Request $request, Order $order)
    {
        // Validação dos campos
        $request->validate([
            'name' => 'required|max:250',
            'moment' => 'required|date',
            'orderStatus' => 'required|max:250',


        ], [
            // Mensagens de erro personalizadas
            'name.required' => "O campo :attribute é obrigatório.",
            'name.max' => "O campo :attribute deve ter no máximo 250 caracteres.",
            'moment.required' => "O campo :attribute é obrigatório.",
            'moment.date' => "O campo :attribute deve ser uma data válida.",
            'orderStatus.required' => "O campo :attribute é obrigatório.",
            'orderStatus.max' => "O campo :attribute deve ter no máximo 250 caracteres.",

        ]);

        // Atualize os campos do pedido
        $data = [
            'name' => $request->name,
            'moment' => $request->moment,
            'orderStatus' => $request->orderStatus,
            'product_id' => $request->product_id,
            'client_id' => $request->client_id,
            'payment_id' => $request->payment_id,
        ];

        Order::updateOrCreate(['id' => $request->id], $data);
        return redirect('order')->with('success', "Pedido atualizado com sucesso!");
    }

    /**
     * Remove o pedido do banco de dados.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect('order')->with('success', "Pedido removido com sucesso!");
    }
    public function search(Request $request)
    {

        if (!empty($request->value)) {

            $order = Order::where($request->type, 'like', "%" . $request->value . "%")->get();
        } else {
            $order = Order::all();
        }
        return view('order.list')->with(['order' => $order]);

    }

}
