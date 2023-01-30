<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Account;
use App\Models\AccountType;
use App\Models\Category;
use App\Models\InvoiceType;
use App\Models\Store;
use App\Models\Treasure;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Muhammad Nawlo',
            'email' => 'nawlomuhammadit@gmail.com',
            'password' => bcrypt(1),
        ]);
        Treasure::factory(20)->create();
        InvoiceType::factory(20)->create();
        Store::factory(20)->create();
        Category::factory(20)->create();
        Unit::factory(20)->create();
        AccountType::factory(20)->create();
        Account::factory(20)->create();
    }
}
