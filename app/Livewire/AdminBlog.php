<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class AdminBlog extends Component
{
    use WithPagination, WithoutUrlPagination; 
    public $search = '';

    public function paginationView()
    {
        return 'layouts.paginator';
    }

    public function render()
    {
        return view('livewire.admin-blog', [
            'posts' => BlogPost::search($this->search)->paginate(5)
        ]);
    }
}
