@extends('base.app')
@section('titulo', 'Listagem de pedido')
@section('content')
<div class="row g-3">
    <div class="col-md-10 p-4">
        <div style="padding-top: 10px">
            <h3>Listagem de pedidos</h3>

            <form action="{{ route('order.search') }}" method="POST">
                <div class="row">
                    <div class="col-sm-2">
                        @csrf
                        <select name="type" id="" class="form-control" placeholder="Search" aria-label="Search"
                            aria-describedby="button-addon2">
                            <option value="moment">Data</option>
                            <option value="clients">Cliente</option>
                            <option value="payments">Pagamento</option>



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
                        <a class="btn btn-success" href="{{ route('order.create') }}">Cadastrar</a>
                    </div>
                </div>
            </form>


            <form action="" class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>

                            <th scope="col">Data</th>
                            <th scope="col">Status</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Pagamento</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                        <tr class="border-b dark:border-neutral-500">
                            <td>{{ $item->id }}</td>

                            <td>{{ $item->moment }}</td>
                            <td>{{ $item->orderStatus }}</td>
                            <td>{{ $item->client->name ?? '' }}</td>
                            <td>{{ $item->items->name ?? '' }}</td>
                            <td>{{ $item->payment->name ?? '' }}</td>
                            <td class="whitespace-nowrap px-6 py-4"><a
                                    href="{{ route('order.edit', $item->id) }}">Editar</a></td>


                            <td class="whitespace-nowrap px-6 py-4">
                                <a href="{{ route('order.destroy', $item->id) }}"
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