<?php
use Illuminate\Database\Seeder;
use App\Post; // manually
use App\PostDetail; // manually
use App\Category; // manually

use Faker\Generator as Faker; // manually

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

        $categoryList = [
            'news',
            'sport',
            'tech',
            'geek',
            'art',
            'music',
            'cinema',
            'culture', 
        ];

        $listOfCategoryID = [];

        foreach($categoryList as $category) {
            $categoryObject = new Category();
            $categoryObject->name = $category;
            $categoryObject->save();
            $listOfCategoryID[] = $categoryObject->id;
        }


        for ($i = 0; $i < 50; $i++) {

            $postDetail = new PostDetail();
            $postDetail->platform = $faker->words(1, true);
            $postDetail->tag = $faker->words(1, true);
            $postDetail->save();


            $postObject = new Post();
            $postObject->user_name = $faker->sentence(5);
            $postObject->user_img = $faker->imageUrl(640, 480, 'User', true); 
            $postObject->post_txt = $faker->paragraph(2);
            $postObject->post_img = $faker->imageUrl(640, 480, 'Post', true);
            $postObject->post_date= $faker->date('Y_m_d');

            $randCategoryKey = array_rand($listOfCategoryID, 1);
            $categoryID = $listOfCategoryID[$randCategoryKey];
            $postObject->category_id = $categoryID;

            $postObject->post_detail_id = $postDetail->id;
            $postObject->save();
        }
    }
}
