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
          <section id="blog-details" class="blog-details section" style="padding-top:0;">
            <div class="container">

              <article class="article">

                <div class="post-img" style="justify-self:center;">
                <img src="{{ config('services.cms.url') }}/{{$berita->banner_image}}" alt="" class="img-fluid" style="width: 100%; height: auto; object-fit: cover;">
                </div>

                <h2 class="title" style="padding:10px">{{$berita->judul}}</h2>

                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time datetime="2020-01-01">{{  Carbon\Carbon::parse($berita->created_at)->format('d-m-Y')}}</time></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> {{count($berita->komentars)}} komentar</li>
                    <li class="d-flex align-items-center"><i class="bi bi-tag me-1"></i>{{$berita->kategori_berita->nama_kategori}}</li>
                  </ul>
                </div>
                <div class="content">
                {!! $berita->konten !!}
                @if ($berita->support_image)
                <div class="image-slider mt-4" style="max-width: 300px; margin: 0 auto;">
                    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($berita->support_image as $key => $image)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ config('services.cms.url') }}/{{$image}}" class="d-block w-100" alt="Support Image">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev" style="left: -50px;">
                            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true" style="background-color: rgba(0,0,0,0.5); padding: 5px; border-radius: 50%;"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next" style="right: -50px;">
                            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true" style="background-color: rgba(0,0,0,0.5); padding: 5px; border-radius: 50%;"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="text-center mt-2">
                      <span>Supporting Images</span>
                    </div>
                </div>
                @endif
                <livewire:berita.likes :databerita="$berita->id" />
                </div>
              </article>
            </div>
          </section>
        <livewire:komentar.list-komentar :idBerita="$berita->id" />
        </div>
      </div>
    </div>
    </section>

   
@push('scripts')

@endpush
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Debug: Check if script is running
    console.log('Reply script loaded');
    
    // Get all reply links
    const replyLinks = document.querySelectorAll('.reply-link');
    console.log('Reply links found:', replyLinks.length); // Debug line
    
    // Add click event to all reply links
    replyLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Reply link clicked'); // Debug line
        
        // Get the comment ID
        const commentId = this.getAttribute('data-comment-id');
        console.log('Comment ID:', commentId); // Debug line
        
        // Hide all tooltips first
        document.querySelectorAll('.tooltip-reply').forEach(tooltip => {
          tooltip.style.display = 'none';
        });
        
        // Show the tooltip for this comment
        const tooltipReply = document.getElementById('tooltip-reply-' + commentId);
        console.log('Tooltip element:', tooltipReply); // Debug line
        
        if (tooltipReply) {
          tooltipReply.style.display = 'block';
          
          // Focus on the textarea
          tooltipReply.querySelector('textarea').focus();
        } else {
          console.error('Tooltip element not found for comment ID:', commentId);
        }
      });
    });
    
    // Add click event to all close buttons
    const closeButtons = document.querySelectorAll('.close-tooltip');
    closeButtons.forEach(button => {
      button.addEventListener('click', function() {
        const tooltipId = this.getAttribute('data-tooltip-id');
        document.getElementById(tooltipId).style.display = 'none';
      });
    });
    
    // Handle form submission
    const tooltipForms = document.querySelectorAll('.tooltip-reply-form');
    tooltipForms.forEach(form => {
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const commentId = this.querySelector('input[name="parent_comment_id"]').value;
        const replyText = this.querySelector('textarea').value;
        
        if (replyText.trim() !== '') {
          // Hide the tooltip after submission
          document.getElementById('tooltip-reply-' + commentId).style.display = 'none';
          
          // Show a success message
          alert('Reply submitted successfully!');
        }
      });
    });
    
    // Close tooltip when clicking outside
    document.addEventListener('click', function(e) {
      if (!e.target.closest('.tooltip-reply') && !e.target.closest('.reply-link')) {
        document.querySelectorAll('.tooltip-reply').forEach(tooltip => {
          tooltip.style.display = 'none';
        });
      }
    });
  });
</script>

@endsection
