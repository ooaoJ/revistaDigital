@include('template.head')
<body>
    <div class="w-100 h-100 d-flex flex-column justify-content-center">
        @include('template.nav')
        <div class="materia-design materia{{$materia->id}}">
            <h1>{{ $materia->nome }}</h1>
            <img src="{{asset('images/materias/materia' . $materia->id . '.png')}}" alt="Imagem da Matéria">
        </div>
        <main class="m-5">
            @if ($materia->noticias->isEmpty())
                <h1>Nenhuma notícia dessa matéria foi registrada ainda.</h1>
            @else
                @foreach ($materia->noticias as $noticia)
                    <div  class="card mb-3">
                        <img src="{{ asset('storage/' . $noticia->imagem) }}" class="card-img-top" alt="Imagem da Notícia">
                        <div class="card-body">
                            <h2 class="card-title">{{ $noticia->titulo }}</h2>
                            <p class="card-text">{{ $noticia->subtitulo }}</p>
                            <a href="{{ route('noticia.show', $noticia->id) }}" class="btn btn-primary">Leia mais</a>
                        </div>
                    </div>
                @endforeach
            @endif

        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>