@include('template.head')
<body>
    <div>
        @include('template.nav')
        
        <main class="mt-3 container">
            <h1>Crie uma nova postagem aqui</h1>
            <p>Adicione as informações da sua postagem abaixo.</p>
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
        </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
