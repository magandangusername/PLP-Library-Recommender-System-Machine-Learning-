<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag1 extends Model
{
    use HasFactory;
    protected $table = 'tag1';
    protected $primaryKey = 'tag1_ID';

    protected $fillable = [
        'tag1'
    ];
}
