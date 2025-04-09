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
    z-index: 1000; /* Add this to ensure tooltip stays on top */
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
                <h2>Profile HIKA</h2>
                <!-- <p>Our Hardworking Team</p> -->
                </div><!-- End Section Title -->
                <div class="post-img" style="justify-self:center;">
                <img src="/images/serikatjuang.jpg" alt="" class="img-fluid" style="width: 100%; height: auto; object-fit: cover;">
                </div>

                <div>
                    <h3 class="title" style="color:#55A9B6; justify-content:center; text-align:center">Visi</h3>
                    <p>
                    <ol>
                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                        <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                        <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                    </ol>
                    </p>
                </div>
                <div>
                    <h3 class="title" style="color:#55A9B6; justify-content:center; text-align:center">Misi</h3>
                    <p>
                    <ol>
                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                        <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                        <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                    </ol>
                    </p>
                </div>
                <h5 style="text-align:center">Permulaan, menuju hal yang lebih baik untuk semua <color style="color:#55A9B6">anggota hika bf</color>.</h5>

                <div class="row text-center mt-4">
                    <div class="col-md-4">
                        <h2 style="color:black">1500</h2>
                        <p>Total Anggota</p>
                    </div>
                    <div class="col-md-4">
                        <h2 style="color:#E86439">1200</h2>
                        <p>Laki-laki</p>
                    </div>
                    <div class="col-md-4">
                        <h2 style="color:#55A9B6">300</h2>
                        <p>Perempuan</p>
                    </div>
                </div>



            </div>

            </section><!-- /Team Section -->

      

        </div>
      </div>
    </div>
    </section>


@endsection
