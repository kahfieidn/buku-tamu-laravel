<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disposisi;

class DisposisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Disposisi::create([
            'nama_disposisi' => 'Sekretaris'
        ]);
        Disposisi::create([
            'nama_disposisi' => 'Koordinator Bidang Perizinan Terpadu Satu Pintu'
        ]);
        Disposisi::create([
            'nama_disposisi' => 'Koordinator Bidang Penanaman Modal'
        ]);
        Disposisi::create([
            'nama_disposisi' => 'Kepala Subbag Umum'
        ]);
    }
}
