@include('template.head')

<body>
  <div class="w-100 h-100 body-container d-flex flex-column justify-content-center">
    @include('template.nav')
    <main class="mt-3 w-100 h-100 d-flex flex-column align-items-center justify-content-center">
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
            <div onclick="setCarousel(this.id)" class="bullet-control-bullet" id="bullet-control-3"></div>
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
      <div class="carousel-container" id="carousel2">
        <div class="carousel-content">
          <ul class="carousel-items">
            @foreach ($noticiasFiltro as $noticia)
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
          <div id="left2" class="button-controler"><i class="bi bi-arrow-left"></i></div>
          <div id="right2" class="button-controler"><i class="bi bi-arrow-right"></i></div>
          <div id="bullet-control">
            <div onclick="setCarousel2(this.id)" class="bullet-control-bullet bullet-control-bullet-active"
              id="bullet-control-1"></div>
            <div onclick="setCarousel2(this.id)" class="bullet-control-bullet" id="bullet-control-2"></div>
            <div onclick="setCarousel2(this.id)" class="bullet-control-bullet" id="bullet-control-3"></div>
          </div>
        </div>
      </div>
    </main>
    @include('template.footer')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const cartas = Array.from(document.querySelectorAll('.hero-card'));
      const botaoEsquerda = document.getElementById('left');
      const botaoDireita  = document.getElementById('right');
      const bolinhas = Array.from(document.querySelectorAll('.bullet-control-bullet'));
  
      const intervalo = 8000;
      const estados = [
        [  0,  1, -1 ],
        [  1, -1,  0 ],
        [ -1,  0,  1 ]
      ];
  
      let estadoAtual    = 0;
      let estadoAnterior = 0;
      let idIntervalo;
  
      function transformarPara(posicao) {
        if (posicao ===  0) return 'translateX(0)';
        if (posicao ===  1) return 'translateX(1100px)';
        if (posicao === -1) return 'translateX(-1100px)';
      }
  
      function atualizarCarrossel(antigo) {
        const posicoesNovas = estados[estadoAtual];
        const posicoesAntigas = estados[antigo];
  
        cartas.forEach((carta, i) => {
          const de   = posicoesAntigas[i];
          const para = posicoesNovas[i];
  
          if (Math.abs(de - para) === 2) {
            carta.style.transition = 'none';
            carta.style.transform  = transformarPara(para);
            void carta.offsetWidth;
            carta.style.transition = 'transform 0.5s ease-in-out';
          } else {
            carta.style.transition = 'transform 0.5s ease-in-out';
            carta.style.transform  = transformarPara(para);
          }
  
          carta.classList.toggle('hero-card-active', para === 0);
        });
  
        bolinhas.forEach((b, i) => {
          b.classList.toggle('bullet-control-bullet-active', i === estadoAtual);
        });
  
        estadoAnterior = estadoAtual;
      }
  
      function definirCarrossel(idBolinhas) {
        const idx = parseInt(idBolinhas.split('-').pop(), 10) - 1;
        if (isNaN(idx)) return;
        const antigo = estadoAtual;
        estadoAtual = idx;
        atualizarCarrossel(antigo);
      }
  
      function iniciarAutoPlay() {
        idIntervalo = setInterval(() => {
          const antigo = estadoAtual;
          estadoAtual = (antigo + 1) % estados.length;
          atualizarCarrossel(antigo);
        }, intervalo);
      }
  
      function reiniciarAutoPlay() {
        clearInterval(idIntervalo);
        iniciarAutoPlay();
      }

      botaoDireita.addEventListener('click', () => {
        const antigo = estadoAtual;
        estadoAtual = (antigo + 1) % estados.length;
        atualizarCarrossel(antigo);
        reiniciarAutoPlay();
      });
  
      botaoEsquerda.addEventListener('click', () => {
        const antigo = estadoAtual;
        estadoAtual = (antigo - 1 + estados.length) % estados.length;
        atualizarCarrossel(antigo);
        reiniciarAutoPlay();
      });
  
      bolinhas.forEach(b => {
        b.addEventListener('click', () => {
          definirCarrossel(b.id);
          reiniciarAutoPlay();
        });
      });
  
      iniciarAutoPlay();
    });


    // carrossel 2

    const cartas2 = Array.from(document.querySelectorAll('#carousel2 .hero-card'));
    const botaoEsquerda2 = document.getElementById('left2');
    const botaoDireita2  = document.getElementById('right2');
    const bolinhas2 = Array.from(document.querySelectorAll('#carousel2 .bullet-control-bullet'));

    let estadoAtual2    = 0;
    let estadoAnterior2 = 0;
    let idIntervalo2;

    function atualizarCarrossel2(antigo) {
      const posicoesNovas = estados[estadoAtual2];
      const posicoesAntigas = estados[estadoAnterior2];

      cartas2.forEach((carta, i) => {
        const de   = posicoesAntigas[i];
        const para = posicoesNovas[i];

        if (Math.abs(de - para) === 2) {
          carta.style.transition = 'none';
          carta.style.transform  = transformarPara(para);
          void carta.offsetWidth;
          carta.style.transition = 'transform 0.5s ease-in-out';
        } else {
          carta.style.transition = 'transform 0.5s ease-in-out';
          carta.style.transform  = transformarPara(para);
        }

        carta.classList.toggle('hero-card-active', para === 0);
      });

      bolinhas2.forEach((b, i) => {
        b.classList.toggle('bullet-control-bullet-active', i === estadoAtual2);
      });

      estadoAnterior2 = estadoAtual2;
    }

    function definirCarrossel2(idBolinhas) {
      const idx = parseInt(idBolinhas.split('-').pop(), 10) - 1;
      if (isNaN(idx)) return;
      const antigo = estadoAtual2;
      estadoAtual2 = idx;
      atualizarCarrossel2(antigo);
    }

    function iniciarAutoPlay2() {
      idIntervalo2 = setInterval(() => {
        const antigo = estadoAtual2;
        estadoAtual2 = (antigo + 1) % estados.length;
        atualizarCarrossel2(antigo);
      }, intervalo);
    }

    function reiniciarAutoPlay2() {
      clearInterval(idIntervalo2);
      iniciarAutoPlay2();
    }

    botaoDireita2.addEventListener('click', () => {
      const antigo = estadoAtual2;
      estadoAtual2 = (antigo + 1) % estados.length;
      atualizarCarrossel2(antigo);
      reiniciarAutoPlay2();
    });

    botaoEsquerda2.addEventListener('click', () => {
      const antigo = estadoAtual2;
      estadoAtual2 = (antigo - 1 + estados.length) % estados.length;
      atualizarCarrossel2(antigo);
      reiniciarAutoPlay2();
    });

    bolinhas2.forEach(b => {
      b.addEventListener('click', () => {
        definirCarrossel2(b.id);
        reiniciarAutoPlay2();
      });
    });

    iniciarAutoPlay2();
  </script>
</body>
</html>