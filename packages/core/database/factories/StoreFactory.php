<?php

namespace Lunar\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lunar\FieldTypes\Text;
use Lunar\Models\Brand;
use Lunar\Models\Product;
use Lunar\Models\ProductType;
use Lunar\Models\Store;

class StoreFactory extends Factory
{
    protected $model = Store::class;

    public function definition(): array
    {
        return [
            'name' => new Text($this->faker->name),
            'email' => $this->faker->email,
            'phone' => $this->faker->e164PhoneNumber,
            'address' => $this->faker->sentence,
            'logo' => $this->faker->url,
            'status' => array_rand([0,1]),
            'product_type_id' => ProductType::factory(),
            'content' => collect([
                'name' => new Text($this->faker->name),
                'description' => $this->faker->sentence,
                'address' => $this->faker->sentence,
            ]),
        ];
    }
}
