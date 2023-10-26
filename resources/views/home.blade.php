@extends('base.app')
@section('titulo', 'Home')
@section('content')


    <div class="row">
        <div class="col-sm-6" id="card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Vendas</h5>
                    <p class="card-text"></p>
                    <a href="{{ route('order.index') }}" class="btn btn-success">Ver pedidos</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6" id="card">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Estoque</h5>
                    <p class="card-text"></p>
                    <a href="{{ route('product.index') }}" class="btn btn-success">Ver produtos</a>
                </div>
            </div>
        </div>

    </div>


@endsection
