
@extends('Layout/Master')
    @section('content')

    <div class="container">
        <div class="row" style="justify-content: center; padding-top:200px">
            <livewire:berita.list-berita :kategori='$kategori'/>
        </div>
    </div>

  </main>

@endsection