@include('template.head')
<style>
body, html {
    width: 100%;
    min-height: 100%;
    height: auto;
}
main {
    min-height: 368px;
}

#modal {
    display: none;
    position: fixed;
    z-index: 999;
    left: 0;
    top: 0;
    width: 100vw;
    height: 100vh;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}
#modal.show {
    display: flex;
}
#modal form {
    background-color: #fff;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    width: 90%;
    max-width: 600px;
    position: relative;
}
.close-modal {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 1.5rem;
    font-weight: bold;
    cursor: pointer;
    color: #aaa;
}
.close-modal:hover {
    color: #333;
}
img.thumb {
    width: 80px;
    height: auto;
    border-radius: 5px;
}
table tr {
    height: 100px !important;
}
.noticia-card{
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.card.noticia-card img {
    width: 100%;
    height: auto;
    max-height: 280px;
    border-radius: 8px;
    margin-bottom: 10px;
}

</style>

<body>
<div>
    @include('template.nav')

    <main class="mt-3 mb-5 container">
        <h1>Painel de Notícias</h1>
        <p>Abaixo estão listadas todas as notícias e um botão para criar nova.</p>
        <form method="GET" class="mt-2 row g-3 mb-4">
            <p>Filtros:</p>
            <div class="col-md-6">
                <select name="materia_id" class="form-select">
                    <option value="">Filtrar por Matéria</option>
                    @foreach($materias as $materia)
                        <option value="{{ $materia->id }}" {{ request('materia_id') == $materia->id ? 'selected' : '' }}>
                            {{ $materia->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <select name="status" class="form-select">
                    <option value="">Filtrar por Status</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Em aguardo</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Aprovada</option>
                    <option value="2" {{ request('status') === '2' ? 'selected' : '' }}>Recusada</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Filtrar</button>
                <a href="{{ route('painel-noticias') }}" class="btn btn-secondary">Limpar</a>
            </div>
        </form>

        <div class="d-none d-md-block">
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagem</th>
                        <th>Título</th>
                        <th>Subtítulo</th>
                        <th>Status</th>
                        <th>Publicado por</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($noticias as $noticia)
                        <tr>
                            <td>{{ $noticia->id }}</td>
                            <td><img src="{{ asset('storage/' . $noticia->imagem) }}" class="thumb" alt="Imagem da Notícia"></td>
                            <td>{{ $noticia->titulo }}</td>
                            <td>{{ $noticia->subtitulo }}</td>
                            <td class="{{ $noticia->status === 0 ? 'text-warning' : ($noticia->status === 1 ? 'text-success' : 'text-danger') }}">
                                {{ $noticia->status === 0 ? 'Em aguardo' : ($noticia->status === 1 ? 'Aprovada' : 'Recusada') }}
                            </td>
                            <td>{{ $noticia->user->nome }}</td>
                            <td>
                                <form action="{{ route('noticias-aprovar', $noticia->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-success btn-sm">Aprovar</button>
                                </form>
                                <form action="{{ route('noticias-reprovar', $noticia->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Reprovar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-block d-md-none">
            @foreach($noticias as $noticia)
                <div class="card noticia-card mb-3 p-3">
                    <img src="{{ asset('storage/' . $noticia->imagem) }}" alt="Imagem da Notícia">
                    <h5 class="mt-2">{{ $noticia->titulo }}</h5>
                    <p><strong>Subtítulo:</strong> {{ $noticia->subtitulo }}</p>
                    <p>
                        <strong>Status:</strong>
                        <span class="{{ $noticia->status === 0 ? 'text-warning' : ($noticia->status === 1 ? 'text-success' : 'text-danger') }}">
                            {{ $noticia->status === 0 ? 'Em aguardo' : ($noticia->status === 1 ? 'Aprovada' : 'Recusada') }}
                        </span>
                    </p>
                    <p><strong>Publicado por:</strong> {{ $noticia->user->nome }}</p>
                    <div class="d-flex gap-2">
                        <form action="{{ route('noticias-aprovar', $noticia->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-success btn-sm w-100">Aprovar</button>
                        </form>
                        <form action="{{ route('noticias-reprovar', $noticia->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm w-100">Reprovar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Botão Criar Nova Notícia --}}
        <button class="btn btn-dark mt-3 mb-5" id="open-modal">Criar nova notícia</button>

        {{-- Modal --}}
        <div id="modal">
            <form action="{{ route('noticias-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <span class="close-modal">&times;</span>
                <h4 class="mb-3">Criar nova notícia</h4>
                <div class="mb-3">
                    <input type="text" name="titulo" class="form-control" placeholder="Título" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="subtitulo" class="form-control" placeholder="Subtítulo">
                </div>
                <div class="mb-3">
                    <textarea name="conteudo" class="form-control" placeholder="Conteúdo" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <input type="file" name="imagem" class="form-control" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <select name="materia_id" class="form-select" required>
                        <option value="">Selecione uma matéria</option>
                        @foreach($materias as $materia)
                            <option value="{{ $materia->id }}" {{ request('materia_id') == $materia->id ? 'selected' : '' }}>{{ $materia->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Enviar <i class="bi bi-send"></i></button>
            </form>
        </div>
    </main>

    @include('template.footer')
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const openModalBtn = document.getElementById('open-modal');
        const modal = document.getElementById('modal');
        const closeModal = document.querySelector('.close-modal');

        openModalBtn.addEventListener('click', () => modal.classList.add('show'));
        closeModal.addEventListener('click', () => modal.classList.remove('show'));
        window.addEventListener('click', e => { if (e.target === modal) modal.classList.remove('show'); });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>