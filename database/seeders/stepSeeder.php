<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class stepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('steps')->insert([
            [
                "recipe_id" => 1,
                "step_number" => 1,
                "step" => "Et a temporibus dicta."
            ],
            [
                "recipe_id" => 1,
                "step_number" => 2,
                "step" => "Et a temporibus dicta."
            ],
            [
                "recipe_id" => 1,
                "step_number" => 3,
                "step" => "Et a temporibus dicta."
            ],
            [
                "recipe_id" => 1,
                "step_number" => 4,
                "step" => "Et a temporibus dicta."
            ],
            [
                "recipe_id" => 1,
                "step_number" => 5,
                "step" => "Et a temporibus dicta."
            ],
            [
                "recipe_id" => 1,
                "step_number" => 6,
                "step" => "Et a temporibus dicta."
            ],
           
              [
                "recipe_id" => 2,
                "step_number" => 1,
                "step" => "Quam aut animi ipsa qui."
              ],
              [
                "recipe_id" => 3,
                "step_number" => 1,
                "step" => "Dolores quas aliquid et."
              ],
              [
                "recipe_id" => 4,
                "step_number" => 1,
                "step" => "Suscipit ut quos et est."
              ],
              [
                "recipe_id" => 5,
                "step_number" => 1,
                "step" => "Consequatur amet ab sit."
              ],
              [
                "recipe_id" => 6,
                "step_number" => 1,
                "step" => "Et beatae eum odit qui."
              ],
              [
                "recipe_id" => 7,
                "step_number" => 1,
                "step" => "Dolor eos quis itaque."
              ],
              [
                "recipe_id" => 8,
                "step_number" => 1,
                "step" => "Quos non quo non."
              ],

              [
                "recipe_id" => 9,
               "step_number" => 1,
                "step" => "Sed cum ut consequuntur."
              ],

              [
                "recipe_id" => 10,
                "step_number" => 1,
                "step" => "Et cumque in inventore."
              ],

              [
                "recipe_id" => 11,
                "step_number" => 1,
                "step" => "Placeat et minus nihil."
              ],

              [
                "recipe_id" => 12,
                "step_number" => 1,
                "step" => "Qui ut sed enim impedit."
              ],

              [
                "recipe_id" => 13,
                "step_number" => 1,
                "step" => "Corrupti quae hic neque."
              ],

              [
                "recipe_id" => 14,
                "step_number" => 1,
                "step" => "Quo illum est qui et."
              ],

              [
                "recipe_id" => 15,
                "step_number" => 1,
                "step" => "Eos dolore ipsum qui."
              ],

              [
                "recipe_id" => 16,
                "step_number" => 1,
                "step" => "Itaque in numquam eum."
              ],

               [
                "recipe_id" => 17,
                "step_number" => 1,
                "step" => "Aut et dicta dolorem id."
              ],

              [
                "recipe_id" => 18,
                "step_number" => 1,
                "step" => "Et et voluptas hic sint."
              ],
        
              [
                "recipe_id" => 19,
                "step_number" => 1,
                "step" => "Fuga qui odit error qui."
              ],

              [
                "recipe_id" => 20,
                "step_number" => 1,
                "step" => "Eum ut et qui."
              ],

              [
                "recipe_id" => 21,
                "step_number" => 1,
                "step" => "Qui et fugit odio neque."
              ],

              [
                "recipe_id" => 22,
                "step_number" => 1,
                "step" => "Esse ut sit iste."
              ],

              [
                "recipe_id" => 23,
                "step_number" => 1,
                "step" => "Cumque in vel est."
              ],

              [
                "recipe_id" => 24,
                "step_number" => 1,
                "step" => "Quo non et soluta et."
              ],

              [
                "recipe_id" => 25,
                "step_number" => 1,
                "step" => "Et quis veritatis et."
              ],

              [
                "recipe_id" => 26,
                "step_number" => 1,
                "step" => "Optio nesciunt est ut."
              ],

             [
                "recipe_id" => 27,
                "step_number" => 1,
                "step" => "Minus et magni facilis."
             ],

              [
                "recipe_id" => 28,
                "step_number" => 1,
                "step" => "Animi quas omnis et sit."
              ],

              [
                "recipe_id" => 29,
                "step_number" => 1,
                "step" => "Nam sint odio occaecati."
              ],

              [
                "recipe_id" => 30,
                "step_number" => 1,
                "step" => "Sed a commodi fugiat."
              ]

        ]);
    }
}