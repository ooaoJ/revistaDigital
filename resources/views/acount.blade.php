@include('template.head')

<body>
    <div class="w-100 h-100 body-container d-flex flex-column justify-content-center">
        @include('template.nav')
        @if(Auth::user()->nivel === 0)
            <main class="acount-main nivel-0">
                <button class="btn-voltar">
                    <p>
                        <i class="bi bi-arrow-left"></i>
                    </p>
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
            <main class="acount-main nivel-1">
                <button class="btn-voltar">
                    <p>
                        <i class="bi bi-arrow-left"></i>
                    </p>
                </button>
                <div class="profile-container">
                    <p class="profile-container-title profile-container-title-orange">Criar Postagem</p>
                    <div class="profile-infos">
                        <section>
                            <div class="profile-user-image">
                                <img src="{{asset('images/users/usuario1.png')}}" alt="usuario 0">
                            </div>
                            <h1 class="user-name">{{Auth::user()->nome}}</h1>
                        </section>
                        <section>
                            <h1 class="h1-criacao">Criação</h1>
                            <div class="theme-container">
                                <div class="theme-select theme-select-orange">
                                    <div id="theme1" onclick="changeTheme(this.id)"
                                        class="theme-option theme-option-orange">Claro</div>
                                    <div id="theme2" onclick="changeTheme(this.id)"
                                        class="theme-option theme-option-orange">Escuro</div>
                                    <div id="theme3" onclick="changeTheme(this.id)"
                                        class="theme-option theme-option-orange">Dispositivo</div>
                                </div>
                            </div>
                            <button id="add-post">
                                <p>Criar Post</p>
                                <i class="bi bi-plus-circle-fill"></i>
                            </button>
                        </section>
                    </div>
                </div>
            </main>
            <div id="modal-post">
                <div class="buttons">
                    <button id="close-modal">Cancelar</button>
                </div>
                <form action="{{ route('noticias-store') }}" method="POST" enctype="multipart/form-data" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="titulo" id="titulo" placeholder="Titulo da Noticia" class="form-control title-input" autofocus>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="subtitulo" id="subtitulo" placeholder="Subtitulo da Noticia"
                            class="form-control subtitle-input">
                    </div>
                    <div class="mb-3">
                    </div>
                    <div class="mb-3">
                        <textarea name="conteudo" id="conteudo" placeholder="Conteúdo da Notícia"
                            class="form-control content-input" style="height: 180px; resize: none;"></textarea>
                    </div>
                    <div class="mb-3 d-flex gap-3 form-sets">
                        <input type="file" name="imagem" id="imagem" class="form-control image-input" accept="image/*"
                            required>
                        <select name="materia_id" id="materia_id" class="form-select materia-input" required>
                            <option value="">Selecione uma matéria</option>
                            @foreach($materias as $materia)
                                <option class="option-input" value="{{ $materia->id }}">{{ $materia->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit">Enviar <i class="bi bi-send"></i></button>
                </form>
            </div>
        @endif
        @if(Auth::user()->nivel === 2)
            <main class="acount-main">
                <button class="btn-voltar">
                    <p>
                        <i class="bi bi-arrow-left"></i>
                    </p>
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
        @if(Auth::user()->nivel === 4)
            <main class="acount-main">
                <button class="btn-voltar">
                    <p>
                        <i class="bi bi-arrow-left"></i>
                    </p>
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

        window.onload = function () {
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
    @if(Auth::user()->nivel === 1)
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const modal = document.getElementById('modal-post');
                const addPostBtn = document.getElementById('add-post');
                const closeModalBtn = document.getElementById('close-modal');

                addPostBtn.addEventListener('click', () => {
                    modal.classList.add('active-modal');
                    console.log(modal.classList)
                });

                closeModalBtn.addEventListener('click', () => {
                    modal.classList.remove('active-modal');
                    console.log(modal.classList)
                })
            })
        </script>
    @endif
</body>
</html>