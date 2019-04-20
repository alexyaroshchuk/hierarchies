<?php

use Illuminate\Database\Seeder;

class ClearDb extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Alternative::truncate();
        \App\Criteria::truncate();
        \App\Hierarchy::truncate();
        \App\Priority::truncate();
    }
}
