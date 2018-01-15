<?php

use Illuminate\Database\Seeder;

class NewsStream extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::get()->each(function($user){
            $user->delete();
        });

        $user = \App\User::create([
            'name' => 'dummy',
            'email' => 'dummy.de',
            'password' => bcrypt(uniqid()),
            'profile' => []
        ]);

        $gen = new Faker\Generator();
        $text = new Faker\Provider\de_DE\Text($gen);


        for ($i = 0; $i < 100; $i++) {
            \App\API\NewsStream\Models\News::create([
                'title' => $text->realText(50),
                'subtitle' => $text->realText(25),
                'status' => 30,
                'teaser' => $text->realText(75),
                'content' => $text->realText(200),
                'user_id' => $user->id
            ]);
        }
    }
}
