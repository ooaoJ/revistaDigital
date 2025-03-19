@include('template.head')
<body class="h-100">
    <div class="w-100 h-100 body-container">
        @include('template.nav')
        
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('images/noticia/deepseek.jpg')}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/noticia/Manchetes.jpg')}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        <main class="mt-3 w-100 h-100">
          <section class="materias">
            <div class="materia-group">
              <div class="materia-circle">
                <div class="circle">
                  <img src="{{asset('images/materias/portugues.png')}}" alt="">
                </div>
                <p>Língua Portuguesa</p>
              </div>
              <div class="materia-circle">
                <div class="circle">
                  <img src="{{asset('images/materias/ingles.png')}}" alt="">
                </div>
                <p>Língua Inglesa</p>
              </div>
              <div class="materia-circle">
                <div class="circle">
                  <img src="{{asset('images/materias/artes.png')}}" alt="">
                </div>
                <p>Artes</p>
              </div>
              <div class="materia-circle">
                <div class="circle">
                  <img src="{{asset('images/materias/esportes.png')}}" alt="">
                </div>
                <p>Educação Física</p>
              </div>
              <div class="materia-circle">
                <div class="circle">
                  <img src="{{asset('images/materias/filosofia.png')}}" alt="">
                </div>
                <p>Filosofia</p>
              </div>
              <div class="materia-circle">
                <div class="circle">
                  <img src="{{asset('images/materias/sociologia.png')}}" alt="">
                </div>
                <p>Sociologia</p>
              </div>
              <div class="materia-circle">
                <div class="circle">
                  <img src="{{asset('images/materias/historia.png')}}" alt="">
                </div>
                <p>História</p>
              </div>
              <div class="materia-circle">
                <div class="circle">
                  <img src="{{asset('images/materias/matematica.png')}}" alt="">
                </div>
                <p>Matemática</p>
              </div>
            </div>
          </section>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>