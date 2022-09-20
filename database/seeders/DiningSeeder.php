<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DiningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Dinings = [
            [
                'hotel_id' => 1,
                'title' => 'Dining 1',
                'description' => 'Dining 1 description',
                'features' => [
                    'feature 1',
                    'feature 2',
                    'feature 3'
                ],
            ],
            [
                'hotel_id' => 1,
                'title' => 'Dining 2',
                'description' => 'Dining 2 description',
                'features' => [
                    'feature 1',
                    'feature 2',
                    'feature 3'
                ],
            ],
            [
                'hotel_id' => 2,
                'title' => 'Dining 1',
                'description' => 'Dining 1 description',
                'features' => [
                    'feature 1',
                    'feature 2',
                    'feature 3'
                ],
            ],
            [
                'hotel_id' => 2,
                'title' => 'Dining 2',
                'description' => 'Dining 2 description',
                'features' => [
                    'feature 1',
                    'feature 2',
                    'feature 3'
                ],
            ]
        ];

        foreach ($Dinings as $Dining) {
            (new \App\Models\Hotel\Dining())->create($Dining);
        }
    }
}
