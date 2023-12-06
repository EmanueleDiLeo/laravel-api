<header class="">
    <nav class="navbar navbar-dark">
        <div class="container-fluid">
          <a href="{{route('home')}}" target="_black" class="navbar-brand">Home</a>
          <form action="{{route('logout')}}" class="d-flex" role="search" method="POST" >
            @csrf
            <button class="btn btn-light" type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
          </form>
        </div>
      </nav>
</header>
