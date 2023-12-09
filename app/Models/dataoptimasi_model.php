<?php

namespace App\Models;

use CodeIgniter\Model;

class dataoptimasi_model extends Model
{
    protected $table = 'konversi_penilaian';

    public function tampiloptimasi()
    {
        // Ambil data konversi_penilaian
        $dataquery1 = $this->db->query("SELECT * FROM konversi_penilaian");
        $rdataquery1 = $dataquery1->getResultArray();

        // Ambil data data_kriteria
        $dataquery2 = $this->db->query("SELECT * FROM data_kriteria");
        $rdataquery2 = $dataquery2->getResultArray();

        // Hitung nilai optimasi menggunakan metode Moora
        $optimizedData = $this->calculateMooraOptimization($rdataquery1, $rdataquery2);

        return $optimizedData;
    }

    private function calculateMooraOptimization($konversiData, $kriteriaData)
    {
        $result = [];

        // Loop untuk setiap alternatif
        foreach ($konversiData as $alternatif) {
            $optimizationValues = [];

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

                // Hitung nilai optimasi
                $optimizedValue = $normalizedValue * $kriteria['nilai_kriteria'];

                // Tambahkan nilai optimasi ke array
                $optimizationValues[] = $optimizedValue;
            }

            // Hitung nilai optimasi total
            $totalOptimization = array_sum($optimizationValues);

            // Tambahkan hasil optimasi ke array hasil
            $result[] = [
                'id_konversi' => $alternatif['id_konversi'],
                'nama_usaha' => $alternatif['nama_usaha'],
                'C1' => $optimizationValues[0],
                'C2' => $optimizationValues[1],
                'C3' => $optimizationValues[2],
                'C4' => $optimizationValues[3],
                'C5' => $optimizationValues[4],
                'C6' => $optimizationValues[5],
                'C7' => $optimizationValues[6],
            ];
        }

        return $result;
    }
}
