<?php

namespace Database\Seeders;

use App\Models\RequestStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $requestStatus = [
            ['name' => 'Waiting'],
            ['name' => 'Aprroved'],
            ['name' => 'Rejected'],
            ['name' => 'Progress'],
            ['name' => 'Completed']
        ];

        RequestStatus::create($requestStatus);
    }
}
