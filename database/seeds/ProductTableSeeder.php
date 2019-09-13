<?php

use App\Product;
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
        $product = new Product([
            'image' => 'login.jpg',
            'title' => 'Book A',
            'description' => 'In descriptive writing, the author does not just tell the reader what was seen, felt, tested, smelled, or heard. Rather, the author describes something from their own experience and, through careful choice of words and phrasing, makes it seem real. Descriptive writing is vivid, colorful, and detailed.

Good Descriptive Writing
Good descriptive writing creates an impression in the reader\'s mind of an event, a place, a person, or a thing. The writing will be such that it will set a mood or describe something in such detail that if the reader saw it, they would recognize it.

To be good, descriptive writing has to be concrete, evocative and plausible.',
            'price' => 200
        ]);

        $product->save();

        $product = new Product([
            'image' => 'login.jpg',
            'title' => 'Book B',
            'description' => 'In descriptive writing, the author does not just tell the reader what was seen, felt, tested, smelled, or heard. Rather, the author describes something from their own experience and, through careful choice of words and phrasing, makes it seem real. Descriptive writing is vivid, colorful, and detailed.

Good Descriptive Writing
Good descriptive writing creates an impression in the reader\'s mind of an event, a place, a person, or a thing. The writing will be such that it will set a mood or describe something in such detail that if the reader saw it, they would recognize it.

To be good, descriptive writing has to be concrete, evocative and plausible.',
            'price' => 350
        ]);

        $product->save();
    }
}
