<?php

namespace App\Http\Livewire\Komentar;

use Livewire\Component;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;
class ListKomentar extends Component
{
    public $komentars;
    public $commentText;
    public $beritaId;
    public $replyText = [];

    public function mount($idBerita) {
        $this->beritaId = $idBerita;
        $this->loadComments();
         // Initialize replyText array for each comment
    foreach($this->komentars as $komentar) {
        $this->replyText[$komentar->id] = '';
    }
    

    }
    public function render()
    {
        return view('livewire.komentar.list-komentar',[
            'total_komentar' => $this->komentars->count(),
        ] );
    }
    public function loadComments()
    {
        $this->komentars = Komentar::where('id_berita', $this->beritaId)
            ->whereNull('parent')
            ->with(['anggota','childs'])
            ->orderBy('created_at', 'desc')
            ->get();
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
      

        // Reset the form
        $this->reset('commentText');
        
        // Refresh the comments list
        $this->loadComments();
        
        // Show a success message
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
      
        // Reset the reply form
        $this->replyText[$parentId] = '';
        
        $this->loadComments();

        // Refresh the comments list
        $this->emit('refreshComments');
        
        // Show a success message
        session()->flash('message', 'Reply added successfully!');
        
        // This will trigger JavaScript to hide the tooltip
        $this->dispatchBrowserEvent('replySubmitted', ['parentId' => $parentId]);
    }
    
}
