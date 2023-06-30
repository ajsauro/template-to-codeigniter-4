<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Post extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        //        $faker->addProvider(new PicsumPhotosProvider($faker));
        //https://picsum.photos/id/237/200/300
        for ($i = 1; $i <= 100; $i++) {
            $title = $faker->sentence;
            $imgid = rand(1, 500);
            $data = [
                'title' => $title,
                'user_id' => $faker->numberBetween(1, 100),
                'category_id' => $faker->numberBetween(1, 10),
                'visits' => $faker->numberBetween(1, 100),
                'slug' => strtolower(str_replace(' ', '-', $title)),
                'image' => 'https://picsum.photos/id/' . $imgid . '/640/480',
                'description' => $faker->paragraph(5),
            ];

            $this->db->table('posts')->insert($data);
        }
    }
}
