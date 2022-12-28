<?php

namespace Database\Seeders;

use App\Models\holyCard;
use Illuminate\Http\File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class HolyCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultPath = resource_path() . '/images/holyCard.png';
        $path = Storage::put('public', new File($defaultPath));

        holyCard::create([
            'name' => 'San Raul',
            'image' => $path,
            'description' => 'Protector of the forgotten bugs'
        ]);

        $defaultPath2 = resource_path() . '/images/demo.jpg';
        $path2 = Storage::put('public', new File($defaultPath2));

        holyCard::create([
            'name' => 'Squidlord',
            'image' => $path2,
            'description' => 'The final evolution of squidward. Many say the shrieks of him shouting spongebob imply imending doom'
        ]);
    }
}
