<?php

use Illuminate\Database\Seeder;
use App\Major;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('majors')->insert([
                'name' => '有機化学',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
         
        DB::table('majors')->insert([
                'name' => '無機化学',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
         
        DB::table('majors')->insert([
                'name' => '物理化学',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
         
        DB::table('majors')->insert([
                'name' => '分析化学',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('majors')->insert([
                'name' => '生物化学',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('majors')->insert([
                'name' => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
