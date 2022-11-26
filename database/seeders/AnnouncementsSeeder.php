<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcements;

class AnnouncementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $announcements = [
            [
                'id'             => 1,
                'image'           => 'a1.jpg',
                'title'           => 'Lorem ipsum lorem ipsum lorem ipsum lore',
                'body' => 'Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum',
                'user_id' => '1',
                'link_website' => 'https://www.facebook.com/rphsangono/',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
         
        ];

        Announcements::insert($announcements);
    }
}
