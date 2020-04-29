<?php

use Illuminate\Database\Seeder;

class EventsTableFactory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\adEvent::class)->create();
    }
}
