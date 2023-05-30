<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class userr extends Model
{
    private static $member=
    [
        [
            'Name'      => 'Haris1',
            'Address'   => 'Wonoayu1',
            'Phone'     => '123456781'
        ],
        [
            'Name'      => 'Haris2',
            'Address'   => 'Wonoayu2',
            'Phone'     => '123456782'
        ],
        [
            'Name'      => 'Haris3',
            'Address'   => 'Wonoayu3',
            'Phone'     => '123456783'
        ]
    ];
    public static function getData(){
        return DB::table('users')->get('name');
    }

    protected $table = 'users';
    protected $fillable = ['name','email','address','phone','created_at','updated_at'];
    /*
    protected $userr=[
        'name','email','phone'
    ];  */  
}
