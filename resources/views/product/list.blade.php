@extends('base.app')
@section('titulo', 'Listagem de produto')
@section('content')
<div class="row g-3">
    <div class="col-md-12 p-4">
        <div style="padding-top: 10px">
            <h3>Listagem de produto</h3>

            <form action="{{ route('product.search') }}" method="POST">
                <div class="row">
                    <div class="col-sm-2">
                        @csrf
                        <select name="type" id="" class="form-control" placeholder="Search" aria-label="Search"
                            aria-describedby="button-addon2">
                            <option value="name">Nome</option>
                            <option value="description">Descrição</option>
                            <option value="price">Preço</option>
                            <option value="category">Categoria</option>


                        </select>
                    </div>
                    <div class="col-sm-6">
                        <input type="search" class="form-control mr-sm-2" placeholder="Search" aria-label="Search"
                            aria-describedby="button-addon2" name="value" />
                    </div>
                    <div class="col-sm-4">
                        <!--Search icon-->
                        <button type="submit" class="btn btn-success">Buscar
                        </button>
                        <a class="btn btn-success" href="{{ route('product.create') }}">Cadastrar</a>
                    </div>
                </div>
            </form>

            <form action="" class="bg-white">


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagem</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Description</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Limite de peso</th>
                            <th scope="col">Validade</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        @php
                        $file_name = !empty($item->image) ? $item->image : 'sem_imagem.jpg';
                        @endphp

                        <tr>
                            <td>{{ $item->id }}</td>
                            <td><img src="/images/{{ $file_name }}" width="100px" alt="image"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->limitWeight }}</td>
                            <td>{{ $item->validity }}</td>
                            <td>{{ $item->category->name ?? '' }}</td>
                            <td>{{ $item->company->name ?? '' }}</td>
                            <td>

                                <a class="btn btn-success" href="{{ route('product.edit', $item->id) }}">Editar</a>
                            </td>
                            <td><a class="btn btn-success" href="{{ route('product.destroy', $item->id) }}"
                                    onclick="return confirm('Deseja excluir?')">Excluir</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection