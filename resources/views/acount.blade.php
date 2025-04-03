@include('template.head')
<body>
    <div class="w-100 h-100 body-container d-flex flex-column justify-content-center">
        @include('template.nav')
        @if(Auth::user()->nivel === 0)
            <main class="acount-main">
                <button class="btn-voltar">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <div class="profile-container">
                    <p class="profile-container-title">Meu Perfil</p>
                    <div class="profile-infos">
                        <section>
                            <div class="profile-user-image">
                                <img src="{{asset('images/users/usuario0.png')}}" alt="usuario 0">
                                <i class="bi bi-pencil" id="edit-pencil"></i>
                            </div>
                            <p class="user-email">{{Auth::user()->email}}</p>
                        </section>
                        <section>
                            <h1 class="user-name">{{Auth::user()->nome}}</h1>
                            <div class="theme-container">
                                <p>Tema:</p>
                                <div class="theme-select">
                                    <div class="theme-option theme-active">Claro</div>
                                    <div class="theme-option">Escuro</div>
                                    <div class="theme-option">Dispositivo</div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </main>
        @endif
        @if(Auth::user()->nivel === 1)
            <main>
                <button class="btn-voltar">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <div class="profile-container">
                    
                </div>
            </main>
        @endif
        @if(Auth::user()->nivel === 2)
            <main>
                <button class="btn-voltar">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <div class="profile-container">
                    
                </div>
            </main>
        @endif
        @if(Auth::user()->nivel === 4)
            <main>
                <button class="btn-voltar">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <div class="profile-container">

                </div>
                
            </main>
        @endif
        @include('template.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>