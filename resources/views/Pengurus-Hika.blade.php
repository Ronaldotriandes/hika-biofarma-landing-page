@extends('Layout/Master')
    @section('content')
    <section id="hero" class="hero section">
    <style>
/* Tooltip Reply Styles */
.comment-content {
  width: 100%;
  position: relative;
}

.tooltip-reply {
  position: absolute;
  right: 0;
  top: 30px;
  width: 100% !important;
  background: #ffffff;
  border: 1px solid #ddd;
  border-radius: 5px;
  padding: 10px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.2);
  z-index: 100;
}
</style>

    <div class="container">
      <div class="row" style="justify-content: center; padding-top:200px">

        <div class="col-lg-10 custom-box-shadow ">
      <!-- Blog Details Section -->

          <section id="team" class="team section">

            <!-- Section Title -->
    
            <div class="container">
                <div class="container section-title" data-aos="fade-up">
                <h2>Pengurus HIKA</h2>
                <!-- <p>Our Hardworking Team</p> -->
                </div><!-- End Section Title -->
                <div class="row gy-4">

                    @foreach ($pengurus as $peng)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img">
                        <img src="/images/profile/{{$peng->images ? $peng->images : 'default.jpg'}}" 
                        onerror="this.src='/images/profile/default.jpg'" 
                         class="img-fluid" alt="">
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                        </div>
                        <div class="member-info">
                        <h4>{{$peng->nama_lengkap}}</h4>
                        <span>{{$peng->strukturOrganisasi->nama_jabatan}}</span>
                        </div>
                    </div>
                    </div>
                    @endforeach
                    

                </div>

            </div>

            </section><!-- /Team Section -->

      

        </div>
      </div>
    </div>
    </section>


@endsection
