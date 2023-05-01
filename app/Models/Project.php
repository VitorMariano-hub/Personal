<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // importa o trait


class Project extends Model
{
    use HasFactory, SoftDeletes; // adiciona o trait
    
    protected $table = 'projects';

    protected $fillable = [
        'name',
        'description',
        'languages_used',
        'image_path'
    ];

    protected $dates = ['deleted_at']; // adiciona a coluna deleted_at aos dates do Eloquent
    
}
