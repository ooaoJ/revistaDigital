@include('template.head')
<body >
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
                                    <div id="theme1" onclick="changeTheme(this.id)" class="theme-option">Claro</div>
                                    <div id="theme2" onclick="changeTheme(this.id)" class="theme-option">Escuro</div>
                                    <div id="theme3" onclick="changeTheme(this.id)" class="theme-option">Dispositivo</div>
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
    <script>
        let themes = document.getElementsByClassName('theme-option');

        function changeTheme(id) {
            document.body.classList.remove('theme-light', 'theme-dark', 'theme-device');

            Array.from(themes).forEach(theme => {
                if (theme.id === id) {
                    theme.classList.add('theme-active');
                    localStorage.setItem('theme', id);
                    
                    if (id === 'theme1') {
                        document.body.classList.add('theme-light');
                    } else if (id === 'theme2') {
                        document.body.classList.add('theme-dark');
                    } else if (id === 'theme3') {
                        document.body.classList.add('theme-device');
                    }
                } else {
                    theme.classList.remove('theme-active');
                }
            });
        }

        window.onload = function() {
            let savedTheme = localStorage.getItem('theme');

            if (savedTheme) {
                Array.from(themes).forEach(theme => {
                    if (theme.id === savedTheme) {
                        theme.classList.add('theme-active');
                    } else {
                        theme.classList.remove('theme-active');
                    }
                });

                if (savedTheme === 'theme1') {
                    document.body.classList.add('theme-light');
                } else if (savedTheme === 'theme2') {
                    document.body.classList.add('theme-dark');
                } else if (savedTheme === 'theme3') {
                    document.body.classList.add('theme-device');
                }
            }
        }
    </script>
</body>
</html>