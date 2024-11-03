<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
//use DateTime;

class ContactFactory extends Factory
{
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->numberBetween(0, 2),
            'email' => $this->faker->safeEmail(),
            'tell' => str_replace('-', '', $this->faker->phoneNumber()),
            'address' => substr($this->faker->address(), 9),
            'building' => $this->faker->secondaryAddress(),
            'detail' => $this->faker->realText(100),
        ];
    }
}
