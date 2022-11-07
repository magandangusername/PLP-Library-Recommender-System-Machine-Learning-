<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document_Studies extends Model
{
    use HasFactory;
    

    protected $table = 'document_studies';
    protected $primaryKey = 'document_id';

    protected $fillable = [
        'document_number', 
        'title', 
        'date_submitted', 
        'author',
        'document_type',
        'addedby',
        'document_status',
    ];
    
}
