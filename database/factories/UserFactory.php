<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    protected static ?string $password = null;

    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(),
            'password' => static::$password ??= Hash::make('password'),
            'role'     => fake()->randomElement(['admin', 'guru', 'satpam']),
        ];
    }

    public function admin(): static
    {
        return $this->state(fn () => ['role' => 'admin']);
    }

    public function guru(): static
    {
        return $this->state(fn () => ['role' => 'guru']);
    }

    public function satpam(): static
    {
        return $this->state(fn () => ['role' => 'satpam']);
    }
}