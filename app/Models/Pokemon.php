<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    
    protected $table = 'pokemon';

    protected $fillable = [
        'id', 'name', 'base_experience', 'height', 'is_default', 'order', 'weight', 'sprite'
    ];

    protected $hidden = array('');

    public $timestamps = true;
}
