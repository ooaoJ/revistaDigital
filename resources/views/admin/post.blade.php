@include('template.head')
<body data-bs-theme="dark">
    <div class="p-2">
        @include('template.nav')
        
        <main class="mt-3 container">
            <h1>Crie uma nova postagem aqui</h1>
            <p>Adicione as informações da sua postagem abaixo.</p>
            <form action="{{ route('noticias-store') }}" method="POST" enctype="multipart/form-data" class="mb-3">
                @csrf
                <div class="mb-3 d-flex gap-5">
                    <input type="text" name="titulo" id="titulo" placeholder="Titulo da Noticia" class="form-control">
                    <input type="text" name="subtitulo" id="subtitulo" placeholder="Subtitulo da Noticia" class="form-control">
                </div>
                <div class="mb-3">
                </div>
                <div class="mb-3">
                    <textarea name="conteudo" id="conteudo" placeholder="Conteúdo da Notícia" class="form-control" style="height: 180px; resize: none;"></textarea>
                </div>
                <div class="mb-3 d-flex gap-5">
                    <select name="materia" id="materia" class="form-select" required>
                        <option value="0">-</option>
                        <option value="1">Artes</option>
                        <option value="2">Biologia</option>
                        <option value="3">Educação Física</option>
                        <option value="4">Filosofia</option>
                        <option value="5">Física</option>
                        <option value="6">Geografia</option>
                        <option value="7">História</option>
                        <option value="8">Ingles</option>
                        <option value="9">Kids</option>
                        <option value="10">Matemática</option>
                        <option value="11">Português</option>
                        <option value="12">Química</option>
                        <option value="13">Sociologia</option>
                    </select>
                    <input type="file" name="imagem" id="imagem" class="form-control" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-success">Publicar</button>
            </form>
        </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
