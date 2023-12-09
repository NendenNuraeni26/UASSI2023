<?php

namespace App\Models;

use CodeIgniter\Model;

class Kriteria_model extends Model
{
    protected $table = 'data_kriteria';

    function __construct()
    {
        $this->db = db_connect();
    }

    function tampilkriteria()
    {
        $dataquery = $this->db->query("select * from data_kriteria");
        return $dataquery->getResult();
    }

    public function getMhs($id)
    {
        $dataquery = $this->db->table('data_kriteria')->where('id_kriteria', $id)->get();
        return $dataquery->getRow();
    }

    public function insertKriteria($data)
    {
        $this->db->table('data_kriteria')->insert($data);
    }
    public function updateKriteria($id, $data)
    {
        // Update data kriteria berdasarkan ID
        $this->db->table('data_kriteria')->where('id_kriteria', $id)->update($data);
    }

    public function deleteKriteria($id)
    {
        // Hapus data kriteria berdasarkan ID
        $this->db->table('data_kriteria')->where('id_kriteria', $id)->delete();
    }
}

