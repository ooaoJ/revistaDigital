@include('template.head')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<body class="h-100 d-flex flex-column align-items-center justify-content-center">
    <div class="background-color" id="bg1"></div>
    <div class="content">
        <div class="top">
            <div class="divder">
                <h1>Revista Digital</h1>
                <h2>Aprender o hoje, transformar o amanhã</h2>
                <p>A Nextus é uma revista digital feita para quem quer estar sempre atualizado. Aqui, você encontra notícias verificadas, tendências e análises aprofundadas sobre os temas mais relevantes do momento.</p>
            </div>
            <div class="divder">
                <div class="circle">
                    <img src="{{ asset('images/logo/logo-nexus.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="cards">
                <div class="card-info">
                    <p><i class="bi bi-newspaper"></i> Notícias de primeira mão.</p>
                    <p><i class="bi bi-lightbulb"></i> Tudo que você precisa saber está aqui.</p>
                    <p><i class="bi bi-search"></i> Trabalhando com notícias verídicas.</p>
                </div>
                <div class="card-info">
                    <p>Entre em contato conosco:</p>
                    <div class="social">
                        <i class="bi bi-envelope"></i>
                        <i class="bi bi-github"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="veja">
            <p>Saiba mais sobre nós!</p>
            <i class="bi bi-chevron-compact-down"></i>
        </div>
        <div class="about">
            <h1>O futuro importa!</h1>
            <img src="{{asset('images/noticia.png')}}" alt="">
        </div>
    </div>
    <div class="background-container">
        <div class="background-color" id="bg2"></div>
    </div>

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>