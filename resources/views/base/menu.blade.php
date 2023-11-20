<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand p-4" href="#">Coffee manager</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ route('estatistic.index') }}" class="nav-link">Estatística</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="companyDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Produtos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="productDropdown">
                        <a class="dropdown-item" href="{{ route('product.create') }}">Novo produto</a>
                        <a class="dropdown-item" href="{{ route('product.index') }}">Produtos</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="companyDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pedidos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="orderDropdown">
                        <a class="dropdown-item" href="{{ route('order.create') }}">Novo pedido</a>
                        <a class="dropdown-item" href="{{ route('order.index') }}">Pedidos</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="companyDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Empresas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="companyDropdown">
                        <a class="dropdown-item" href="{{ route('company.create') }}">Nova empresa</a>
                        <a class="dropdown-item" href="{{ route('company.index') }}">Empresas</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="companyDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Clientes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="clientDropdown">
                        <a class="dropdown-item" href="{{ route('client.create') }}">Novo cliente</a>
                        <a class="dropdown-item" href="{{ route('client.index') }}">Clientes</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">Log in <span aria-hidden="true">&rarr;</span></a>
                </li>
            </ul>
        </div>
    </nav>
</header>