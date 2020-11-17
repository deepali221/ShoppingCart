<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'thumbnail_path' => 'https://i.ytimg.com/vi/uMHesibuQ5M/hqdefault.jpg',
            'title' => 'Joker', 
            'description' => 'Poly Wallpaper Dark Theme Joker from the movie Batman',
            'price' => 499
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail_path' => 'https://lh3.googleusercontent.com/-oHaPi7D87vM/Vv_Vd3fr_HI/AAAAAAAABJw/uhMzpyfreRonxkBch7GsXMSHYlFl6vXKg/w506-h750/IMG_0194.JPG',
            'title' => 'Halo', 
            'description' => 'Low Poly-wallpaper dark theme halo character from upcoming new games.',
            'price' => 599
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail_path' => 'http://u3u.wot.pw/upload/avatar/btr029_1461492032.jpg',
            'title' => 'Joker', 
            'description' => 'Joker Image',
            'price' => 499
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail_path' => 'https://s-media-cache-ak0.pinimg.com/736x/03/e6/06/03e6066846e134f20b1729e0ecbf25d1.jpg',
            'title' => 'Lord Evil', 
            'description' => 'This is a character from He-Man which is an old CartoonNetwork series.',
            'price' => 499
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail_path' => 'https://s-media-cache-ak0.pinimg.com/736x/c3/fc/83/c3fc8378bc12fcfa10eab9882bbef5f0--der-berg-low-poly.jpg',
            'title' => 'Arcade Game', 
            'description' => 'Poly Wallpaper Arcade Gaming.',
            'price' => 499
        ]);
        $product->save();

    }
}
