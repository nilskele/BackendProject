<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        try {
            User::create([
                'name' => 'Nike',
                'email' => 'contact@nike.com',
                'password' => Hash::make('securepassword123'),
                'is_admin' => false,
                'profile_image' => 'images/nike_logo.png',
                'bio' => 'A global leader in athletic footwear, apparel, and accessories.',
            ]);
    
            echo "User Nike created successfully.\n";
    
        } catch (\Exception $e) {
            echo "Error creating user: " . $e->getMessage() . "\n";
        }

        User::create([
            'name' => 'Amazon',
            'email' => 'support@amazon.com',
            'password' => Hash::make('securepassword123'),
            'is_admin' => false,
            'profile_image' => 'images/amazon_logo.png', // Placeholder image for Amazon
            'bio' => 'The world’s largest online retailer and cloud service provider.'
        ]);

        User::create([
            'name' => 'MediaMarkt',
            'email' => 'info@mediamarkt.com',
            'password' => Hash::make('securepassword123'),
            'is_admin' => false,
            'profile_image' => 'images/mediamarkt_log.png', // Placeholder image for MediaMarkt
            'bio' => 'Europe’s leading consumer electronics retailer.'
        ]);

        User::create([
            'name' => 'Apple',
            'email' => 'contact@apple.com',
            'password' => Hash::make('securepassword123'),
            'is_admin' => false,
            'profile_image' => 'images/apple_logo.png', // Placeholder image for Apple
            'bio' => 'Innovators in personal technology, software, and hardware.'
        ]);

        User::create([
            'name' => 'Tesla',
            'email' => 'support@tesla.com',
            'password' => Hash::make('securepassword123'),
            'is_admin' => false,
            'profile_image' => 'images/tesla_logo.png', // Placeholder image for Tesla
            'bio' => 'Pioneers in electric vehicles, energy storage, and clean energy.'
        ]);

        User::create([
            'name' => 'Google',
            'email' => 'contact@google.com',
            'password' => Hash::make('securepassword123'),
            'is_admin' => false,
            'profile_image' => 'images/google_logo.png', // Placeholder image for Google
            'bio' => 'A global technology leader focused on search, advertising, and cloud computing.'
        ]);

        User::create([
            'name' => 'Microsoft',
            'email' => 'info@microsoft.com',
            'password' => Hash::make('securepassword123'),
            'is_admin' => false,
            'profile_image' => 'images/microsoft_logo.png', // Placeholder image for Microsoft
            'bio' => 'Creators of Windows, Office, and cutting-edge cloud solutions.'
        ]);

        User::create([
            'name' => 'Adidas',
            'email' => 'contact@adidas.com',
            'password' => Hash::make('securepassword123'),
            'is_admin' => false,
            'profile_image' => 'images/adidas_logo.png', // Placeholder image for Adidas
            'bio' => 'A global brand specializing in sportswear and equipment.'
        ]);

        User::create([
            'name' => 'Samsung',
            'email' => 'support@samsung.com',
            'password' => Hash::make('securepassword123'),
            'is_admin' => false,
            'profile_image' => 'images/samsung_logo.png', // Placeholder image for Samsung
            'bio' => 'Leading innovators in electronics, mobile devices, and home appliances.'
        ]);

        User::create([
            'name' => 'Sony',
            'email' => 'info@sony.com',
            'password' => Hash::make('securepassword123'),
            'is_admin' => false,
            'profile_image' => 'images/sony_logo.png', // Placeholder image for Sony
            'bio' => 'A multinational conglomerate known for electronics, gaming, and entertainment.'
        ]);
    }
}
