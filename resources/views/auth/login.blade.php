@include('template.head')
<body data-bs-theme="dark" class="d-flex align-items-center justify-content-center h-100">
    <a href="{{route('index')}}" class="fs-2 text-light" style="position: absolute; top: 0px; left: 10px;"><i class="bi bi-reply"></i></a>

    <div  class="auth-card container border rounded d-flex flex-column align-items-center justify-content-center" style="height: 400px; background-color: #292e33;">
        <h1>Login</h1>

        <form action="{{ route('login') }}" method="POST" class="mb-3 w-100 d-flex align-items-center flex-column">
            @csrf
            <div class="mb-3 w-75">
                <input type="email" name="email" id="email" placeholder="Email" class="form-control">
            </div>
            <div class="mb-3 w-75">
                <input type="password" name="password" id="password" placeholder="Senha" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0" style="list-style-type: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <p style="text-align: center">Ainda nao tem uma conta? <a href="{{route('tela-registro')}}">Cadastre-se</a></p>
    </div>
    <p class="text-center" style="color: #dee2e667; position:absolute; top:90%;">© 2025 - Revista Digital em Desenvolvimento. Todos os direitos reservados.</p>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
