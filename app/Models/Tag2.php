<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag2 extends Model
{
    use HasFactory;
    protected $table = 'tag2';
    protected $primaryKey = 'tag2_ID';

    protected $fillable = [
        'tag2'
    ];
}
