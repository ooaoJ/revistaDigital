@include('template.head')
<body class="h-100">
    <div class="w-100 h-100 body-container">
        @include('template.nav')
        
        <div id="carouselExample" class="carousel carousel1 slide">
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
            <p>Nossas Matérias</p>
            <div class="materia-group">
              <div class="materia-circle">
                <a href="" class="circle c1" id="portugues">
                  <img src="{{asset('images/materias/portugues.png')}}" alt="">
                </a>
                <p class="text-center">Língua Portuguesa</p>
              </div>
              <div class="materia-circle">
                <a href="" class="circle c1" id="ingles">
                  <img src="{{asset('images/materias/ingles.png')}}" alt="">
                </a>
                <p>Língua Inglesa</p>
              </div>
              <div class="materia-circle">
                <a href="" class="circle c2" id="artes">
                  <img src="{{asset('images/materias/artes.png')}}" alt="">
                </a>
                <p>Artes</p>
              </div>
              <div class="materia-circle">
                <a href="" class="circle c2" id="esportes">
                  <img src="{{asset('images/materias/esportes.png')}}" alt="">
                </a>
                <p>Educação Física</p>
              </div>
              <div class="materia-circle">
                <a href="" class="circle c3" id="filosofia">
                  <img src="{{asset('images/materias/filosofia.png')}}" alt="">
                </a>
                <p>Filosofia</p>
              </div>
              <div class="materia-circle">
                <a href="" class="circle c3" id="sociologia">
                  <img src="{{asset('images/materias/sociologia.png')}}" alt="">
                </a>
                <p>Sociologia</p>
              </div>
              <div class="materia-circle">
                <a href="" class="circle c4" id="historia">
                  <img src="{{asset('images/materias/historia.png')}}" alt="">
                </a>
                <p>História</p>
              </div>
              <div class="materia-circle">
                <a href="" class="circle c4" id="matematica">
                  <img src="{{asset('images/materias/matematica.png')}}" alt="">
                </a>
                <p>Matemática</p>
              </div>
              <div class="materia-circle">
                <a href="" class="circle c5" id="biologia">
                  <img src="{{asset('images/materias/biologia.png')}}" alt="">
                </a>
                <p>Biologia</p>
              </div>
              <div class="materia-circle">
                <a href="" class="circle c5" id="geografia">
                  <img src="{{asset('images/materias/geografia.png')}}" alt="">
                </a>
                <p>Geografia</p>
              </div>
              <div class="materia-circle">
                <a href="" class="circle c5" id="fisica">
                  <img src="{{asset('images/materias/fisica.png')}}" alt="">
                </a>
                <p>Física</p>
              </div>
              <div class="materia-circle">
                <a href="#" class="circle c5" id="quimica">
                  <img src="{{asset('images/materias/quimica.png')}}" alt="">
                </a>
                <p>Química</p>
              </div>
            </div>
          </section>
        </main>
        <div id="carouselExample" class="carousel carousel2 slide">
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
        @include('template.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>