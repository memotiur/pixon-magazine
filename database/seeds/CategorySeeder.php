<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            'category_name' => "প্রবন্ধ",
        ]);

        \App\Category::create([
            'category_name' => "রাজনীতি",
        ]);

        \App\Category::create([
            'category_name' => "তত্তকথা",
        ]);

        \App\Category::create([
            'category_name' => "কবিতা",
        ]);
        \App\Category::create([
            'category_name' => "গল্প",
        ]);
        \App\Category::create([
            'category_name' => "উপন্যাস",
        ]);
        \App\Category::create([
            'category_name' => "অনুবাদ",
        ]);
        \App\Category::create([
            'category_name' => "পুস্তিকা",
        ]);
        \App\Category::create([
            'category_name' => "সংস্কৃতি",
        ]);
        \App\Category::create([
            'category_name' => "সাক্ষাৎকার",
        ]);
        \App\Category::create([
            'category_name' => "ই-প্রদর্শনী",
        ]);
        \App\Category::create([
            'category_name' => "আত্মজীবনী",
        ]);
        \App\Category::create([
            'category_name' => "ভ্রমণ",
        ]);
        \App\Category::create([
            'category_name' => "পুনর্মুদ্রণ",
        ]);
        \App\Category::create([
            'category_name' => "পুরাণকথা",
        ]);
        \App\Category::create([
            'category_name' => "দূরদর্শন",
        ]);
        \App\Category::create([
            'category_name' => "সম্পাদকীয়",
        ]);
        \App\Category::create([
            'category_name' => "একক কবিতা",
        ]);
        \App\Category::create([
            'category_name' => "গুচ্ছ কবিতা",
        ]);
        \App\Category::create([
            'category_name' => "পরদেশী কবিতা",
        ]);
        \App\Category::create([
            'category_name' => "স্বদেশ",
        ]);

        \App\Menu::create([
            'category_id' => "1",
        ]);

    }
}
