<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class AdminGallery extends Component
{
    use WithPagination, WithoutUrlPagination; 
    public $search = '';

    public function paginationView()
    {
        return 'layouts.paginator';
    }

    public function render()
    {
        return view('livewire.admin-gallery', [
            'gallery' => Gallery::search($this->search)->paginate(5)
        ]);
    }
}
