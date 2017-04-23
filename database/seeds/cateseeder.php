<?php

use Illuminate\Database\Seeder;

class cateseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('category')->insert(
        [
	        ['cate_name' =>'Love'],
	        ['cate_name' =>'Education'],
	        ['cate_name' =>'Science'],
	        ['cate_name' =>'Sport']
	        ]
        );
    }
}
