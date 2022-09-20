<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $experiences = [
            [
                'hotel_id' => 1,
                'title' => 'Experience 1',
                'description' => 'Experience 1 description',
                'features' => [
                    'feature 1',
                    'feature 2',
                    'feature 3'
                ],
            ],
            [
                'hotel_id' => 1,
                'title' => 'Experience 2',
                'description' => 'Experience 2 description',
                'features' => [
                    'feature 1',
                    'feature 2',
                    'feature 3'
                ],
            ],
            [
                'hotel_id' => 2,
                'title' => 'Experience 1',
                'description' => 'Experience 1 description',
                'features' => [
                    'feature 1',
                    'feature 2',
                    'feature 3'
                ],
            ],
            [
                'hotel_id' => 2,
                'title' => 'Experience 2',
                'description' => 'Experience 2 description',
                'features' => [
                    'feature 1',
                    'feature 2',
                    'feature 3'
                ],
            ]
        ];

        foreach ($experiences as $experience) {
            (new \App\Models\Hotel\Experience())->create($experience);
        }
    }
}
