<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    // faker 내부에 여러가지 랜덤 값들을 만들어주는 메소드들이 존재
    // 그것만 가져와서 사용하면 됨
    // faker는 기본적으로 영어로 만들어줌
    // faker_locale => ko_KR로 설정하면 기본적으로 한글로 설정해줌 config->app.php안에 있음
    public function definition()
    {

        $date = $this->faker->dateTimeBetween('-5 years');

        return [
            'u_email' => $this->faker->unique()->safeEmail(),
            'u_password' => Hash::make('qwer1234'), // password
            'u_name' => $this->faker->name(),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
