@extends('base.app')
@section('titulo', 'Listagem')
@section('content')
    <div class="row g-3">
        <div class="col-md-12 p-4">
            <div style="padding-top: 10px">
                <h3>Listagem de produto</h3>

                <form action="{{ route('productOrder.search') }}" method="POST">
                    <div class="row">
                        <div class="col-sm-2">
                            @csrf
                            <select name="type" id="" class="form-control" placeholder="Search" aria-label="Search"
                                aria-describedby="button-addon2">
                                <option value="price">Preço</option>
                                <option value="quantity">Quantidade</option>
                                <option value="order">Pedido</option>
                                <option value="product">Produto</option>


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

                <form action=""class="bg-white">
                    <a class="btn btn-success" href="{{ route('productOrder.create') }}">Cadastrar</a>

                    <table class="table">
                        <thead class="table">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Pedido</th>
                                <th scope="col">Produto</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productOrders as $item)
                            
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->price }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->quantity }}</td>

                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->order->id ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->product->name ?? '' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">

                                        <a href="{{ route('productOrder.edit', $item->id) }}">Editar</a>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4"><a
                                            href="{{ route('productOrder.destroy', $item->id) }}"
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
