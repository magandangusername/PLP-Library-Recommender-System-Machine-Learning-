<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag4 extends Model
{
    use HasFactory;
    protected $table = 'tag3';
    protected $primaryKey = 'tag3_ID';

    protected $fillable = [
        'tag3'
    ];
}
