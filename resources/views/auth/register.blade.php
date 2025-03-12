@include('template.head')
<body data-bs-theme="dark" class="d-flex align-items-center justify-content-center flex-column h-100">
    <a href="{{route('index')}}" class="fs-2 text-light" style="position: absolute; top: 0px; left: 10px;"><i class="bi bi-reply"></i></a>

    <div class="auth-card container border rounded d-flex flex-column align-items-center justify-content-center" style="height:400px; background-color: #292e33;">
        <h1>Registro</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <form action="{{ route('registrar') }}" method="POST" class="mb-3 w-100 d-flex align-items-center flex-column">
            @csrf
            <div class="mb-3 w-75">
                <input type="text" name="nome" class="form-control" placeholder="Nome">
            </div>
            <div class="mb-3 w-75">
                <input type="email" name="email" class="form-control" placeholder="Email">
                @error('email')
                    <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 w-75">
                <input type="password" name="password" class="form-control" placeholder="Senha">
                @error('password')
                    <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        <p>Já tem uma conta? <a href="{{route('tela-login')}}">Entre aqui</a></p>
    </div>
    <p class="text-center" style="color: #dee2e667; position:absolute; top:95%;">© 2025 - Revista Digital em Desenvolvimento. Todos os direitos reservados.</p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
