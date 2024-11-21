<?php

namespace Database\Seeders;

use App\Models\TypeLetter;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeLetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $typeLetter = [
        ['name'=> 'Surat Keterangan Tidak Mampu'],
        ['name'=> 'Surat Pindah'],
        ['name'=> 'Surat Domisili'],
        ['name'=> 'Surat Keterangan Usaha'],
        ['name'=> 'Akta Kelahiran'],
        ['name'=> 'Surat Desa'],
        ['name'=> 'Surat Pendapatan'],
        ['name'=> 'Surat Keterangan Belum Menikah'],
        ['name'=> 'Surat Pernikahan'],

       ];

       TypeLetter::insert($typeLetter);
    }
}
