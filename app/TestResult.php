<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TestResult extends Model
{
    use HasFactory;
    protected $table = 'test_result';
    protected  $primaryKey = 'id_user';

    protected $fillable = [
        'id_user',
        'points',
        'created_at',
        'update_at',
    ];

    public function result(){
        return $this->hasOne(User::class, 'id','id_user');
    }



}
