<?php

namespace App\Livewire;

use App\Models\BlogPost;
use App\Models\Guru;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class AdminTeacher extends Component
{
    use WithPagination, WithoutUrlPagination; 
    public $search = '';

    public function paginationView()
    {
        return 'layouts.paginator';
    }

    public function render()
    {
        return view('livewire.admin-teacher', [
            'teachers' => Guru::search($this->search)->paginate(5)
        ]);
    }
}
