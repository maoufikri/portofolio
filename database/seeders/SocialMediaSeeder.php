<?php

// database/seeders/SocialMediaSeeder.php
namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    public function run()
    {
        SocialMedia::create([
            'name' => 'Instagram',
            'url' => 'https://www.instagram.com/alhaqii_19',
            'font_awesome_class' => 'fab fa-instagram',
        ]);

        SocialMedia::create([
            'name' => 'Facebook',
            'url' => 'https://www.facebook.com/profile.php?id=100012356953798',
            'font_awesome_class' => 'fab fa-facebook',
        ]);

        SocialMedia::create([
            'name' => 'TikTok',
            'url' => 'https://www.tiktok.com/@al_haqii19',
            'font_awesome_class' => 'fab fa-tiktok',
        ]);

        SocialMedia::create([
            'name' => 'WhatsApp',
            'url' => 'https://wa.me/+6282249013142',
            'font_awesome_class' => 'fab fa-whatsapp',
        ]);
    }
};

