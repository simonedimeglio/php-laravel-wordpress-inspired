<?php

use Illuminate\Database\Seeder;
use App\Post; // to add manually
use Faker\Generator as Faker; // to add manually

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // Laravel will automatically satisfy this addiction
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {

            $bookObject = new Post();
            $bookObject->user_name = $faker->sentence(5);
            $bookObject->user_img = $faker->imageUrl(640, 480, 'User', true); 
            $bookObject->post_txt = $faker->paragraph(2);
            $bookObject->post_img = $faker->imageUrl(640, 480, 'Post', true);
            $bookObject->post_date= $faker->date('Y_m_d');
            $bookObject->save();

        }
    }
}
