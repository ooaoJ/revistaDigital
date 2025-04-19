@include('template.head')
<style>
body, html {
    width: 100%;
    min-height: 100%;
    height: 100%;
}
main {
    min-height: 702px;
}

#modal {
    display: none;
    position: fixed;
    z-index: 999;
    left: 0;
    top: 0;
    width: 100vw;
    height: 100vh;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}
#modal.show {
    display: flex;
}
#modal form {
    background-color: #fff;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    width: 100%;
    max-width: 600px; /* Aumenta a largura no desktop */
    position: relative;
}

.close-modal {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 1.5rem;
    font-weight: bold;
    cursor: pointer;
    color: #aaa;
}
.close-modal:hover {
    color: #333;
}

.user-card {
    margin-bottom: 1rem;
}
.user-card .card-body p {
    margin: 0.25rem 0;
}

@media (max-width: 576px) {
    #modal form {
        max-width: 90%;
        padding: 1rem;
    }
    .close-modal {
        font-size: 1.2rem;
        top: 5px;
        right: 10px;
    }
    main.container {
        padding: 0 1rem;
    }
}

</style>
<body>
  <div class="h-100">
    @include('template.nav')

    <main class="mt-3 mb-5 container">
      <h1 class="mb-2">Exibindo o Painel de Usuários</h1>
      <p class="mb-4">Todos os usuários irão aparecer abaixo no quadro.</p>

      <div class="d-none d-md-block">
        <div class="table-responsive">
          <table class="table table-light table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Criado em</th>
                <th>Nível</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($usuarios as $usuario)
                <tr>
                  <td>{{ $usuario->id }}</td>
                  <td>{{ $usuario->nome }}</td>
                  <td>{{ $usuario->email }}</td>
                  <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                  <td>
                    <form action="{{ route('alterar-nivel', $usuario->id) }}" method="POST">
                      @csrf
                      <select name="nivel" class="form-select" onchange="this.form.submit()">
                        <option value="0" {{ $usuario->nivel == 0 ? 'selected' : '' }}>Usuário</option>
                        <option value="1" {{ $usuario->nivel == 1 ? 'selected' : '' }}>Editor</option>
                        <option value="2" {{ $usuario->nivel == 2 ? 'selected' : '' }}>Moderador</option>
                        <option value="4" {{ $usuario->nivel == 4 ? 'selected' : '' }}>Admin</option>
                      </select>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="d-block d-md-none">
        @foreach ($usuarios as $usuario)
          <div class="card user-card">
            <div class="card-body">
              <h5 class="card-title">{{ $usuario->nome }}</h5>
              <p><strong>ID:</strong> {{ $usuario->id }}</p>
              <p><strong>Email:</strong> {{ $usuario->email }}</p>
              <p><strong>Criado em:</strong> {{ $usuario->created_at->format('d/m/Y') }}</p>
              <form action="{{ route('alterar-nivel', $usuario->id) }}" method="POST">
                @csrf
                <div class="mb-2">
                  <label for="nivel-{{ $usuario->id }}" class="form-label">Nível</label>
                  <select id="nivel-{{ $usuario->id }}" name="nivel" class="form-select" onchange="this.form.submit()">
                    <option value="0" {{ $usuario->nivel == 0 ? 'selected' : '' }}>Usuário</option>
                    <option value="1" {{ $usuario->nivel == 1 ? 'selected' : '' }}>Editor</option>
                    <option value="2" {{ $usuario->nivel == 2 ? 'selected' : '' }}>Moderador</option>
                    <option value="4" {{ $usuario->nivel == 4 ? 'selected' : '' }}>Admin</option>
                  </select>
                </div>
              </form>
            </div>
          </div>
        @endforeach
      </div>

      <button class="btn btn-dark mt-3 mb-5" id="open-modal">Criar um Usuário</button>

      <div id="modal">
        <form action="{{ route('registrar-admin') }}" method="POST">
          @csrf
          <span class="close-modal">&times;</span>
          <h4 class="mb-3">Criar um Usuário</h4>
          <div class="mb-3">
            <input type="text" name="nome" id="nome" placeholder="Nome do usuário" class="form-control">
          </div>
          <div class="mb-3">
            <input type="email" name="email" id="email" placeholder="Email do usuário" class="form-control">
          </div>
          <div class="mb-3">
            <input type="password" name="password" id="password" placeholder="Senha do usuário" class="form-control">
          </div>
          <button class="btn btn-success" type="submit">Enviar <i class="bi bi-send"></i></button>
        </form>
      </div>

    </main>
    @include('template.footer')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const openModalBtn = document.getElementById('open-modal');
      const modal = document.getElementById('modal');
      const closeButton = modal.querySelector('.close-modal');

      openModalBtn.addEventListener('click', () => modal.classList.add('show'));
      closeButton.addEventListener('click', () => modal.classList.remove('show'));
      window.addEventListener('click', e => { if (e.target === modal) modal.classList.remove('show'); });
    });
  </script>
</body>
</html>
