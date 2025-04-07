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
                <div class="organizational-structure mt-5" style="overflow-x: auto;">
                    <h3 class="title" style="color:#55A9B6; text-align:center; margin-bottom:40px;">Struktur Organisasi HIKA-BF</h3>
                    
                    <div class="org-chart">
                        <ul class="lines">
                            <li class="root">
                                <div class="person" style="background:#55A9B6">
                                    <div class="name">Ketua Umum</div>
                                    <div class="title">John Doe</div>
                                </div>
                                <ul>
                                    <li>
                                        <div class="person" style="background:#E86439">
                                            <div class="name">Wakil Ketua</div>
                                            <div class="title">Jane Smith</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="person" style="background:#E86439">
                                            <div class="name">Sekretaris</div>
                                            <div class="title">Mike Johnson</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="person" style="background:#E86439">
                                            <div class="name">Bendahara</div>
                                            <div class="title">Sarah Williams</div>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="person" style="background:#EF8318">
                                                    <div class="name">Divisi Organisasi</div>
                                                    <div class="title">Alex Brown</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="person" style="background:#EF8318">
                                                    <div class="name">Divisi Hukum</div>
                                                    <div class="title">Emily Davis</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="person" style="background:#EF8318">
                                                    <div class="name">Divisi Ekonomi</div>
                                                    <div class="title">David Wilson</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="person" style="background:#EF8318">
                                                    <div class="name">Divisi Sosial</div>
                                                    <div class="title">Lisa Anderson</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

<style>
.org-chart {
    margin: 20px 0;
    padding: 30px 0;
}

.org-chart ul.lines {
    padding-left: 0;
    list-style: none;
    text-align: center;
}

.org-chart ul.lines ul {
    padding-top: 20px;
    position: relative;
    transition: all 0.5s;
    padding-left: 0;
}

.org-chart ul.lines li {
    float: left;
    text-align: center;
    list-style-type: none;
    position: relative;
    padding: 20px 10px;
    transition: all 0.5s;
}

.org-chart ul.lines li::before,
.org-chart ul.lines li::after {
    content: '';
    position: absolute;
    top: 0;
    right: 50%;
    border-top: 2px solid #ccc;
    width: 50%;
    height: 20px;
}

.org-chart ul.lines li::after {
    right: auto;
    left: 50%;
    border-left: 2px solid #ccc;
}

.org-chart ul.lines li:only-child::before,
.org-chart ul.lines li:only-child::after {
    display: none;
}

.org-chart ul.lines li:only-child {
    padding-top: 0;
}

.org-chart ul.lines li:first-child::before,
.org-chart ul.lines li:last-child::after {
    border: 0 none;
}

.org-chart ul.lines li:last-child::before {
    border-right: 2px solid #ccc;
    border-radius: 0 5px 0 0;
}

.org-chart ul.lines li:first-child::after {
    border-radius: 5px 0 0 0;
}

.org-chart ul.lines ul::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    border-left: 2px solid #ccc;
    width: 0;
    height: 20px;
}

.person {
    border-radius: 4px;
    color: #fff;
    padding: 15px 10px;
    min-width: 180px;
    max-width: 200px;
    margin: 0 auto;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.person .name {
    font-weight: bold;
    margin-bottom: 5px;
    font-size: 16px;
}

.person .title {
    font-size: 14px;
    opacity: 0.9;
}

.root > .person {
    width: 220px;
}
</style>

            </div>

            </section><!-- /Team Section -->

      

        </div>
      </div>
    </div>
    </section>


@endsection
