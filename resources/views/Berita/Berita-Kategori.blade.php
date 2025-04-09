
@extends('Layout/Master')
    @section('content')

    <div class="container">
        <div class="row" style="justify-content: center; padding-top:200px">

        <!-- Recent Posts Section -->

            <livewire:berita.list-berita kategori='All'/>
            <livewire:berita.list-berita kategori='Sosial'/>
        </div>
    </div>

  </main>

@endsection