<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    public function run()
    {
        $userCount = \App\Models\Users::count();
        $userIDs = range(1, $userCount);

        foreach ($userIDs as $userID) {
            Account::factory()->create(['account_ID' => $userID]);
        }
    }
}
