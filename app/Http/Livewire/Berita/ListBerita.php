<?php

namespace App\Http\Livewire\Berita;

use Livewire\Component;
use App\Models\Berita;
use App\Models\Kategori_berita;
use Illuminate\Support\Facades\Auth;

class ListBerita extends Component
{
    public $search = '';
    public $beritas;
    public $kategori;
    public $limit;
    public $list_kategori = [];
    public function mount($kategori, $limit = null)
    {
        $this->kategori = $kategori;
        $this->limit = $limit;
        $this->loadBeritas();
    }

    public function loadBeritas()
    {
        $kategori = $this->kategori == 'All' ? 'Berita' : Kategori_berita::where('nama_kategori', $this->kategori)->first()?->id;
        $this->list_kategori = Kategori_berita::all();
        $query = Berita::where('is_publish', 1)
        ->where(function($query) {
            $query->where('judul', 'like', '%' . $this->search . '%')
                ->orWhere('konten', 'like', '%' . $this->search . '%');
        })
        ->where(function($query) {
            if (!Auth()->check()) {
                $query->where('is_publish_member', 0);
            } 
        });

        if ($kategori !== 'Berita') {
            $query->where('id_kategori_berita', $kategori);
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
