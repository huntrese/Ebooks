<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Account;

class AccountFactory extends Factory
{
    protected $model = Account::class;

    public function definition()
    {
        $user = \App\Models\Users::inRandomOrder()->first();

        return [
            'account_ID' => $user->user_ID,
            'nickname' => $this->faker->unique()->userName,
            'avatar' => $this->generatePlaceholderImage(),
            'description' => $this->faker->sentence,
            // Add other model attributes here
        ];
    }

    private function generatePlaceholderImage()
    {
        // Generate a URL for a placeholder image using Faker
        $imageWidth = 100;
        $imageHeight = 100;
        $imageUrl = "https://www.seiu1000.org/sites/main/files/main-images/camera_lense_0.jpeg";

        return $imageUrl;
    }
}
