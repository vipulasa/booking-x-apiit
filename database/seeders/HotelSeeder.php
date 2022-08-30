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
                'name' => 'Granbell Hotel Colombo',
                'description' => 'Located in Colombo, a 14-minute walk from Galle Face Beach, Granbell Hotel Colombo has accommodations with a restaurant, free private parking, an outdoor swimming pool and a fitness center. With free WiFi, this 4-star hotel has a bar and a terrace. The property provides a 24-hour front desk, room service and currency exchange for guests.
                <br />
                The hotel will provide guests with air-conditioned rooms with a desk, an electric tea pot, a fridge, a safety deposit box, a flat-screen TV and a private bathroom with a shower. At Granbell Hotel Colombo the rooms are equipped with bed linen and towels.',
                'health_and_safety' => 'This property has taken extra health and hygiene measures to ensure your safety is their priority',
                'address' => '282/5, Kollupitiya Road, Kollupitiya, 00300 Colombo, Sri Lanka',
                'phone' => '0112 397 397',
                'email' => 'reservations1@granbellhotel.lk',
                'website' => 'https://granbellhotel.lk',
                'image' => 'https://granbellhotel.lk/wp-content/uploads/2022/04/Home-Gallery2-1630x1060-1.jpg',
            ],
            [
                'category_id' => 2,
                'name' => 'Marino Beach Colombo',
                'description' => 'Marino Beach Colombo has a restaurant, outdoor swimming pool, a fitness center and bar in Colombo. 2.4 km from Galle Face Beach and a 20-minute walk from American Embassy, the property provides a garden and a terrace. The property has a 24-hour front desk, room service and currency exchange for guests.
<br />
                The hotel will provide guests with air-conditioned rooms with a desk, an electric tea pot, a minibar, a safety deposit box, a flat-screen TV, a balcony and a private bathroom with a bidet. At Marino Beach Colombo rooms come with bed linen and towels.
                <br />
                Guests at the accommodation can enjoy a continental breakfast.
                <br />
                Marino Beach Colombo offers a hot tub.
                <br />
                Khan Clock Tower is 5.3 km from the hotel, while R Premadasa Stadium is 7.1 km from the property. The nearest airport is Ratmalana Airport, 12.9 km from Marino Beach Colombo.

                Couples in particular like the location – they rated it 9.0 for a two-person trip.',
                'health_and_safety' => 'This property has taken extra health and hygiene measures to ensure your safety is their priority',
                'address' => '590 Marine Drive, 00300 Colombo, Sri Lanka',
                'phone' => '0112 375 375',
                'email' => 'info@marinobeach.com',
                'website' => 'https://www.marinobeach.com',
                'image' => 'https://www.marinobeach.com/images/slides/h1-slider1.jpg',
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
