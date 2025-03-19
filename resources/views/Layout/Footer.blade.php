
<footer id="footer" class="footer dark-background">
    <div class="container">
    <img src="/images/logo hika.png" alt="Hika Biofarma" style="width: 200px; max-height: 100px; object-fit: contain;">

      <p>Our Social Media</p>
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-skype"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
      <div class="container">
        <div class="copyright">
          <span>Copyright</span> <strong class="px-1 sitename">HIKA Biofarma</strong> <span>All Rights Reserved</span>
        </div>
       
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader-new">
  <div class="preloader-new-container">
    <!-- SVG Loading Animation -->
    <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
      <circle cx="50" cy="50" r="45" fill="none" stroke="#55A9B6" stroke-width="8" stroke-linecap="round">
        <animateTransform 
          attributeName="transform" 
          type="rotate" 
          from="0 50 50" 
          to="360 50 50" 
          dur="1s" 
          repeatCount="indefinite" />
      </circle>
      <circle cx="50" cy="50" r="25" fill="none" stroke="#333" stroke-width="5" stroke-dasharray="40 60" stroke-linecap="round">
        <animateTransform 
          attributeName="transform" 
          type="rotate" 
          from="360 50 50" 
          to="0 50 50" 
          dur="1.5s" 
          repeatCount="indefinite" />
      </circle>
    </svg>
    <!-- Logo in center of loading animation -->
    <img src="/images/logo hika.png" alt="Hika Biofarma" class="preloader-logo">
  </div>
</div>


  <!-- Vendor JS Files -->
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>
<script>
  // Make sure this is the only preloader script running
  document.addEventListener('DOMContentLoaded', function() {
    console.log('Preloader initialized'); // Debug message
  });
  
  window.addEventListener('load', function() {
    const preloader = document.getElementById('preloader-new');
    console.log(preloader)
    if (preloader) {
      console.log('Window loaded, removing preloader'); // Debug message
      setTimeout(function() {
        preloader.classList.add('fade-out');
        setTimeout(function() {
          preloader.remove();
        }, 500);
      }, 300);
    }
  });
</script>
</html>