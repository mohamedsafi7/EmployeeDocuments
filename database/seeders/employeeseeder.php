<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;


class employeeseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create(['name' => 'ahmed hamada', 'email' => 'ahmed@gmail.com', 'address' => 'bloc07 hay amal', 'cin' => 'jk9870', 'city' => 'Taliouine', 'phone' => '078963543' ]);
        Employee::create(['name' => 'Youssef El Habib', 'email' => 'youssef.elhabib@gmail.com', 'address' => 'Bloc 04 Hay Taddart', 'cin' => 'AB1234', 'city' => 'Taliouine', 'phone' => '0701234567' ]);
        Employee::create(['name' => 'Fatima Zahra Amrani', 'email' => 'fatimazahra.amrani@gmail.com', 'address' => 'Bloc 10 Hay Mohammadi', 'cin' => 'CD5678', 'city' => 'Taliouine', 'phone' => '0702345678' ]);
        Employee::create(['name' => 'Mohamed Lhoussain', 'email' => 'mohamed.lhoussain@gmail.com', 'address' => 'Bloc 15 Hay Al Houda', 'cin' => 'EF9101', 'city' => 'Taliouine', 'phone' => '0703456789' ]);
        Employee::create(['name' => 'Hanae Benaissa', 'email' => 'hanae.benaissa@gmail.com', 'address' => 'Bloc 20 Hay Dakhla', 'cin' => 'GH1122', 'city' => 'Taliouine', 'phone' => '0704567890' ]);
        Employee::create(['name' => 'Omar Ait Mbarek', 'email' => 'omar.aitmbarek@gmail.com', 'address' => 'Bloc 02 Hay Salam', 'cin' => 'IJ3344', 'city' => 'Taliouine', 'phone' => '0705678901' ]);

    }
}
