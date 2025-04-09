<?php

namespace App\Http\Livewire\Berita;

use Livewire\Component;
use App\Models\Berita;
use App\Models\Kategori_berita;

class ListBerita extends Component
{
    public $search = '';
    public $beritas;
    public $kategori;
    public $limit;
    public function mount($kategori, $limit = null)
    {
        $this->loadBeritas();
        $this->kategori = $kategori;
        $this->limit = $limit;
    }

    public function loadBeritas()
    {
        $kategori = $this->kategori == 'All' ? 'Berita' : Kategori_berita::where('nama_kategori', $this->kategori)->first()?->id;
        $query = Berita::where('is_publish', 1)
        ->where(function($query) {
            $query->where('judul', 'like', '%' . $this->search . '%')
                ->orWhere('konten', 'like', '%' . $this->search . '%');
        })
        ->where(function($query) {
            if (!auth()->check()) {
                $query->where('is_publish_member', 0);
            } else {
                $query->where('is_publish_member', 1);
            }
        });

        if ($this->kategori !== 'All') {
            $query->where('id_kategori_berita', $this->kategori);
        }
        if ($this->limit) {
            $query->limit($this->limit);
        }
        $this->beritas = $query->get();
        }


    public function updatedSearch()
    {
        $this->loadBeritas();
    }

    public function render()
    {
        return view('livewire.berita.list-berita');
    }
}
