<div>
<section id="blog-comments" class="blog-comments section">
<style>
.reply-content {
    width: 100%;
    background: #f8f9fa;
    border-radius: 5px;
    padding: 15px;
    margin: 10px 0;
}

.reply-form {
    width: 100%;
}

</style>
<div class="container ">
    <div class="custom-box-shadow" style="padding:20px"> 
        <h4 class="comments-count">{{$total_komentar}} komentar </h4>
        @foreach ($komentars as $komentar)
                <div id="comment-{{$loop->index}}" class="comment">
                    <div class="d-flex">
                        <div class="comment-img"><img src="/{{$komentar->anggota->images ? $komentar->anggota->images : 'images/profile/default.jpg'}}" 
                        onerror="this.src='/images/profile/default.jpg'"  alt=""  class="rounded-circle"></div>
                            <div class="comment-content position-relative">
                            <h5 style="font-weight:bold">{{$komentar->anggota->nama_lengkap}}
                                @if(Auth::check())
                                <a href="#"id="reply-{{$komentar->id}}" class="reply-link" data-comment-id="{{$komentar->id}}"><i class="bi bi-reply-fill"></i> Reply</a>
                                @endif
                                <time datetime="2020-01-01">{{$komentar->created_at->diffForHumans()}}</time>

                            <p style="font-weight:normal">
                                {{$komentar->komentar}}
                            </p>
                    </div>
                </div>
                @if(count($komentar->childs) > 0) 
                    @foreach ($komentar->childs as $child)
                        <div id="comment-reply-{{$komentar->id}}-{{$child->id}}" class="comment comment-reply">
                            <div class="d-flex">
                            <div class="comment-img"><img src="/{{$child->anggota->images ? $child->anggota->images : 'images/profile/default.jpg'}}" 
                            onerror="this.src='/images/profile/default.jpg'" alt=""  class="rounded-circle"></div>
                            <div>
                                <h5><a href="">{{$child->anggota->nama_lengkap}}</a> 
                                <!-- <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5> -->
                                <time datetime="2020-01-01">{{$child->created_at->diffForHumans()}}</time>
                                <p>
                            {{$child->komentar}}
                                </p>
                            </div>
                            </div>

                        </div><!-- End comment reply #2-->
                    @endforeach
                @endif
                          <!-- Update the tooltip-reply div -->
                    <div class="reply-content" id="tooltip-reply-{{$komentar->id}}" style="display: none; ">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small>Reply to {{$komentar->anggota->nama_lengkap}}</small>
                            <button type="button" class="btn-close close-tooltip" data-tooltip-id="tooltip-reply-{{$komentar->id}}" aria-label="Close"></button>
                        </div>
                        <form wire:submit.prevent="createReply({{$beritaId}}, {{$komentar->id}})" class="reply-form">
                            <div class="form-group mb-2">
                                <textarea class="form-control" 
                                    wire:model.debounce.2000ms="replyText.{{$komentar->id}}" 
                                    x-data
                                    x-on:input="$el.closest('.reply-content').style.display = 'block'"
                                    rows="3" 
                                    placeholder="Write your reply here...">
                                </textarea>
                                @error('replyText.'.$komentar->id) <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-sm" wire:loading.attr="disabled">
                                    Post Reply
                                </button>
                            </div>
                        </form>
                    </div>

                        <script>
                            // Reply button click handler with improved event handling
                            document.getElementById('reply-{{$komentar->id}}').addEventListener('click', function(e) {
                                e.preventDefault();
                                const tooltipReply = document.getElementById('tooltip-reply-{{$komentar->id}}');
                                if (tooltipReply) {
                                    tooltipReply.style.display = 'block';
                                }
                            });

                            // Add event listeners to prevent tooltip from closing
                            const tooltipReply = document.getElementById('tooltip-reply-{{$komentar->id}}');
                            
                            // Prevent closing when clicking inside the tooltip
                            tooltipReply.addEventListener('click', function(e) {
                                e.stopPropagation();
                            });

                            // Prevent closing when typing in textarea
                            tooltipReply.querySelector('textarea').addEventListener('focus', function(e) {
                                e.stopPropagation();
                                tooltipReply.style.display = 'block';
                            });

                            // Handle close button separately
                            const closeButton = tooltipReply.querySelector('.close-tooltip');
                            if (closeButton) {
                                closeButton.addEventListener('click', function(e) {
                                    e.preventDefault();
                                    e.stopPropagation();
                                    tooltipReply.style.display = 'none';
                                });
                            }

                            // Prevent form submission from closing tooltip
                            tooltipReply.querySelector('form').addEventListener('submit', function(e) {
                                e.stopPropagation();
                            });
                        </script>


            </div><!-- End comment #1 -->
    

        @endforeach
    </div>
</div>

</section><!-- /Blog Comments Section -->
    <!-- Comment Form Section -->
    <!-- Comment Form Section -->
@if(Auth::check())
<section id="comment-form" class="comment-form section">
    <div class="container">
        <form wire:submit.prevent="createComment({{$beritaId}})">
            <h4>Post Comment</h4>
            <div class="row">
                <div class="col form-group">
                    <textarea wire:model="commentText" name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                    @error('commentText') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    <span  wire:target="createComment({{$beritaId}})">
                        <i role="status" aria-hidden="true"></i>
                    </span>
                    Post Comment
                </button>
            </div>
        </form>
    </div>
</section><!-- /Comment Form Section -->
@endif


</div>
