<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Hutang;
use App\Models\Iuran;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Hutang::factory()->count(1)->create();
        Iuran::factory()->count(1)->create();
      //  User::factory()->count(1)->create();
        // $this->call('UsersTableSeeder');
    }
}
