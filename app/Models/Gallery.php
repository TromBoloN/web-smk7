<?php

namespace App\Models;

use App\Traits\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    use Filter;

    protected $searchQuery = ['caption'];

    protected $guarded = ['id'];
}
