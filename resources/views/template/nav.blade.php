<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand text-primary" href="{{route('main-page')}}">Revista NextUs</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Opçoes
            </a>
            <ul class="dropdown-menu">
                @if(Auth::user()->nivel === 4)
                    <li><a class="dropdown-item" href="{{route('painel-usuario')}}"><i class="bi bi-person-gear"></i> Gerenciar Usuários</a></li>
                @endif
                @if(Auth::user()->nivel >= 1)
                    <li><a class="dropdown-item" href="{{route('painel-noticia')}}"><i class="bi bi-journal"></i> Criar Postagem</a></li>
                @endif
                @if(Auth::user()->nivel >= 2)
                    <li><a class="dropdown-item" href="{{route('painel-noticias')}}"><i class="bi bi-newspaper"></i> Painel Noticias</a></li>
                @endif
              <li><a class="dropdown-item disabled" href="#">Em desenvolvimento...</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item disabled" href="#">Em desenvolvimento...</a></li>
            </ul>
          </li>
        </ul>
        
        <div class="d-flex align-items-center gap-3">
            <span class="text-light d-flex gap-1"><i class="bi bi-person-circle"></i>{{ Auth::user()->nome }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Sair da Conta <i class="bi bi-x-lg"></i></button>
            </form>
        </div>
      </div>
    </div>
</nav>