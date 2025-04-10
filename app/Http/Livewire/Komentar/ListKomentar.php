<?php

namespace App\Http\Livewire\Komentar;

use Livewire\Component;
use App\Models\Komentar;
use App\Models\KataSensor;
use Illuminate\Support\Facades\Auth;

class ListKomentar extends Component
{
    public $komentars;
    public $commentText;
    public $beritaId;
    public $replyText = [];
    public $kata_sensor = [];
    public function mount($idBerita)
    {
        $this->beritaId = $idBerita;
        $this->loadComments();
        foreach ($this->komentars as $komentar) {
            $this->replyText[$komentar->id] = '';
        }
    }
    public function render()
    {
        return view('livewire.komentar.list-komentar', [
            'total_komentar' => $this->komentars->count(),
        ]);
    }
    public function loadComments()
    {
        $this->komentars = Komentar::where('id_berita', $this->beritaId)
            ->whereNull('parent')
            ->with(['anggota' => function ($query) {
                $query->withTrashed();
            }, 'childs'])
            ->orderBy('created_at', 'desc')
            ->get();
        $katasensor = KataSensor::pluck('kata');
        foreach ($this->komentars as $komentar) {
            $komentar->komentar = $this->censorWords($komentar->komentar, $katasensor);

            foreach ($komentar->childs as $child) {
                $child->komentar = $this->censorWords($child->komentar, $katasensor);
            }
        }

        $this->total_komentar = $this->komentars->count();
    }

    public function createComment($beritaId)
    {
        // $this->validate();
        $new = new Komentar();
        $new->id_berita = $beritaId;
        $new->id_anggota = Auth::user()->id;
        $new->parent = null;
        $new->komentar = $this->commentText;
        $new->save();


        $this->reset('commentText');

        $this->loadComments();

        session()->flash('message', 'Comment added successfully!');
    }
    public function createReply($beritaId, $parentId)
    {
        // $this->validate([
        //     'replyText.'.$parentId => 'required|min:3',
        // ], [
        //     'replyText.'.$parentId.'.required' => 'The reply cannot be empty.',
        //     'replyText.'.$parentId.'.min' => 'The reply must be at least 3 characters.',
        // ]);

        $new = new Komentar();
        $new->id_berita = $beritaId;
        $new->id_anggota = Auth::user()->id;
        $new->parent = $parentId;
        $new->komentar = $this->replyText[$parentId];
        $new->save();

        $this->replyText[$parentId] = '';

        $this->loadComments();

        $this->emit('refreshComments');

        session()->flash('message', 'Reply added successfully!');

        $this->dispatchBrowserEvent('replySubmitted', ['parentId' => $parentId]);
    }
    private function censorWords($text, $sensorWords)
    {
        foreach ($sensorWords as $word) {
            $stars = str_repeat('*', strlen($word));
            $text = str_ireplace($word, $stars, $text);
        }
        return $text;
    }
}
