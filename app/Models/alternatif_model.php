<?php

namespace App\Models;

use CodeIgniter\Model;

class Alternatif_model extends Model
{
    protected $table = 'konversi_penilaian';

    function __construct()
    {
        $this->db = db_connect();
    }

    function tampilalternatif()
    {
        $dataquery = $this->db->query("select * from konversi_penilaian");
        return $dataquery->getResult();
    }

    public function getMhs($id)
    {
        $dataquery = $this->db->table('konversi_penilaian')->where('id_konversi', $id)->get();
        return $dataquery->getRow();
    }

    function insertAlternatif($data)
    {
        $this->db->table('konversi_penilaian')->insert($data);
    }

    function updateAlternatif($id, $data)
    {
        $this->db->table('konversi_penilaian')->where('id_konversi', $id)->update($data);
    }

    function deleteAlternatif($id)
    {
        $this->db->table('konversi_penilaian')->where('id_konversi', $id)->delete();
    }


}