<?php

    use Illuminate\Support\Facades\Route;

    Route::get('/food', function () {
    $foods = [
        [
            'name' => 'Beef Steak',
            'description' => '-.',
            'price' => 120000,
            'image_url' => '/image/beef.jpg',
        ],
        [
            'name' => 'Vegan Salad Bowl',
            'description' => '-.',
            'price' => 75000,
            'image_url' => '/image/salad.jpg',
        ],
         [
            'name' => 'Cheese Pizza',
            'description' => '-.',
            'price' => 85000,
            'image_url' => '/image/pitzza.jpg',
        ],
         [
            'name' => 'Signature Banana Bliss',
            'description' => '-.',
            'price' => 50000,
            'image_url' => '/image/banana.jpg',
        ],
         [
            'name' => 'Nasi goreng',
            'description' => '-.',
            'price' => 55000,
            'image_url' => '/image/nasgor.jpg',
        ],
    ];

    return view('food', compact('foods'));
});

