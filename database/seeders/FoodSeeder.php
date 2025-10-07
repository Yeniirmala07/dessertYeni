<?php
use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    public function run()
    {
        $foods = [
            [
                'name' => 'Waffle',
                'description' => 'Waffle with Berries',
                'price' => 6.5,
                'image_url' => 'https://source.unsplash.com/300x200/?waffle'
            ],
            [
                'name' => 'Crème Brûlée',
                'description' => 'Vanilla Bean Crème Brûlée',
                'price' => 7.0,
                'image_url' => 'https://source.unsplash.com/300x200/?creme-brulee'
            ],
            [
                'name' => 'Macaron',
                'description' => 'Macaron Mix of Five',
                'price' => 8.0,
                'image_url' => 'https://source.unsplash.com/300x200/?macaron'
            ],
            [
                'name' => 'Tiramisu',
                'description' => 'Classic Tiramisu',
                'price' => 5.5,
                'image_url' => 'https://source.unsplash.com/300x200/?tiramisu'
            ],
            [
                'name' => 'Baklava',
                'description' => 'Pistachio Baklava',
                'price' => 4.0,
                'image_url' => 'https://source.unsplash.com/300x200/?baklava'
            ]
        ];

        foreach ($foods as $food) {
            Food::create($food);
        }
    }
}
