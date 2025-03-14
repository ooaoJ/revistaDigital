@include('template.head')
<body class="d-flex align-items-center justify-content-center h-100 auth-body">
    <a href="{{route('index')}}" class="fs-2 text-light" style="position: absolute; top: 0px; left: 10px;"><i class="bi bi-reply"></i></a>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
        @error('email')
            <div class="mt-2 toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ $message }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @enderror
        @error('password')
            <div class="mt-2 toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ $message }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @enderror
    </div>
    <div  class="auth-card container border rounded d-flex flex-column align-items-center justify-content-center" style="min-height: 450px; background-color: #fff;">
        <div class="auth-icon">
            <img src="{{ asset('images/logo/logo-nexus.png') }}" alt="">
        </div>
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

        <p style="text-align: center">Ainda nao tem uma conta? <a href="{{route('tela-registro')}}">Cadastre-se</a></p>
    </div>
    <p class="text-center" style="color: #dee2e667; position:absolute; top:95%;">© 2025 - Revista Digital em Desenvolvimento. Todos os direitos reservados.</p>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
