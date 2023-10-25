<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductOrderController extends Controller
{

    /**
     * Carrega a listagem de dados.
     */
    public function index()
    {
        $productOrders = ProductOrder::all();

        return view('productOrder.list')->with(['productOrders' => $productOrders]);

    }

    /**
     * Carrega o formulário.
     */
    public function create()
    {
        $order = Order::orderBy('id')->get();
        $product = Product::orderBy('name')->get();
        return view('productOrder.form')->with(['order' => $order, 'product' => $product]);

    }

    /**
     * Salva os dados do formulário.
     */
    public function store(Request $request)
    {

        $request->validate([
            'quantity' => 'required|max:250',
            'price' => 'required|max:350'
        ], [
            ' quantity.required' => "O :attribute é obrigatório",
            ' price.required' => "O :attribute é obrigatório",
        ]);

        $data = [

            'price' => $request->price,
            'quantity' => $request->quantity,
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,

        ];


        ProductOrder::create($data);

        return redirect('productOrder')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela.
     */
    public function show(ProductOrder $productOrders)
    {
        //
    }

    /**
     * Carrega o formulário para edição.
     */
    public function edit($id)
    {
        $productOrders = ProductOrder::find($id);
        $order = Order::orderBy('id')->get();
        $product = Product::orderBy('name')->get();

        return view('productOrder.form')->with(['productOrders' => $productOrders, 'order' => $order, 'product' => $product]);
    }

    /**
     * Atualiza os dados do formulário.
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'quantity' => 'required|max:250',
            'price' => 'required|max:350'
        ], [
            ' quantity.required' => "O :attribute é obrigatório",
            ' price.required' => "O :attribute é obrigatório",
        ]);

        $data = [

            'price' => $request->price,
            'quantity' => $request->quantity,
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,

        ];

        ProductOrder::updateOrCreate(['id' => $request->id], $data);

        return redirect('productOrder')->with('success', "Atualizado com sucesso!");
    }

    /**
     * Remove o registro do banco de dados.
     */
    public function destroy($id)
    {
        $productOrders = ProductOrder::find($id);
        $productOrders->delete();
        return redirect('productOrder')->with('success', "Removido com sucesso!");
    }
    public function search(Request $request)
    {

        if (!empty($request->value)) {

            $productOrders = ProductOrder::where($request->type, 'like', "%" . $request->value . "%")->get();
        } else {
            $productOrders = ProductOrder::all();
        }
        return view('productOrder.list')->with(['productOrders' => $productOrders]);

    }
}
