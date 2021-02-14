<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      User::create([
          'username' => 'CocusCeo',
          'password' => Hash::make('CocusCeo'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);

        Participant::create([
            'name' => 'Ruben',

        ]);

    }
}
