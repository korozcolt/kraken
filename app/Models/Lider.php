<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','last' ,'dni','phone','phone2','coordinator_id', 'status','user_id'
    ];

    public function coordinator()
    {
        return $this->belongsTo(Coordinator::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function voter(){
        return $this->hasMany(Voter::class);
    }
}
