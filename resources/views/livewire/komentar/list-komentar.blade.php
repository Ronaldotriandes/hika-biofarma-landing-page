<div>
<section id="blog-comments" class="blog-comments section">

<div class="container">

  <h4 class="comments-count">{{$total_komentar}} komentar</h4>
    @foreach ($komentars as $komentar)
        <div id="comment-{{$loop->index}}" class="comment">
            <div class="d-flex">
                <div class="comment-img"><img src="/assets/img/blog/comments-1.jpg" alt=""  class="rounded-circle"></div>
                <div class="comment-content position-relative">
                    <h5><a href="">{{$komentar->anggota->nama_lengkap}}</a> <a href="#" class="reply-link" data-comment-id="1"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <p>
                    {{$komentar->komentar}}
                    </p>
                    
                    <!-- Tooltip Reply Form -->
                    <div class="tooltip-reply" id="tooltip-reply-{{$komentar->id}}" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small>Reply to {{$komentar->anggota->nama_lengkap}}</small>
                            <button type="button" class="btn-close close-tooltip" data-tooltip-id="tooltip-reply-{{$komentar->id}}" aria-label="Close"></button>
                        </div>
                        <form wire:submit.prevent="createReply({{$komentar->id}})" class="tooltip-reply-form">
                            <div class="form-group mb-2">
                                <textarea class="form-control" wire:model="replyText.{{$komentar->id}}" rows="3" placeholder="Write your reply here..."></textarea>
                                @error('replyText.'.$komentar->id) <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-sm" wire:loading.attr="disabled">
                                    <span wire:loading wire:target="createReply({{$komentar->id}})">
                                        <i class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></i>
                                    </span>
                                    Post Reply
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if(count($komentar->childs) > 0) 
                @foreach ($komentar->childs as $child)
                    <div id="comment-reply-{{$komentar->id}}-{{$child->id}}" class="comment comment-reply">
                        <div class="d-flex">
                        <div class="comment-img"><img src="/assets/img/blog/comments-4.jpg" alt=""  class="rounded-circle"></div>
                        <div>
                            <h5><a href="">Sianna Ramsay</a> 
                            <!-- <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5> -->
                            <time datetime="2020-01-01">01 Jan,2022</time>
                            <p>
                           {{$child->komentar}}
                            </p>
                        </div>
                        </div>

                    </div><!-- End comment reply #2-->
                @endforeach
            @endif
           

        </div><!-- End comment #1 -->
    @endforeach


</div>

</section><!-- /Blog Comments Section -->
    <!-- Comment Form Section -->
    <!-- Comment Form Section -->
<section id="comment-form" class="comment-form section">
    <div class="container">
        <form wire:submit.prevent="createComment">
            <h4>Post Comment</h4>
            <div class="row">
                <div class="col form-group">
                    <textarea wire:model="commentText" name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                    @error('commentText') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    <span  wire:target="createComment">
                        <i class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></i>
                    </span>
                    Post Comment
                </button>
            </div>
        </form>
    </div>
</section><!-- /Comment Form Section -->

</div>
