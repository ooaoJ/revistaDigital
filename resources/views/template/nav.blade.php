<nav class="navbar navbar-expand-lg bg-body-tertiary w-100">
    <div class="container-fluid d-flex align-items-center justify-content-between w-100">
      <div class="home-nav">
        <a class="home-text" href="{{route('main-page')}}">
          <img src="{{ asset('images/logo/logo-nexus.png')}}" alt="">
          <p>Revista Next</p>
        </a>
      </div>
      <div class=" d-flex align-items-center justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-list fs-1 text-light"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" id="dropdown">
                <li><a href="{{route('perfil-usuario')}}" class="dropdown-item"><i class="bi bi-person"></i> Meu perfil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a href="{{route('main-page')}}#materia-group" class="dropdown-item"><i class="bi bi-book"></i> Matérias</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a href="" class="dropdown-item"><i class="bi bi-people"></i> Aconteceu na escola</a></li>
                <li><hr class="dropdown-divider"></li>
                @if(Auth::user()->nivel === 4)
                    <li><a class="dropdown-item" href="{{route('painel-usuario')}}"><i class="bi bi-person-gear"></i> Gerenciar Usuários</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{route('painel-noticias')}}"><i class="bi bi-newspaper"></i> Gerenciar Notícias</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{route('painel-materias')}}"><i class="bi bi-tags"></i> Gerenciar Matérias</a></li>
                    <li><hr class="dropdown-divider"></li>

                @endif
              <li>
                <form action="{{ route('logout') }}" method="POST" class="dropdown-item leave-button">
                  @csrf
                  <button type="submit" class="botao-logout"><i class="bi bi-door-open"></i> Sair</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
</nav>