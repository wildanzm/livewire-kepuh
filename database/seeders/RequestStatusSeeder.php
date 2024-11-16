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
            ['status' => 'Waiting'],
            ['status' => 'Aprroved'],
            ['status' => 'Rejected'],
            ['status' => 'Progress'],
            ['status' => 'Completed']
        ];

        RequestStatus::insert($requestStatus);
    }
}
