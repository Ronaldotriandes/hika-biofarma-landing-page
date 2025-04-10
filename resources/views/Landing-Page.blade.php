
@extends('Layout/Master')
    @section('content')

    <div class="page-title dark-background" style="height: 200px;background-color:rgba(42, 44, 57, 0.9)">
      <div class="container position-relative">
        <h3><span id="welcome-text"></span></h3>
        @if(!Auth::check())
        <h4 style="font-weight: 600"><span><a href="/form-registrasi"><color style="color:#55A9B6">Join</color></a> HIKA Biofarma sekarang juga</span></h4>
        @endif
        <!-- <h2>Selamat datang di portal berita HIKA Biofarma</h2> -->
        <!-- <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p> -->
      </div>
    </div><!-- End Page Title -->
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background" style="background-color:rgba(42, 44, 57, 0.9)">

      <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

        <!-- Slide 1 -->
        @php $firstItem = true; @endphp
        @foreach($beritas as $ber)
            @if($ber->is_publish == 1 && 
                ((!Auth::check() && $ber->is_publish_member== 0) || 
                (Auth::check() && $ber->is_publish_member== 1)))
                <div class="carousel-item {{$firstItem ? 'active' : ''}}">
                    <div class="carousel-container">
                        <div class="text-center mb-4 banner-container">
                            <img src="{{ config('services.cms.url') }}/{{$ber->banner_image}}" alt="Slide Image" class="img-fluid animate__animated animate__fadeIn banner-image">
                        </div>
                        <h2 class="animate__animated animate__fadeInDown" style="margin-bottom:0px">{{$ber->judul}}</h2>
                        <a href="{{ route('getDetailBerita', ['kategori' => $ber->kategori_berita, 'slug' => $ber->slug]) }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                    </div>
                </div>
                @php $firstItem = false; @endphp
            @endif
        @endforeach



        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>

    </section><!-- /Hero Section -->


    <!-- Recent Posts Section -->

    <livewire:berita.list-berita kategori='All' limit='3'/>
    <livewire:berita.list-berita kategori='Sosial' limit='3'/>


    <!-- Contact Section -->
     @if(Auth::check())
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Aspirasi</h2>
        <p>Kotak Aspirasi</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade" data-aos-delay="100">

        <div class="row gy-4">
        <div class="col-lg-8">
            <form action="{{ route('aspirasi') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              @csrf
              <div class="row gy-4">

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required="" name="aspirasi"></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

          <div class="col-lg-4">
            <img src="/images/aspirasi.png" alt="Aspirasi" class="img-fluid" style="width: 50%; height: auto; object-fit: cover;">

          </div>


        </div>

      </div>

    </section><!-- /Contact Section -->
    @endif
  </main>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let types = 'Selamat Datang di Portal Berita HIKA Biofarma'
      @if(Auth::check())
      types = 'Selamat datang <span style="color: #55A9B6">{{Auth::user()->nama_lengkap}}</span> di portal Berita HIKA Biofarma'
      @endif
        var typed = new Typed('#welcome-text', {
            strings: [
               types
            ],
            typeSpeed: 50,        
            backSpeed: 30,     
            backDelay: 1500,     
            startDelay: 500,      
            loop: true,        
            showCursor: true,
            cursorChar: '|'
        });
    });
</script>

@endsection