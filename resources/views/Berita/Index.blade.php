@extends('Layout/Master')
    @section('content')
    <section id="hero" class="hero section dark-background">
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
  background: #303134;
  border: 1px solid #ddd;
  border-radius: 5px;
  padding: 10px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.2);
  z-index: 100;
}
</style>

    <div class="container">
      <div class="row" style="justify-content: center; padding-top:100px">

        <div class="col-lg-10">

          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section" style="padding-top:0;">
            <div class="container">

              <article class="article">

                <div class="post-img" style="justify-self:center;">
                <img src="{{ config('services.cms.url') }}/images/berita/{{$berita->banner_image}}" alt="" class="img-fluid">
                </div>

                <h2 class="title">{{$berita->judul}}</h2>

                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">John Doe</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">Jan 1, 2022</time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li>
                  </ul>
                </div><!-- End meta top -->

                <div class="content">
                  <p>
                    Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                    Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
                  </p>

                  <p>
                    Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.
                  </p>

                  <blockquote>
                    <p>
                      Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.
                    </p>
                  </blockquote>

                  <p>
                    Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat.
                    Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque.
                    Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.
                  </p>

                  <h3>Et quae iure vel ut odit alias.</h3>
                  <p>
                    Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui.
                    Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea.
                    Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.
                  </p>
                  <img src="/assets/img/blog/blog-inside-post.jpg" class="img-fluid" alt="">

                  <h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>
                  <p>
                    Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel.
                    Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.
                  </p>
                  <p>
                    Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.
                  </p>

                </div><!-- End post content -->

                <div class="meta-bottom">
                  <i class="bi bi-folder"></i>
                  <ul class="cats">
                    <li><a href="#">Business</a></li>
                  </ul>

                  <i class="bi bi-tags"></i>
                  <ul class="tags">
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li>
                  </ul>
                </div><!-- End meta bottom -->

              </article>

            </div>
          </section><!-- /Blog Details Section -->

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
