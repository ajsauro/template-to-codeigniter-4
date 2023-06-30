<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class User extends Seeder
{
    public function run()
    {
        $male = false;
        $faker = Factory::create('pt_BR');
        for ($i = 1; $i <= 100; $i++) {
            $male = !$male;
            $imgid = rand(1, 95);
            if ($male) {
                $photo = 'https://randomuser.me/api/portraits/men/' . $imgid . '.jpg';
            } else {
                $photo = 'https://randomuser.me/api/portraits/women/' . $imgid . '.jpg';
            }
            $data = [
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'email' => $faker->email,
                'photo' => $photo,
                'password' => password_hash('123', PASSWORD_DEFAULT),
            ];

            $this->db->table('users')->insert($data);
        }
    }
}
