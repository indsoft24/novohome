<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
    {public function run(): void
{
    Contact::create([
        'title' => 'IOTA FURNITURE STORE',
        'address1' => 'Delhi, India',
        'address2' => 'New Delhi-110015',
        'phone1' => '+91 9876543210',
        'phone2' => '+91 7669977600',
        'email' => 'support@novahomz.com',
        'whatsapp' => '+91 9876543210',
        'image' => 'store.jpg',
    ]);
}

        // // User factory
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    
}