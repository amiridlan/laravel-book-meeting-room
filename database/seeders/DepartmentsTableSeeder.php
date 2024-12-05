<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;


class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'Jabatan Teknologi Maklumat',
            'Jabatan Khidmat Pengurusan',
            'Jabatan Perancangan Korporat',
            'Jabatan Perbendaharaan',
            'Jabatan Perakaunan',
            'Jabatan Kawalan Pembangunan',
            'Jabatan Kerja dan Bangunan',
            'Jabatan Perkhidmatan Komuniti',
            'Jabatan Kesihatan Persekitaran',
            'Jabatan Pelesenan',
            'Jabatan Pengurusan Fakulti',
            'Jabatan Penilaian dan Pengurusan Harta',
            'Jabatan Perancangan Bandar',
            'Jabatan Perkhidmatan Perbandaran',
            'Jabatan Taman dan Landskap',
        ];

        foreach ($departments as $department) {
            Department::create(['name' => $department]);
        }
    }
}
