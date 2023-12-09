<?php

namespace App\Models;

use CodeIgniter\Model;

class Datanormalisasi_model extends Model
{
    protected $table = 'konversi_penilaian';

    public function hitungNormalisasi()
    {
        // Ambil data konversi_penilaian
        $dataquery1 = $this->db->query("SELECT * FROM konversi_penilaian");
        $rdataquery1 = $dataquery1->getResultArray();

        // Ambil data data_kriteria
        $dataquery2 = $this->db->query("SELECT * FROM data_kriteria");
        $rdataquery2 = $dataquery2->getResultArray();

        // Hitung nilai normalisasi menggunakan metode Moora
        $normalizedData = $this->calculateMooraNormalization($rdataquery1, $rdataquery2);

        return $normalizedData;
    }

    private function calculateMooraNormalization($konversiData, $kriteriaData)
    {
        $result = [];

        // Loop untuk setiap alternatif
        foreach ($konversiData as $alternatif) {
            $normalizedValues = [];

            // Loop untuk setiap kriteria
            foreach ($kriteriaData as $kriteria) {
                $actualValue = $alternatif[$kriteria['kode_kriteria']];
                $sumOfSquares = 0;

                // Hitung sum of squares
                foreach ($konversiData as $alt) {
                    $sumOfSquares += pow($alt[$kriteria['kode_kriteria']], 2);
                }

                // Hitung normalized value
                $normalizedValue = $actualValue / sqrt($sumOfSquares);

                // Tambahkan normalized value ke array
                $normalizedValues[$kriteria['kode_kriteria']] = $normalizedValue;
            }

            // Tambahkan hasil normalisasi ke array hasil
            $result[$alternatif['nama_usaha']] = $normalizedValues;
        }

        return $result;
    }
}
