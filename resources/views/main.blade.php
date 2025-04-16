@include('template.head')

<body>
  <div class="w-100 h-100 body-container d-flex flex-column justify-content-center">
    @include('template.nav')
    <main class="mt-3 w-100 h-100">
      <div class="carousel-container" id="carousel">
        <div class="carousel-content">
          <ul class="carousel-items">
            @foreach ($noticias as $noticia)
            <li id="hero-card{{ $loop->iteration }}" class="hero-card {{ $loop->first ? 'hero-card-active' : ''}}">
              <a href="{{ route('noticia-show', $noticia->id) }}" class="w-100 h-100 image-link">
                <img src="{{ asset('storage/' . $noticia->imagem) }}" alt="{{ $noticia->titulo }}" class="image-hero">
                <h3>{{ $noticia->titulo }}</h3>
              </a>
            </li>
            @endforeach
          </ul>
        </div>
        <div class="carousel-controler">
          <div id="left" class="button-controler"><i class="bi bi-arrow-left"></i></div>
          <div id="right" class="button-controler"><i class="bi bi-arrow-right"></i></div>
          <div id="bullet-control">
            <div onclick="setCarousel(this.id)" class="bullet-control-bullet bullet-control-bullet-active"
              id="bullet-control-1"></div>
            <div onclick="setCarousel(this.id)" class="bullet-control-bullet" id="bullet-control-2"></div>
            <div onclick="setCarousel(this.id)" class="bullet-control-bullet" id="x'bullet-control-3"></div>
          </div>
        </div>
      </div>
      <section class="materias" id="materia-group">
        <p>Nossas Matérias</p>
        <div class="materia-group">
          <div class="materia-circle">
            <a href="{{route('materia-show', 1)}}" class="circle c1" id="portugues">
              <img src="{{asset('images/materias/materia1.png')}}" alt="Icone da Materia">
            </a>
            <p class="text-center">Língua Portuguesa</p>
          </div>
          <div class="materia-circle">
            <a href="{{route('materia-show', 2)}}" class="circle c1" id="ingles">
              <img src="{{asset('images/materias/materia2.png')}}" alt="Icone da Materia">
            </a>
            <p>Língua Inglesa</p>
          </div>
          <div class="materia-circle">
            <a href="{{route('materia-show', 3)}}" class="circle c2" id="artes">
              <img src="{{asset('images/materias/materia3.png')}}" alt="Icone da Materia">
            </a>
            <p>Artes</p>
          </div>
          <div class="materia-circle">
            <a href="{{route('materia-show', 4)}}" class="circle c2" id="esportes">
              <img src="{{asset('images/materias/materia4.png')}}" alt="Icone da Materia">
            </a>
            <p>Educação Física</p>
          </div>
          <div class="materia-circle">
            <a href="{{route('materia-show', 5)}}" class="circle c3" id="filosofia">
              <img src="{{asset('images/materias/materia5.png')}}" alt="Icone da Materia">
            </a>
            <p>Filosofia</p>
          </div>
          <div class="materia-circle">
            <a href="{{route('materia-show', 6)}}" class="circle c3" id="sociologia">
              <img src="{{asset('images/materias/materia6.png')}}" alt="Icone da Materia">
            </a>
            <p>Sociologia</p>
          </div>
          <div class="materia-circle">
            <a href="{{route('materia-show', 7)}}" class="circle c4" id="historia">
              <img src="{{asset('images/materias/materia7.png')}}" alt="Icone da Materia">
            </a>
            <p>História</p>
          </div>
          <div class="materia-circle">
            <a href="{{route('materia-show', 8)}}" class="circle c4" id="matematica">
              <img src="{{asset('images/materias/materia8.png')}}" alt="Icone da Materia">
            </a>
            <p>Matemática</p>
          </div>
          <div class="materia-circle">
            <a href="{{route('materia-show', 9)}}" class="circle c5" id="biologia">
              <img src="{{asset('images/materias/materia9.png')}}" alt="Icone da Materia">
            </a>
            <p>Biologia</p>
          </div>
          <div class="materia-circle">
            <a href="{{route('materia-show', 10)}}" class="circle c5" id="geografia">
              <img src="{{asset('images/materias/materia10.png')}}" alt="Icone da Materia">
            </a>
            <p>Geografia</p>
          </div>
          <div class="materia-circle">
            <a href="{{route('materia-show', 11)}}" class="circle c5" id="fisica">
              <img src="{{asset('images/materias/materia11.png')}}" alt="Icone da Materia">
            </a>
            <p>Física</p>
          </div>
          <div class="materia-circle">
            <a href="{{route('materia-show', 12)}}" class="circle c5" id="quimica">
              <img src="{{asset('images/materias/materia12.png')}}" alt="Icone da Materia">
            </a>
            <p>Química</p>
          </div>
        </div>
      </section>
    </main>
    @include('template.footer')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const cards = document.querySelectorAll('.hero-card');
    const leftButton = document.getElementById('left');
    const rightButton = document.getElementById('right');

    // Definindo os estados de posição para os 3 cards:
    const states = [
      [0, 1, -1],   // Estado 0: card1 no centro, card2 à direita, card3 à esquerda
      [1, -1, 0],   // Estado 1: card1 à direita, card2 à esquerda, card3 no centro
      [-1, 0, 1]    // Estado 2: card1 à esquerda, card2 no centro, card3 à direita
    ];
    let currentState = 0;

    // Converte os valores para transformações CSS:
    function transformFor(val) {
      if (val === 0) return "translateX(0)";
      if (val === 1) return "translateX(1100px)";
      if (val === -1) return "translateX(-1100px)";
    }

    // Função que atualiza o carrossel e os bullets
    function updateCarousel() {
      const posValues = states[currentState];
      cards.forEach((card, index) => {
        card.style.transform = transformFor(posValues[index]);
        if (posValues[index] === 0) {
          card.classList.add('hero-card-active');
        } else {
          card.classList.remove('hero-card-active');
        }
      });

      // Atualiza os bullets:
      const bullets = document.querySelectorAll('.bullet-control-bullet');
      bullets.forEach((bullet, index) => {
        if (index === currentState) {
          bullet.classList.add('bullet-control-bullet-active');
        } else {
          bullet.classList.remove('bullet-control-bullet-active');
        }
      });
    }

    // Clique no botão direito: avança o estado
    rightButton.addEventListener('click', () => {
      currentState = (currentState + 1) % states.length;
      updateCarousel();
    });

    // Clique no botão esquerdo: retrocede o estado
    leftButton.addEventListener('click', () => {
      currentState = (currentState - 1 + states.length) % states.length;
      updateCarousel();
    });

    // Função chamada quando um bullet é clicado. O ID deve ser do tipo "bullet-control-X"
    function setCarousel(bulletId) {
      const parts = bulletId.split('-');
      if (parts.length < 3) return;
      // Converte o número do bullet para índice (0, 1 ou 2)
      const bulletIndex = parseInt(parts[2]) - 1;
      currentState = bulletIndex;
      updateCarousel();
    }

    updateCarousel();
  </script>
</body>

</html>