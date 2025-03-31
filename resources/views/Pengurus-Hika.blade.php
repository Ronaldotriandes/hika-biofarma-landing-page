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

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img">
                        <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                        </div>
                        <div class="member-info">
                        <h4>Walter White</h4>
                        <span>Chief Executive Officer</span>
                        </div>
                    </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member">
                        <div class="member-img">
                        <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                        </div>
                        <div class="member-info">
                        <h4>Sarah Jhonson</h4>
                        <span>Product Manager</span>
                        </div>
                    </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-member">
                        <div class="member-img">
                        <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                        </div>
                        <div class="member-info">
                        <h4>William Anderson</h4>
                        <span>CTO</span>
                        </div>
                    </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-member">
                        <div class="member-img">
                        <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                        </div>
                        <div class="member-info">
                        <h4>Amanda Jepson</h4>
                        <span>Accountant</span>
                        </div>
                    </div>
                    </div><!-- End Team Member -->

                </div>

            </div>

            </section><!-- /Team Section -->

      

        </div>
      </div>
    </div>
    </section>


@endsection
