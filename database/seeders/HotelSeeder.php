<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // List of hotels
        $hotels = [
            [
                'category_id' => 1,
                'name' => 'Hotel 1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac dapibus quam. Curabitur ut finibus neque. Sed consectetur lorem vitae finibus bibendum. Pellentesque dignissim consequat ligula sit amet tempor. Morbi molestie consequat finibus. Vestibulum id quam a massa rhoncus pulvinar ac sed nibh. Vestibulum et dui ut libero tempus feugiat. Quisque eget suscipit sapien.',
                'health_and_safety' => 'Hotel 1 health and safety',
                'address' => 'Hotel 1 address',
                'phone' => 'Hotel 1 phone',
                'email' => 'Hotel 1 email',
                'website' => 'Hotel 1 website',
                'image' => 'https://picsum.photos/1024/1024',
            ],
            [
                'category_id' => 2,
                'name' => 'Hotel 2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac dapibus quam. Curabitur ut finibus neque. Sed consectetur lorem vitae finibus bibendum. Pellentesque dignissim consequat ligula sit amet tempor. Morbi molestie consequat finibus. Vestibulum id quam a massa rhoncus pulvinar ac sed nibh. Vestibulum et dui ut libero tempus feugiat. Quisque eget suscipit sapien.',
                'health_and_safety' => 'Hotel 2 health and safety',
                'address' => 'Hotel 2 address',
                'phone' => 'Hotel 2 phone',
                'email' => 'Hotel 2 email',
                'website' => 'Hotel 2 website',
                'image' => 'https://picsum.photos/1024/1024',
            ],

        ];

        foreach ($hotels as $hotel) {
            $hotel_model = (new Hotel())
                ->newQuery()
                ->create([
                    'category_id' => $hotel['category_id'],
                    'name' => $hotel['name'],
                    'url' => Str::slug($hotel['name']),
                    'description' => $hotel['description'],
                    'health_and_safety' => $hotel['health_and_safety'],
                    'address' => $hotel['address'],
                    'phone' => $hotel['phone'],
                    'email' => $hotel['email'],
                    'website' => $hotel['website'],
                ]);

            $hotel_model->addMediaFromUrl($hotel['image'])
                ->toMediaCollection('images');
        }
    }
}
