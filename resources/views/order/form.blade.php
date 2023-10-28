@extends('base.app')
@section('titulo', 'Formulário de pedido')
@section('content')

    @if ($errors->any())
        <ul>
            @foreach ($errors->all as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @php
        //  dd($order); //var_dump()
        if (!empty($order->id)) {
            $route = route('order.update', $order->id);
        } else {
            $route = route('order.store');
        }
    @endphp
    <div class="row g-3">
        <div class="col-md-10 p-4">
            <h4>Formulário de produto</h4>
            <div style="padding-top: 10px">
                <form action="{{ $route }}" method="POST" enctype="multipart/form-data"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                    @csrf <!-- cria um hash de segurança-->
                    @if (!empty($order->id))
                        @method('PUT')
                    @endif

                    <input type="hidden"name="id"
                        value="@if (!empty($order->id)) {{ $order->id }}@elseif(!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">


                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Data</label>
                            <input type="date" name="moment" class="form-control"
                                value="@if (!empty($order->moment)) {{ $order->moment }}@elseif(!empty(old('moment'))){{ old('moment') }}@else{{ '' }} @endif">

                        </div>
                        <div class="col-6">
                            <label class="form-label">Status</label><br>
                            <input type="text" name="status" class="form-control"
                                value="@if (!empty($order->status)) {{ $order->status }}@elseif(!empty(old('status'))){{ old('status') }}@else{{ '' }} @endif">
                        </div>

                    </div>
                    <div class="mb-3">
                        <div class="form-label">
                            <label>Cliente </label>
                            <select name="client_id" id="" class="form-control">
                                @foreach ($clients as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">
                            <label>Pagamento</label>
                            <select name="payment_id" id="" class="form-control">
                                @foreach ($payments as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>





                    <div class="row">
                        <div class="col-1">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                        <div class="col-1"> <a id="a" class="btn btn-secondary" style="text-decoration:none;"
                                href="{{ route('order.index') }}">Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
