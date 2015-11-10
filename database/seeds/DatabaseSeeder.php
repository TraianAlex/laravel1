<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use laravel1\User;
use laravel1\Album;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Model::unguard();

        User::truncate();
        Album::truncate();
        // $this->call(UserTableSeeder::class);
        $this->call('UserTableSeeder');
        $this->call('AlbumTableSeeder');

        Model::reguard();
    }
}
