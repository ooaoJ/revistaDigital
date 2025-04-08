@include('template.head')
<style>
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
    max-width: 400px;
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
</style>
<body>
    <div>
        @include('template.nav')
        
        <main class="mt-3 container">
            <h1>Exibindo o Painel de Usuarios</h1>
            <p>Todos os usuarios irão aparecer abaixo no quadro.</p>

            <table class="table table-light table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Criado em</th>
                        <th>Nivel</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->nome}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->created_at->format('d/m/Y')}}</td>
                            <td>
                                <form action="{{route('alterar-nivel', $usuario->id) }}" method="POST">
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
            <button class="btn btn-dark" id="open-modal">Criar um Usuário</button>
            <div id="modal">
                <form action="{{route('registrar-admin')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="nome" id="nome" placeholder="Nome do usuário" class="form-control title-input">
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" id="email" placeholder="Email do usuário" class="form-control title-input">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" id="password" placeholder="Senha do usuário" class="form-control title-input">
                    </div>
                    <button class="btn btn-success" type="submit">Enviar <i class="bi bi-send"></i></button>
                </form>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const openModalBtn = document.getElementById('open-modal');
            const modal = document.getElementById('modal');

            // Cria um botão para fechar o modal
            const closeButton = document.createElement('span');
            closeButton.innerHTML = '&times;';
            closeButton.classList.add('close-modal');
            modal.prepend(closeButton);

            openModalBtn.addEventListener('click', () => {
                modal.classList.add('show');
            });
        
            closeButton.addEventListener('click', () => {
                modal.classList.remove('show');
                document.getElementById('nome').value = '';
                document.getElementById('email').value = '';
                document.getElementById('password').value = '';
            });
        
            // Fecha se clicar fora do modal
            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.remove('show');
                    document.getElementById('nome').value = '';
                    document.getElementById('email').value = '';
                    document.getElementById('password').value = '';
                }
            });
        });
    </script>
</body>
</html>
