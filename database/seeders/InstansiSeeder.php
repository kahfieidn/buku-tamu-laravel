<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instansi;
class InstansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instansi::create([
            'nama_instansi' => 'Dinas Komunikasi Informatika'
        ]);
        Instansi::create([
            'nama_instansi' => 'Dinas Pekerjaan Umum'
        ]);
        Instansi::create([
            'nama_instansi' => 'Dinas Kelautan Perikanan'
        ]);
        Instansi::create([
            'nama_instansi' => 'Sekretariat Daerah'
        ]);
    }
}
