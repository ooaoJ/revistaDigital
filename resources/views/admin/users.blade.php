@include('template.head')
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
        </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
