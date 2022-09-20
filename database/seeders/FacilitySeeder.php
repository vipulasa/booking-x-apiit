<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facilities = [
            [
                'hotel_id' => 1,
                'title' => 'facility 1',
                'description' => 'facility 1 description',
                'features' => [
                    'feature 1',
                    'feature 2',
                    'feature 3'
                ],
            ],
            [
                'hotel_id' => 1,
                'title' => 'facility 2',
                'description' => 'facility 2 description',
                'features' => [
                    'feature 1',
                    'feature 2',
                    'feature 3'
                ],
            ],
            [
                'hotel_id' => 2,
                'title' => 'facility 1',
                'description' => 'facility 1 description',
                'features' => [
                    'feature 1',
                    'feature 2',
                    'feature 3'
                ],
            ],
            [
                'hotel_id' => 2,
                'title' => 'facility 2',
                'description' => 'facility 2 description',
                'features' => [
                    'feature 1',
                    'feature 2',
                    'feature 3'
                ],
            ]
        ];

        foreach ($facilities as $facility) {
            (new \App\Models\Hotel\Facility())->create($facility);
        }
    }
}
