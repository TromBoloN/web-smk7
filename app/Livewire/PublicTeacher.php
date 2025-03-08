<?php

namespace App\Livewire;

use App\Models\Guru;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class PublicTeacher extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.public-teacher', [
            'gurus' => Guru::search($this->search)->get()
        ]);
    }
}
