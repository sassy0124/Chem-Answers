<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
                'name' => '有機化学',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('categories')->insert([
                'name' => '無機化学',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
         
        DB::table('categories')->insert([
                'name' => '物理化学',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
         
        DB::table('categories')->insert([
                'name' => '分析化学',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('categories')->insert([
                'name' => '生物化学',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('categories')->insert([
                'name' => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
