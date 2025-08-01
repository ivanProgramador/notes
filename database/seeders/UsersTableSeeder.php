<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //criando multiplos usuarios 

        DB::table('users')->insert([
            [
                'username'=>'user1@gmail.com',
                'password'=>bcrypt('abcc123456'),
                'created_at'=>date('y-m-d H:i:s')
            ],
            [
                'username'=>'user2@gmail.com',
                'password'=>bcrypt('abcc123456'),
                'created_at'=>date('y-m-d H:i:s')
            ],
            [
                'username'=>'user3@gmail.com',
                'password'=>bcrypt('abcc123456'),
                'created_at'=>date('y-m-d H:i:s')
            ]
            ]);
    }
}
