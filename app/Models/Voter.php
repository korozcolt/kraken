<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','last' ,'dni','phone','phone2','lider_id', 'status', 'user_id'
    ];

    public function lider()
    {
        return $this->belongsTo(Lider::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function censo(){
        return $this->belongsTo(Censo::class,'dni','dni');
    }
}
