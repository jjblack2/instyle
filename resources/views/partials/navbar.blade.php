{{-- navbar default --}}
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">inStyle88 Studio</a>
        </div>
        @if (Auth::check())
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home <span class="sr-only">(current)</span></a></li>
                    <li class="{{ Request::is('products') ? "active" : "" }}"><a href="{{ route('products.index') }}">Produk</a></li>
                    <li class="{{ Request::is('costumers') ? "active" : "" }}"><a href="{{ route('costumers.index') }}">Costumer</a></li>
                    <li class="{{ Request::is('orders') ? "active" : "" }}"><a href="{{ route('orders.index') }}">Order</a></li>
                    <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="#">Pesanan</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Hello, {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Profil</a></li>
                                <li><a href="{{ route('register') }}">Buat User Baru</a></li>
                                <li><a href="{{ route('categories.index') }}">Tambah Kategori</a></li>
                                <li><a href="{{ route('shippers.index') }}">Tambah Ekspedisi</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('logout') }}">Keluar</a></li>
                            </ul>
                        </li>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-success btn-h1-margin-top-10" role="button" >Masuk</a>
                    @endif

                </ul>
            </div><!-- /.navbar-collapse -->

        @else
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home <span class="sr-only">(current)</span></a></li>
                    <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">About</a></li>
                    <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">Contact</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Hello, {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Profil</a></li>
                                <li><a href="{{ route('register') }}">Buat User Baru</a></li>
                                <li><a href="{{ route('products.create') }}">Buat Produk</a></li>
                                <li><a href="{{ route('products.index') }}">Lihat Produk</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('logout') }}">Keluar</a></li>
                            </ul>
                        </li>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-success btn-h1-margin-top-10" role="button" >Masuk</a>
                    @endif

                </ul>
            </div><!-- /.navbar-collapse -->

        @endif
        <!-- Collect the nav links, forms, and other content for toggling -->

    </div><!-- /.container-fluid -->
</nav>
{{-- end navbar --}}
