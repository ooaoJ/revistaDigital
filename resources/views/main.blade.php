@include('template.head')
<body class="h-100" data-bs-theme="dark">
    <div class="p-2 h-100">
        @include('template.nav')
        
        <main class="mt-3 w-100 h-100 container h-75">
            <h1>Bem-vindo <span class="text-primary">{{ Auth::user()->nome }}</span></h1>
            <p>Esta é a página principal da aplicação.</p>
        
            <div class="border mb-5 d-flex align-items-start p-2" style="height: auto">
              <div class="row gap-2">
                @foreach($noticias as $noticia)
                    <div class="col mt-2">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $noticia->imagem) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $noticia->titulo }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $noticia->titulo }}</h5>
                                <p class="card-text">{{ Str::limit($noticia->subtitulo, 100) }}</p>
                                <p><strong>Publicado por:</strong> 
                                    @if($noticia->user)
                                        {{ $noticia->user->nome }}
                                    @else
                                        Usuário desconhecido
                                    @endif
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">Matéria: {{ $noticia->materia_nome }}</small>
                                </p>
                                <a href="#" class="btn btn-primary">Ver mais</a>
                            </div>
                        </div>
                    </div>
                @endforeach
              </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>