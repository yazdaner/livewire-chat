<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('task')}}">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('product.index')}}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('chat.index')}}">Chat</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <livewire:cart.header />
               @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">profile</a>
                    </li>
               @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">login</a>
                    </li>
               @endauth

            </ul>
        </div>
    </div>
</nav>
