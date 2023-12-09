<?php

namespace App\Models;

use CodeIgniter\Model;

class Dataperankingan_model extends Model
{
    protected $table = 'konversi_penilaian';

    public function tampilranking()
    {
        // Ambil data dari data_maxmin
        $mb = new Datamaxmin_model();
        $dataMb = $mb->tampilmaxmin();

        // Urutkan data berdasarkan nilai Y dari tertinggi ke terendah
        usort($dataMb, function ($a, $b) {
            return $b['Y'] <=> $a['Y'];
        });

        // Beri peringkat
        $peringkat = 1;
        foreach ($dataMb as &$data) {
            $data['Ranking'] = $peringkat++;
        }

        // Ambil kolom yang dibutuhkan
        $result = array_map(function ($data) {
            return [
                'nama_usaha' => $data['nama_usaha'],
                'Y' => $data['Y'],
                'Ranking' => $data['Ranking'],
            ];
        }, $dataMb);

        return $result;
    }
}
