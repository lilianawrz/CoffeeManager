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
        //  dd($company); //var_dump()
        if (!empty($company->id)) {
            $route = route('company.update', $company->id);
        } else {
            $route = route('company.store');
        }
    @endphp
    <div class="row g-3">
        <div class="col-md-10 p-4">
            <h4>Formulário de empresa</h4>
            <div style="padding-top: 10px">
                <form action="{{ $route }}" method="POST" enctype="multipart/form-data"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                    @csrf <!-- cria um hash de segurança-->
                    @if (!empty($company->id))
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <input type="hidden"name="id"
                            value="@if (!empty($company->id)) {{ $company->id }}@elseif(!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">


                        <label class="form-label">Nome </label>
                        <input type="text" name="name" class="form-control"
                            value="@if (!empty($company->name)) {{ $company->name }}@elseif(!empty(old('name'))){{ old('name') }}@else{{ '' }} @endif">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">CNPJ</label><br>
                        <input type="text" name="cnpj" class="form-control"
                            value="@if (!empty($company->cnpj)) {{ $company->cnpj }}@elseif(!empty(old('cnpj'))){{ old('cnpj') }}@else{{ '' }} @endif">
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-label">
                                <label>Tempo de entrega</label>
                                <input class="form-control" type="number" name="delivery"
                                    value="@if (!empty($company->delivery)) {{ $company->delivery }}@elseif(!empty(old('delivery'))){{ old('delivery') }}@else{{ '' }} @endif">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-1">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                        <div class="col-1"> <a id="a" class="btn btn-secondary" style="text-decoration:none;"
                                href="{{ route('company.index') }}">Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
