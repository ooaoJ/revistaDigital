@include('template.head')
<body>
    <div>
        @include('template.nav')
        
        <main class="mt-3 container">
            <h1>Exibindo o Painel de Notícias</h1>
            <p>Todas as noticias irão aparecer abaixo no quadro.</p>
            <div>
                @foreach($noticias as $noticia)
                    <div class="card mb-3 w-25">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $noticia->imagem) }}" alt="Imagem da Noticia" class="w-100 rounded mb-3">
                            <h5>{{ $noticia->titulo }}</h5>
                            <p>{{ $noticia->subtitulo }}</p>
                            <p>{{ $noticia->conteudo }}</p>
                            <p><strong>Publicado por:</strong> {{ $noticia->user->nome}}</p>
                            <form action="{{ route('noticias-aprovar', $noticia->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success">Aprovar</button>
                            </form>
                            <form action="{{ route('noticias-reprovar', $noticia->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-danger">Reprovar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
