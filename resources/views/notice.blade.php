@include('template.head')
<body>
    <div class="w-100 h-100 body-container d-flex flex-column justify-content-center">
        @include('template.nav')
        <div class="materia-design materia{{$materia->id}}">
            <h1>{{ $materia->nome }}</h1>
            <img src="{{asset('images/materias/materia' . $materia->id . '.png')}}" alt="Imagem da Matéria">
        </div>
        <main class="container mt-5">

        </main>
    </div>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>