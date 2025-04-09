@include('template.head')
<style>
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
    width: 100%;
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
</style>

<body>
<div>
    @include('template.nav')

    <main class="mt-3 mb-5 container">
        <h1>Painel de Matérias</h1>
        <p>Abaixo estão listadas todas as matérias e um botão para criar uma nova.</p>

        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materias as $materia)
                    <tr>
                        <td>{{ $materia->id }}</td>
                        <td>{{ $materia->nome }}</td>
                        <td>
                            <form action="{{ route('materias.destroy', $materia->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Tem certeza que deseja deletar essa matéria?')">
                                    Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-dark mt-3" id="open-modal">Criar nova matéria</button>
        <div id="modal">
            <form action="{{ route('materias-store') }}" method="POST">
                @csrf
                <span class="close-modal">&times;</span>
                <h4 class="mb-3">Criar nova matéria</h4>
                <div class="mb-3">
                    <input type="text" name="nome" class="form-control" placeholder="Nome da matéria" required>
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </main>
    @include('template.footer')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const openModalBtn = document.getElementById('open-modal');
    const modal = document.getElementById('modal');
    const closeModal = document.querySelector('.close-modal');

    openModalBtn.addEventListener('click', () => {
        modal.classList.add('show');
    });

    closeModal.addEventListener('click', () => {
        modal.classList.remove('show');
    });

    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.remove('show');
        }
    });
});
</script>
</body>
</html>
