@include('template.head')
<body>
    <div class="w-100 h-100 body-container d-flex flex-column justify-content-center">
        @include('template.nav')
        @if(Auth::user()->nivel === 1)
            <main>
                
            </main>
        @endif
        @if(Auth::user()->nivel === 2)
            <main>
                
            </main>
        @endif
        @if(Auth::user()->nivel === 4)
            <main>
                
            </main>
        @endif
        @include('template.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>