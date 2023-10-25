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
        //  dd($client); //var_dump()
        if (!empty($client->id)) {
            $route = route('client.update', $client->id);
        } else {
            $route = route('client.store');
        }
    @endphp
    <div class="row g-3">
        <div class="col-md-10 p-4">
            <h4>Formulário de cliente</h4>
            <div style="padding-top: 10px">
                <form action="{{ $route }}" method="POST" enctype="multipart/form-data"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                    @csrf <!-- cria um hash de segurança-->
                    @if (!empty($client->id))
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <input type="hidden"name="id"
                            value="@if (!empty($client->id)) {{ $client->id }}@elseif(!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">


                        <label class="form-label">Nome </label>
                        <input type="text" name="name" class="form-control"
                            value="@if (!empty($client->name)) {{ $client->name }}@elseif(!empty(old('name'))){{ old('name') }}@else{{ '' }} @endif">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cpf</label><br>
                        <input type="text" name="cpf" class="form-control"
                            value="@if (!empty($client->cpf)) {{ $client->cpf }}@elseif(!empty(old('cpf'))){{ old('cpf') }}@else{{ '' }} @endif">
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-label">
                                <label>E-mail</label>
                                <input class="form-control" type="email" name="email"
                                    value="@if (!empty($client->email)) {{ $client->email }}@elseif(!empty(old('email'))){{ old('email') }}@else{{ '' }} @endif">

                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-label">
                                <label>Telefone</label>
                                <input class="form-control" type="text" name="phone"
                                    value="@if (!empty($client->phone)) {{ $client->phone }}@elseif(!empty(old('phone'))){{ old('phone') }}@else{{ '' }} @endif">

                            </div>
                        </div>
                    </div>

                    @php
                        $file_name = !empty($product->image) ? $product->image : 'sem_imagem.jpg';
                    @endphp
                    <div class="input-group mb-3">
                        <img class="semimagem" src="/images/{{ $file_name }}" width="150px" alt="image">
                        <div class="input-group mb-3">

                            <div class="custom-file">
                                <input type="file" id='selecao-arquivo' class="inputImage">
                                <label for='selecao-arquivo' class="input-group-text">Upload</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-1">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                        <div class="col-1"> <a id="a" class="btn btn-secondary" style="text-decoration:none;"
                                href="{{ route('client.index') }}">Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
