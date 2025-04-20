@include('template.head')

<body>
  <div class="w-100 h-100 body-container d-flex flex-column justify-content-center">
    @include('template.nav')

    <main class="mt-3 w-100 h-100 d-flex flex-column align-items-center justify-content-center">
      <div class="carousel-container" id="carousel1">
        <div class="carousel-content">
          <ul class="carousel-items">
            @foreach ($noticias as $noticia)
              <li id="hero-card1-{{ $loop->iteration }}" class="hero-card {{ $loop->first ? 'hero-card-active' : '' }}">
                <a href="{{ route('noticia-show', $noticia->id) }}" class="w-100 h-100 image-link">
                  <img src="{{ asset('storage/' . $noticia->imagem) }}" alt="{{ $noticia->titulo }}" class="image-hero">
                  <h3>{{ $noticia->titulo }}</h3>
                </a>
              </li>
            @endforeach
          </ul>
        </div>
        <div class="carousel-controler">
          <div id="left1" class="button-controler"><i class="bi bi-arrow-left"></i></div>
          <div id="right1" class="button-controler"><i class="bi bi-arrow-right"></i></div>
          <div id="bullet-control1">
            @for ($i = 1; $i <= count($noticias); $i++)
              <div
                onclick="setCarousel1(this.id)"
                class="bullet-control-bullet {{ $i === 1 ? 'bullet-control-bullet-active' : '' }}"
                id="bullet-control1-{{ $i }}">
              </div>
            @endfor
          </div>
        </div>
      </div>
      <section class="materias" id="materia-group">
        <p class="fs-3">Nossas Matérias</p>
        <div class="materia-group">
          <div class="materia-circle">
            <a href="{{ route('materia-show', 1) }}" class="circle c1" id="portugues">
              <img src="{{ asset('images/materias/materia1.png') }}" alt="Icone da Materia">
            </a>
            <p class="text-center">Língua Portuguesa</p>
          </div>
          <div class="materia-circle">
            <a href="{{ route('materia-show', 2) }}" class="circle c1" id="ingles">
              <img src="{{ asset('images/materias/materia2.png') }}" alt="Icone da Materia">
            </a>
            <p>Língua Inglesa</p>
          </div>
          <div class="materia-circle">
            <a href="{{ route('materia-show', 3) }}" class="circle c2" id="artes">
              <img src="{{ asset('images/materias/materia3.png') }}" alt="Icone da Materia">
            </a>
            <p>Artes</p>
          </div>
          <div class="materia-circle">
            <a href="{{ route('materia-show', 4) }}" class="circle c2" id="esportes">
              <img src="{{ asset('images/materias/materia4.png') }}" alt="Icone da Materia">
            </a>
            <p>Educação Física</p>
          </div>
          <div class="materia-circle">
            <a href="{{ route('materia-show', 5) }}" class="circle c3" id="filosofia">
              <img src="{{ asset('images/materias/materia5.png') }}" alt="Icone da Materia">
            </a>
            <p>Filosofia</p>
          </div>
          <div class="materia-circle">
            <a href="{{ route('materia-show', 6) }}" class="circle c3" id="sociologia">
              <img src="{{ asset('images/materias/materia6.png') }}" alt="Icone da Materia">
            </a>
            <p>Sociologia</p>
          </div>
          <div class="materia-circle">
            <a href="{{ route('materia-show', 7) }}" class="circle c4" id="historia">
              <img src="{{ asset('images/materias/materia7.png') }}" alt="Icone da Materia">
            </a>
            <p>História</p>
          </div>
          <div class="materia-circle">
            <a href="{{ route('materia-show', 8) }}" class="circle c4" id="matematica">
              <img src="{{ asset('images/materias/materia8.png') }}" alt="Icone da Materia">
            </a>
            <p>Matemática</p>
          </div>
          <div class="materia-circle">
            <a href="{{ route('materia-show', 9) }}" class="circle c5" id="biologia">
              <img src="{{ asset('images/materias/materia9.png') }}" alt="Icone da Materia">
            </a>
            <p>Biologia</p>
          </div>
          <div class="materia-circle">
            <a href="{{ route('materia-show', 10) }}" class="circle c5" id="geografia">
              <img src="{{ asset('images/materias/materia10.png') }}" alt="Icone da Materia">
            </a>
            <p>Geografia</p>
          </div>
          <div class="materia-circle">
            <a href="{{ route('materia-show', 11) }}" class="circle c5" id="fisica">
              <img src="{{ asset('images/materias/materia11.png') }}" alt="Icone da Materia">
            </a>
            <p>Física</p>
          </div>
          <div class="materia-circle">
            <a href="{{ route('materia-show', 12) }}" class="circle c5" id="quimica">
              <img src="{{ asset('images/materias/materia12.png') }}" alt="Icone da Materia">
            </a>
            <p>Química</p>
          </div>
        </div>
      </section>
      <p class="fs-3">Aconteceu na escola</p>
      <div class="carousel-container" id="carousel2">
        <div class="carousel-content">
          <ul class="carousel-items">
            @foreach ($noticiasFiltro as $noticia)
              <li id="hero-card2-{{ $loop->iteration }}" class="hero-card {{ $loop->first ? 'hero-card-active' : '' }}">
                <a href="{{ route('aconteceu-escola')}}" class="w-100 h-100 image-link">
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
          <div id="bullet-control2">
            @for ($i = 1; $i <= count($noticiasFiltro); $i++)
              <div
                onclick="setCarousel2(this.id)"
                class="bullet-control-bullet {{ $i === 1 ? 'bullet-control-bullet-active' : '' }}"
                id="bullet-control2-{{ $i }}">
              </div>
            @endfor
          </div>
        </div>
      </div>
    </main>
    @include('template.footer')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const intervalo = 8000;
    const estados   = [
      [ 0,  1, -1],
      [ 1, -1,  0],
      [-1,  0,  1]
    ];
  
    function transformarPara(pos) {
      if (pos ===  0) return 'translateX(0)';
      if (pos ===  1) return 'translateX(1100px)';
      if (pos === -1) return 'translateX(-1100px)';
    }
  
    document.addEventListener('DOMContentLoaded', () => {
      // --- CARROSSEL 1 ---
      const cards1   = Array.from(document.querySelectorAll('#carousel1 .hero-card'));
      const left1    = document.getElementById('left1');
      const right1   = document.getElementById('right1');
      const bullets1 = Array.from(document.querySelectorAll('#bullet-control1 .bullet-control-bullet'));
      let estado1    = 0, prev1 = 0, idInt1;
  
      function atualizar1(oldIdx) {
        const newPos = estados[estado1];
        const oldPos = estados[oldIdx];
        cards1.forEach((card, i) => {
          const de   = oldPos[i];
          const para = newPos[i];
          card.style.transition = Math.abs(de - para) === 2
            ? 'none'
            : 'transform 0.5s ease-in-out';
          card.style.transform  = transformarPara(para);
          card.classList.toggle('hero-card-active', para === 0);
        });
        bullets1.forEach((b, i) =>
          b.classList.toggle('bullet-control-bullet-active', i === estado1)
        );
        prev1 = estado1;
      }
  
      window.setCarousel1 = id => {
        const idx = parseInt(id.split('-').pop(), 10) - 1;
        if (isNaN(idx)) return;
        const old = estado1;
        estado1 = idx;
        atualizar1(old);
      };
  
      function iniciar1() {
        idInt1 = setInterval(() => {
          const old = estado1;
          estado1 = (old + 1) % estados.length;
          atualizar1(old);
        }, intervalo);
      }
      function reiniciar1() {
        clearInterval(idInt1);
        iniciar1();
      }
  
      left1.addEventListener('click', () => {
        const old = estado1;
        estado1 = (old - 1 + estados.length) % estados.length;
        atualizar1(old);
        reiniciar1();
      });
      right1.addEventListener('click', () => {
        const old = estado1;
        estado1 = (old + 1) % estados.length;
        atualizar1(old);
        reiniciar1();
      });
      bullets1.forEach(b =>
        b.addEventListener('click', e => {
          setCarousel1(e.target.id);
          reiniciar1();
        })
      );
  
      // posição inicial e start do auto-scroll
      atualizar1(0);
      iniciar1();
  
  
      // --- CARROSSEL 2 ---
      const cards2   = Array.from(document.querySelectorAll('#carousel2 .hero-card'));
      const left2    = document.getElementById('left2');
      const right2   = document.getElementById('right2');
      const bullets2 = Array.from(document.querySelectorAll('#bullet-control2 .bullet-control-bullet'));
      let estado2    = 0, prev2 = 0, idInt2;
  
      function atualizar2(oldIdx) {
        const newPos = estados[estado2];
        const oldPos = estados[oldIdx];
        cards2.forEach((card, i) => {
          const de   = oldPos[i];
          const para = newPos[i];
          card.style.transition = Math.abs(de - para) === 2
            ? 'none'
            : 'transform 0.5s ease-in-out';
          card.style.transform  = transformarPara(para);
          card.classList.toggle('hero-card-active', para === 0);
        });
        bullets2.forEach((b, i) =>
          b.classList.toggle('bullet-control-bullet-active', i === estado2)
        );
        prev2 = estado2;
      }
  
      window.setCarousel2 = id => {
        const idx = parseInt(id.split('-').pop(), 10) - 1;
        if (isNaN(idx)) return;
        const old = estado2;
        estado2 = idx;
        atualizar2(old);
      };
  
      function iniciar2() {
        idInt2 = setInterval(() => {
          const old = estado2;
          estado2 = (old + 1) % estados.length;
          atualizar2(old);
        }, intervalo);
      }
      function reiniciar2() {
        clearInterval(idInt2);
        iniciar2();
      }
  
      left2.addEventListener('click', () => {
        const old = estado2;
        estado2 = (old - 1 + estados.length) % estados.length;
        atualizar2(old);
        reiniciar2();
      });
      right2.addEventListener('click', () => {
        const old = estado2;
        estado2 = (old + 1) % estados.length;
        atualizar2(old);
        reiniciar2();
      });
      bullets2.forEach(b =>
        b.addEventListener('click', e => {
          setCarousel2(e.target.id);
          reiniciar2();
        })
      );
  
      // posição inicial e start do auto-scroll
      atualizar2(0);
      iniciar2();
    });
  </script>
  
</body>
</html>
