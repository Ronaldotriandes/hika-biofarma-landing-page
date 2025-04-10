<div>
    @if (count($beritas) > 0)
    <section id="recent-posts" class="recent-posts section">

        <div class="container section-title" >
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a href="/berita/{{$kategori == 'All' ? 'All' : $kategori}}"><h2>Selengkapnya ... </h2></a>
                    <p>Info {{$kategori == 'All' ? 'Semua Berita' : $kategori}}<br></p>
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
            <div class="row gy-4">
                @foreach($beritas as $ber)
                    <div class="col-xl-4 col-md-6"  data-aos-delay="100">
                        <article>
                            <div class="post-img">
                                <img src="{{ config('services.cms.url') }}/images/berita/{{$ber->banner_image}}" alt="" class="img-fluid">
                            </div>
                            <h2 class="title">
                                <a href="{{ url('/berita/'.$ber->kategori_berita->nama_kategori.'/'.$ber->slug) }}">{{$ber->judul}}</a>
                            </h2>
                            <p class="post-category">Baca Selengkapnya ...</p>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</div>
