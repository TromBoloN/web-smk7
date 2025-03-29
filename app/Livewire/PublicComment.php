<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Guru;
use Livewire\Component;
use Livewire\WithPagination;

class PublicComment extends Component
{
    public $sort;
    public $postId; 
    public $take = 3;

    public function deleteComment($id){
        $comment = Comment::find($id)->delete();


        if($comment){
            $this->dispatch('alertz', [
                'type' => 'success',
                'title' => 'Aksi Berhasil!',
                'message' => 'Komentar berhasil dihapus!',
            ]);
        }else{
            $this->dispatch('alertz', [
                'type' => 'danger',
                'title' => 'Aksi Gagal!',
                'message' => 'Komentar gagal dihapus!',
            ]);
        }
        
    }

    public function loadMore(){
        $this->take += 3;
    }

    public function render()
    {
        return view('livewire.public-comment', [
            'comments' => Comment::where('post_id', $this->postId)->take($this->take)->orderBy('created_at', $this->sort)->get(),
            'actual_amount_comment' => Comment::where('post_id', $this->postId)->get()->count()
        ]);
    }
}
