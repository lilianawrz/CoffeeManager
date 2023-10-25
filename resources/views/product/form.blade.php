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
        //  dd($product); //var_dump()
        if (!empty($product->id)) {
            $route = route('product.update', $product->id);
        } else {
            $route = route('product.store');
        }
    @endphp
    <div class="row g-3">
        <div class="col-md-10 p-4">
            <h4>Formulário de produto</h4>
            <div style="padding-top: 10px">
                <form action="{{ $route }}" method="POST" enctype="multipart/form-data"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                    @csrf <!-- cria um hash de segurança-->
                    @if (!empty($product->id))
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <input type="hidden"name="id"
                            value="@if (!empty($product->id)) {{ $product->id }}@elseif(!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">


                        <label class="form-label">Nome </label>
                        <input type="text" name="name" class="form-control"
                            value="@if (!empty($product->name)) {{ $product->name }}@elseif(!empty(old('name'))){{ old('name') }}@else{{ '' }} @endif">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrição</label><br>
                        <input type="text" name="description" class="form-control"
                            value="@if (!empty($product->description)) {{ $product->description }}@elseif(!empty(old('description'))){{ old('description') }}@else{{ '' }} @endif">
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-label">
                                <label>Preço</label>
                                <input class="form-control" type="text" name="price"
                                    value="@if (!empty($product->price)) {{ $product->price }}@elseif(!empty(old('price'))){{ old('price') }}@else{{ '' }} @endif">

                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-label">
                                <label>Quantidade</label>
                                <input class="form-control" type="text" name="quantity"
                                    value="@if (!empty($product->quantity)) {{ $product->quantity }}@elseif(!empty(old('quantity'))){{ old('quantity') }}@else{{ '' }} @endif">

                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-label">
                                <label>Categoria </label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-label">
                                <label>Fornecedor</label>
                                <select name="company_id" id="" class="form-control">
                                    @foreach ($company as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-label">
                                <label>Peso limite para reposição (kg)</label>
                                <input class="form-control" type="text" name="limitWeight"
                                    value="@if (!empty($product->limitWeight)) {{ $product->limitWeight }}@elseif(!empty(old('limitWeight'))){{ old('limitWeight') }}@else{{ '' }} @endif">

                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-label">
                                <label>Data de validade</label>
                                <input class="form-control" type="date" name="validity"
                                    value="@if (!empty($product->validity)) {{ $product->validity }}@elseif(!empty(old('validity'))){{ old('validity') }}@else{{ '' }} @endif">

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
                                href="{{ route('product.index') }}">Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
