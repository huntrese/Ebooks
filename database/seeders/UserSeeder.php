<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Users;

class UserSeeder extends Seeder
{
    public function run()
    {
        Users::factory()->count(10)->create(); // Creates 10 user records
    }
}
