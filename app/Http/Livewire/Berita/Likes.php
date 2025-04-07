<?php

namespace App\Http\Livewire\Berita;

use Livewire\Component;
use App\Models\Berita;

class Likes extends Component
{
    public $databerita;
    public $likeCount;

    public function mount($databerita)
    {
        $this->databerita = $databerita;
        $berita = Berita::find($databerita);
        $this->likeCount = $berita->disukai;
    }

    public function likeBerita()
    {
        $berita = Berita::find($this->databerita);
        $berita->increment('disukai');
        $this->likeCount = $berita->fresh()->disukai;
    }

    public function render()
    {
        return view('livewire.berita.likes');
    }
}
