@include('template.head')
<body style="height: 100%;">
    <div class="w-100 h-100 d-flex flex-column">
        @include('template.nav')
        <div class="mt-5 container content-escola">
            <div class="text-divider">
                <p class="m-0">Aconteceu na Escola</p>
            </div>
            <div class="notices-escola">
                @foreach ($noticiasFiltro as $noticia)
                    <div class="card-noticia-escola">
                        <img src="{{ asset('storage/' . $noticia->imagem) }}" alt="Imagem da Notícia">
                        <div class="card-noticia-escola-content">
                            <h1>{{$noticia->titulo}}</h1>
                            <a href="{{ route('noticia-show', $noticia->id) }}" class="btn btn-primary">Ver mais</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="veja-mais-escola">
                <div class="text-divider">
                  <p class="m-0">Veja mais notícias</p>
                </div>
                <div class="mais-noticias d-flex gap-4 flex-wrap">
                  @foreach($maisNoticias as $noticia)
                    <div class="card-noticia-mais">
                      <img
                        src="{{ asset('storage/' . $noticia->imagem) }}"
                        alt="Imagem da Notícia {{ $noticia->titulo }}"
                        class="w-100"
                      >
                      <div class="card-noticia-mais-content p-3">
                        <h2 class="h5">{{ $noticia->titulo }}</h2>
                        <a
                          href="{{ route('noticia-show', $noticia->id) }}"
                          class="btn btn-primary mt-2"
                        >
                          Ver mais
                        </a>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


