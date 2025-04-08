@include('template.head')
<body>
    <div class="w-100 h-100 d-flex flex-column justify-content-center">
        @include('template.nav')
        <div class="materia-design materia{{$materia->id}}">
            <h1>{{ $materia->nome }}</h1>
            <img src="{{asset('images/materias/materia' . $materia->id . '.png')}}" alt="Imagem da Matéria">
        </div>
        <main class="d-flex align-items-center justify-content-center m-5">
            <div class="noticias-container  container d-flex flex-wrap gap-5 justify-content-center">
                @if ($materia->noticias->isEmpty())
                    <h1>Nenhuma notícia dessa matéria foi registrada ainda.</h1>
                @else
                    @foreach ($materia->noticias as $noticia)
                        <div class="card-{{$materia->id}} card-noticia card mb-3 d-flex flex-column align-items-center justify-content-center">
                            <div class="card-img-container">
                                <img src="{{ asset('storage/' . $noticia->imagem) }}" alt="Imagem da Notícia">
                            </div>
                            <div class="card-body d-flex flex-column align-items-center">
                                <h2 class="card-title text-center">{{ $noticia->titulo }}</h2>
                                <p class="mb-3 card-text text-center">{{ $noticia->subtitulo }}</p>
                                <a href="{{ route('noticia-show', $noticia->id) }}" class="btn btn-{{$materia->id}} btn-card-noticia">Ver mais</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>