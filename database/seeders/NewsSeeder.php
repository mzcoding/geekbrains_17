<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\News;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('news')->insert($this->getData());
    }

    protected function getData(): array
    {
        $faker = Factory::create();
        $data = [];

        for($i=0; $i < 10; $i++) {
            $data[] = [
                'category_id' => 1,
                'title'       => $faker->jobTitle(),
                'author'      => $faker->userName(),
                'status'      => News::DRAFT,
                'image'       => $faker->imageUrl(),
                'description' =>  $faker->text(100),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $data;
    }
}
