<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Ticket;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()
        ->count(25)
        ->hasTickets(10)
        ->create(); 


        User::factory()
        ->count(50)
        ->hasTickets(1)
        ->create();

        User::factory()
        ->count(20)
        ->hasTickets(3)
        ->create();

        User::factory()
        ->count(5)
        ->create();
}

}