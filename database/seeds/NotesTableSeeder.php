<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = \DB::table('notes')->insert([
            'user_id' => 1,
            'title' => 'test',
            'note' => 'test note here'
        ]);
        \DB::table('notes')->insert([
            'user_id' => 1,
            'title' => 'test',
            'note' => 'test note here'
        ]);
        \DB::table('notes')->insert([
            'user_id' => 1,
            'title' => 'test',
            'note' => 'test note here'
        ]);
    }
}
