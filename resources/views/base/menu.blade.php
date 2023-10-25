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
                    <a href="{{ route('product.create') }}" class="nav-link">Novo
                        produto</a>
                </li>
                <li class="nav-item">

                    <a href="{{ route('order.create') }}" class="nav-link">Novo
                        pedido</a>
                </li>
                <li class="nav-item">

                    <a href="{{ route('company.create') }}" class="nav-link">Nova
                        empresa</a>
                </li>
                <li class="nav-item">

                    <a href="{{ route('product.index') }}" class="nav-link">Produtos</a>
                </li>
                <li class="nav-item">

                    <a href="{{ route('order.index') }}" class="nav-link">Vendas</a>
                </li>
                <li class="nav-item">

                    <a href="{{ route('company.index') }}" class="nav-link">Empresas</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Log in <span aria-hidden="true">&rarr;</span></a>
                </li>
            </ul>

        </div>
    </nav>
</header>
