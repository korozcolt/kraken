<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votation extends Model
{
    use HasFactory;
    protected $table = 'votations';
    protected $fillable = [
        'dni', 'status'
    ];
}
