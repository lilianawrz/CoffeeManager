@extends('base.app')
@section('titulo', 'Listagem de empresas')
@section('content')
    <div class="row g-3">
        <div class="col-md-10 p-4">
            <div style="padding-top: 10px">
                <h3>Listagem de empresas</h3>

                <form action="{{ route('company.search') }}" method="POST">
                    <div class="row">
                        <div class="col-sm-2">
                            @csrf
                            <select name="type" id="" class="form-control" placeholder="Search" aria-label="Search"
                                aria-describedby="button-addon2">
                                <option value="name">Nome</option>
                                <option value="cnpj">CNPJ</option>
                                <option value="delivery">Tempo de entrega</option>



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

                        </div>
                    </div>
                </form>

                <form action=""class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                    <a class="btn btn-success" href="{{ route('company.create') }}">Cadastrar</a>

                    <table class="table">
                        <thead class="table">
                            <tr>
                                <th scope="col">#</th>

                                <th scope="col">Nome</th>
                                <th scope="col">CNPJ</th>
                                <th scope="col">Tempo de entrega</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $item)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->cnpj }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->delivery }}</td>
                                    <td class="whitespace-nowrap px-6 py-4"><a
                                            href="{{ route('company.edit', $item->id) }}">Editar</a>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4"><a
                                            href="{{ route('company.destroy', $item->id) }}"
                                            onclick="return confirm('Deseja excluir?')">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endsection
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
