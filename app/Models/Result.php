<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected  $primaryKey = 'id_user';

    public function result(){
        return $this->hasOne(User::class, 'id','id_user');
    }
    protected $fillable = [
        'id_user',
        'points',
        'end',
    ];
}
