<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class seeder1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(array(
            [
                'name'      => 'Haris1',
                'email'     => 'Wonoayu1@gmail.com',
                'phone'     => '123456781',
                'address'   => 'Sidoarjo',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'      => 'Haris2',
                'email'   => 'Wonoayu2@gmail.com',
                'phone'     => '123456782',
                'address'   => 'Sidoarjo',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'      => 'Haris3',
                'email'   => 'Wonoayu3@gmail.com',
                'phone'     => '123456783',
                'address'   => 'Sidoarjo',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ]                        
        ));
    }
}
