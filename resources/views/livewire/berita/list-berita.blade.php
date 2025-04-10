<div>
    @if (count($beritas) > 0 || $limit != 3)
    <section id="recent-posts" class="recent-posts section">
        <style>
            .article-container {
                position: relative;
                min-height: 400px;
                padding-bottom: 40px;
            }
            .tag-container {
                position: absolute;
                bottom: 10px;
                right: 15px;
            }
        </style>
        <style>
            .tag-btn {
                transition: all 0.3s ease;
                border: 1px solid #55A9B6;
                color: #55A9B6;
            }
            .tag-btn:hover {
                background-color: #55A9B6;
                color: white;
            }
            .tag-btn.active {
                background-color: #55A9B6;
                color: white;
            }
        </style>

        <div class="container section-title">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a href="/berita/{{$kategori == 'All' ? 'All' : $kategori}}"><h2>Selengkapnya ... </h2></a>
                    <p>Info {{$kategori == 'All' ? 'Semua Berita' : $kategori}}<br></p>
                    @if ($kategori == 'All' || $limit != 3)
                        <div class="d-flex gap-2 mt-2">
                            <a href="/berita/All" class="btn btn-sm tag-btn {{ $kategori == 'All' ? 'active' : '' }}">All</a>
                            @foreach ($list_kategori as $kat)
                                <a href="/berita/{{$kat->nama_kategori}}" class="btn btn-sm tag-btn {{ $kategori == $kat->nama_kategori ? 'active' : '' }}">{{$kat->nama_kategori}}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <input type="text" 
                        wire:model.debounce.1000ms="search" 
                        class="form-control" 
                        placeholder="Search news...">
                </div>
            </div>
        </div>

        <div class="container">
            @if (count($beritas) > 0)
            <div class="row gy-4">
                @foreach($beritas as $ber)
                    <div class="col-xl-4 col-md-6" data-aos-delay="100">
                        <article class="article-container">
                            <div class="post-img">
                                <img src="{{ config('services.cms.url') }}/{{$ber->banner_image}}" alt="" class="img-fluid">
                            </div>
                            <h2 class="title">
                                <a href="{{ url('/berita/'.$ber->kategori_berita->nama_kategori.'/'.$ber->slug) }}">{{$ber->judul}}</a>
                            </h2>
                            <a href="{{ url('/berita/'.$ber->kategori_berita->nama_kategori.'/'.$ber->slug) }}"><p class="post-category">Baca Selengkapnya ...</p></a>
                            <div class="d-flex align-items-center tag-container">
                                <i class="bi bi-tag me-1" style="color:black"></i>
                                <span class="post-category">{{$ber->kategori_berita->nama_kategori}}</span>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-5">
                    <i class="bi bi-newspaper" style="font-size: 48px; color: #55A9B6;"></i>
                    <h3 class="mt-3">Berita tidak tersedia</h3>
                    <p>Mohon coba pencarian lain atau lihat kategori berita lainnya</p>
                </div>
            @endif
        </div>
    </section>
    @endif
</div>
