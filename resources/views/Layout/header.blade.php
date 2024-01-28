<div class="header container-fluid header">
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{route('home')}}">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @guest
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">Store <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('register')}}">Register <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('login')}}">Login <span class="sr-only">(current)</span></a>
                    </li>
                    @endguest

                    @auth
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">Store <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">'!'{{ Auth::user()->name}}'!'</a>
                    </li>
                    <li class="nav-item">
                      <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                      </form>
                    </li>

                    @endauth

                    <li class="nav-item">
                        <a class="nav-link" href="#">Account</a>
                    </li>

    </ul>
            @include('Layout.search-box')
            </div>
        </nav>
    </div>
</div>
