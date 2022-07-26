<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            "Restaurant",
            "Guest House",
            "Hotel",
            "Treehouses",
            "National parks",
            "Amazing pools",
            "Islands",
            "Beach",
            "Tiny homes",
            "OMG!",
            "Arctic",
            "Bed & breakfasts",
            "Lakefront",
            "Camping",
            "Cabins",
            "Design",
            "Surfing",
            "A-frames",
            "Caves",
            "Tropical",
            "Amazing views",
            "Earth homes",
            "Shared homes",
            "Luxe",
            "Golfing",
            "Countryside",
            "Castles",
            "Farms",
            "Historical homes",
            "Mansions",
            "Skiing",
            "Cycladic homes",
            "Beachfront",
            "Iconic cities",
            "Chef's kitchens",
            "Windmills",
            "Campers",
            "Minsus",
            "Off-the-grid",
            "Vineyards",
            "Casas particulares",
            "Domes",
            "Shepherd's huts",
            "Barns",
            "Ryokans",
            "Towers",
            "Kezhans",
            "Desert",
            "Yurts",
            "Houseboats",
            "Ski-in/out",
            "Boats",
            "Containers",
            "Creative spaces",
            "Grand pianos",
            "Riads",
            "Trulli",
            "Dammusos",
            "Lake",
        ];


        foreach ($categories as $key => $category) {
            (new Category())->create([
                'title' => $category,
                'url' => Str::slug($category),
                'summary' => $category,
                'content' => $category,
                'sort_order' => $key,
                'status' => 1,
            ]);
        }
    }
}
