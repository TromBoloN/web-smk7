<?php

namespace App\Models;

use App\Traits\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    use Filter;

    protected $searchQuery = ['nama', 'mapel'];
    protected $table = 'guru';
    protected $primaryKey = 'guru_id';

    protected $fillable = [
        'nama',
        'mapel',
        'foto',
    ];
}
