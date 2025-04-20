@include('template.head')
<body>
    <div class="w-100 h-100 d-flex flex-column justify-content-center">
        @include('template.nav')
        <div class="m-3 p-2 mt-4 noticia-container">
            <div class="noticia-container-guide">
                <p class="fs-5"><a class="notice-guide-link" href="{{route('materia-show', $noticia->materia_id)}}">{{$noticia->materia->nome}} </a>&gt; {{$noticia->titulo}}</p>
            </div>
            <div class="notice-upper mt-4 noticia-container-info d-flex align-items-center">
                <div class="notice-title">
                    <h1>{{$noticia->titulo}}</h1>
                    <h2>{{$noticia->subtitulo}}</h2>
                </div>
                <div class="notice-user">
                    <img src="{{asset('images/users/usuario' . $noticia->user->nivel . '.png')}}" alt="Imagem do Usuário">
                    <div class="notice-user-text">
                        <p>Publicada por: {{$noticia->user->nome}}</p>
                        <p>Data: {{$noticia->created_at->format('d/m/Y')}}</p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="notice-content mt-4">
                <div class="image-notice">
                    <img class="rounded" src="{{ asset('storage/' . $noticia->imagem) }}" alt="Imagem da Notícia">
                    <p class="image-description">"{{$noticia->subtitulo}}"</p>
                </div>
                @php
                    $conteudoFormatado = preg_replace_callback('/["“”](.*?)["“”]/u', function ($matches) {
                            return '<em>"' . e($matches[1]) . '"</em>';
                    }, 
                    $noticia->conteudo
                    );
                @endphp
                <p class="text-notice">{!! nl2br($conteudoFormatado) !!}</p>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


