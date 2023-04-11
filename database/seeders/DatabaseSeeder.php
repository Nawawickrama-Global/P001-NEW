<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Customer;
use App\Models\ShippingMethod;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create Administrator
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'contact_number' => '0711234567',
            'email' => 'admin@gmail.com',
            'user_type' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // Create Customer
        $customer = User::create([
            'first_name' => 'Customer',
            'last_name' => 'Account',
            'contact_number' => '0711234567',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('password'),
        ]);
        Customer::create([
            'user_id' => $customer->id,
            'address' => 'address'
        ]);
        
        // Create default attributes
        Attribute::create([
            'name' => 'FAUX LEATHER',
            'description' => 'FAUX LEATHER'
        ]);
        
        Attribute::create([
            'name' => 'SYNTHETIC LEATHER',
            'description' => 'SYNTHETIC LEATHER'
        ]);

        ShippingMethod::create([
            'name' => 'COD',
            'description' => 'Cash on delivery',
            'price' => '40',
        ]);
    }
}
