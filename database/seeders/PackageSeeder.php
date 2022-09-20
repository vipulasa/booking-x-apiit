<?php

namespace Database\Seeders;

use App\Models\Finance\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'hotel_id' => 1,
                'title' => 'Package 1',
                'description' => 'Package 1 description',

                'price_fixed' => 25000,
                'price_per_person' => 12500,
                'price_perday' => 5000,

                'occupancy' => 2,

                'experiences' => [
                    1, 2
                ],

                'dinings' => [
                    1
                ],

                'facilities' => [
                    1, 2
                ],

                'nationality' => 'local', // local, forign
            ],
            [
                'hotel_id' => 1,
                'title' => 'Package 2',
                'description' => 'Package 2 description',

                'price_fixed' => 32000,
                'price_per_person' => 18000,
                'price_perday' => 9000,

                'occupancy' => 2,

                'experiences' => [
                    1, 2
                ],

                'dinings' => [
                    1, 2
                ],

                'facilities' => [
                    1, 2
                ],

                'nationality' => 'local', // local, forign
            ],

            [
                'hotel_id' => 2,
                'title' => 'Package 1',
                'description' => 'Package 1 description',

                'price_fixed' => 25000,
                'price_per_person' => 12500,
                'price_perday' => 5000,

                'occupancy' => 2,

                'experiences' => [
                    3, 4
                ],

                'dinings' => [
                    3
                ],

                'facilities' => [
                    3, 4
                ],

                'nationality' => 'forign', // local, forign
            ],
            [
                'hotel_id' => 2,
                'title' => 'Package 2',
                'description' => 'Package 2 description',

                'price_fixed' => 32000,
                'price_per_person' => 18000,
                'price_perday' => 9000,

                'occupancy' => 2,

                'experiences' => [
                    3, 4
                ],

                'dinings' => [
                    3
                ],

                'facilities' => [
                    3, 4
                ],

                'nationality' => 'local', // local, forign
            ]
        ];

        foreach($packages as $package){
            $model =  (new Package())->create([
                'hotel_id' => $package['hotel_id'],
                'title' => $package['title'],
                'description' => $package['description'],
                'price_fixed' => $package['price_fixed'],
                'price_per_person' => $package['price_per_person'],
                'price_perday' => $package['price_perday'],
                'occupancy' => $package['occupancy'],
                'nationality' => $package['nationality'],
            ]);

            $model->experiences()->sync($package['experiences']);
            $model->dinings()->sync($package['dinings']);
            $model->facilities()->sync($package['facilities']);
        }
    }
}
