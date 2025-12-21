<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;

class Usertabelseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus admin yang mungkin sudah ada
        DB::table('users')->where('email', 'admin1@gmail.com')->delete();
        
        // Insert admin baru
        $result = DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        if ($result) {
            echo "Admin user created successfully!\n";
        } else {
            echo "Failed to create admin user!\n";
        }
    }
}