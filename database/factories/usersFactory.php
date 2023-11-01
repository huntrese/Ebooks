<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Users;

class UsersFactory extends Factory
{
    protected $model = Users::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Set a default password if needed
            // Add other model attributes here
        ];
    }
}
