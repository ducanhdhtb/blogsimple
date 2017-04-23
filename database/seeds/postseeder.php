<?php

use Illuminate\Database\Seeder;

class postseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         //
        DB::table('post')->insert([
        	['title'=>'love only1','summary' => 'Tinh yeu only1....','content' => 'Tinh yeu khong bo ben hihihehe'],
        	
        	

        
    	]);
    }
}
