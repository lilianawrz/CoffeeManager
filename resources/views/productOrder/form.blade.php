@extends('base.app')
@section('titulo', 'Formulário de produto')
@section('content')

    @if ($errors->any())
        <ul>
            @foreach ($errors->all as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @php
        //  dd($productOrder); //var_dump()
        if (!empty($productOrders->id)) {
            $route = route('productOrder.update', $productOrders->id);
        } else {
            $route = route('productOrder.store');
        }
    @endphp
    <div class="row g-3">
        <div class="col-md-10 p-4">
            <h4>Formulário de produto</h4>
            <div style="padding-top: 10px">
                <form action="{{ $route }}" method="POST" enctype="multipart/form-data"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                    @csrf <!-- cria um hash de segurança-->
                    @if (!empty($productOrders->id))
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <input type="hidden"name="id"
                            value="@if (!empty($productOrders->id)) {{ $productOrders->id }}@elseif(!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">



                        <div class="row">

                            <div class="col-6">
                                <div class="form-label">
                                    <label>Quantidade</label>
                                    <input class="form-control" type="text" name="quantity"
                                        value="@if (!empty($productOrders->quantity)) {{ $productOrders->quantity }}@elseif(!empty(old('quantity'))){{ old('quantity') }}@else{{ '' }} @endif">

                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-label">
                                    <label>Order</label>
                                    <select name="order_id" id="" class="form-control">
                                        @foreach ($order as $item)
                                            <option value="{{ $item->id }}">{{ $item->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-label">
                                    <label>Product</label>
                                    <select name="product_id" id="" class="form-control">
                                        @foreach ($product as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label">
                                    <label>Preço</label>
                                    <input class="form-control" type="text" name="price"
                                        value="@if (!empty($productOrders->price)) {{ $productOrders->price }}@elseif(!empty(old('price'))){{ old('price') }}@else{{ '' }} @endif">

                                </div>
                            </div>




                        </div>

                        <div class="row">
                            <div class="col-1">
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                            <div class="col-1"> <a id="a" class="btn btn-secondary" style="text-decoration:none;"
                                    href="{{ route('productOrder.index') }}">Voltar</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
