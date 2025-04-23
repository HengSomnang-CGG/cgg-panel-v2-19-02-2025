<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SearchTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Technology-specific entries
        $techData = [];

        // Insert predefined data
        foreach ($techData as $data) {
            DB::table('searches')->insert([
                'domain' => $data['domain'],
                'date' => $faker->dateTimeBetween('-1 year', 'now'),
                // 'keyword' => $data['domain'] . ',' . str_replace(' ', ',', $data['title']),
                'title' => $data['title'],
                'description' => $data['description'],
                'website_name' => $faker->company,
                'image_icon' => 'https://picsum.photos/150?text=' . urlencode($data['domain']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Generate random entries to reach 1000 total
        $remainingCount = 1000 - count($techData);
        foreach (range(1, $remainingCount) as $index) {
            $domain = $faker->domainName;
            $title = $faker->sentence(6, true);
            $keyword = $domain . ',' . str_replace(' ', ',', $title);

            DB::table('searches')->insert([
                'domain' => $domain,
                'date' => $faker->dateTimeBetween('-1 year', 'now'),
                // 'keyword' => $keyword,
                'title' => $title,
                'description' => $faker->text(500),
                'website_name' => $faker->company,
                'image_icon' => 'https://picsum.photos/150?text=' . urlencode($domain),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
