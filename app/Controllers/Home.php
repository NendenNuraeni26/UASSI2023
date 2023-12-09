<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Alternatif_model;
use App\Models\datamaxmin_model;
use App\Models\dataoptimasi_model;
use App\Models\datanormalisasi_model;
use App\Models\dataperankingan_model;
use App\Models\Kriteria_model;

class Home extends BaseController
{

    protected $helpers = ['url', 'form'];

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index(): string
    {
        return view('dashboard');
    }

    public function dashboard()
    {
        echo View('admin_header');
        echo View('admin_navigasi');
        echo View('dashboard');
        echo View('admin_footer');
    }
    public function callviewranking()
    {
        $mb = new dataperankingan_model();
        $datamb = $mb->tampilranking();
        $data = array('dataMb' => $datamb);

        echo View('admin_header');
        echo View('admin_navigasi');
        echo View('view_ranking', $data);
        echo View('admin_footer');
    }

    public function callviewmaxmin()
    {
        $mb = new Datamaxmin_model();
        $datamb = $mb->tampilmaxmin();
        $data = array('dataMb' => $datamb);

        echo View('admin_header');
        echo View('admin_navigasi');
        echo View('view_maxmin', $data);
        echo View('admin_footer');
    }
    public function callviewnormalisasi()
    {
        $mb = new datanormalisasi_model();
        $datamb = $mb->hitungNormalisasi(); // Menggunakan method hitungNormalisasi
        $data = array('dataMb' => $datamb);

        echo View('admin_header');
        echo View('admin_navigasi');
        echo View('view_normalisasi', $data);
        echo View('admin_footer');
    }

    public function callviewoptimasi()
    {
        $mb = new dataoptimasi_model();
        $datamb = $mb->tampiloptimasi();
        $data = array('dataMb' => $datamb, );
        echo View('admin_header');
        echo View('admin_navigasi');
        echo View('view_optimasi', $data);
        echo View('admin_footer');
    }
    public function viewalternatif()
    {
        $alternatif = new alternatif_model();
        $dataalternatif = $alternatif->tampilalternatif();
        $data = array('dataAlternatif' => $dataalternatif, );
        echo view("admin_header");
        echo view("admin_navigasi");
        echo View('view_alternatif', $data);
        echo view("admin_footer");
    }

    public function viewkriteria()
    {
        $kriteria = new kriteria_model();
        $datakriteria = $kriteria->tampilkriteria();
        $data = array('dataKriteria' => $datakriteria, );
        echo view("admin_header");
        echo view("admin_navigasi");
        echo View("view_kriteria", $data);
        echo view("admin_footer");
    }

    public function callviewkeputusan()
    {
        echo view("admin_header");
        echo view("admin_navigasi");
        echo View("view_keputusan");
        echo view("admin_footer");
    }

    // Add this function to your Home controller
    public function insertKriteria()
    {
        helper(['form']); // Load the Form Helper
        $kriteriaModel = new Kriteria_model();

        if ($this->request->getMethod() === 'post') {
            // Validation rules, adjust as needed
            $validationRules = [
                'kode_kriteria' => 'required',
                'nama_kriteria' => 'required',
                'nilai_kriteria' => 'required|numeric',
                'tipe_kriteria' => 'required',
                // Add other validation rules as needed
            ];

            // Run the validation
            if ($this->validate($validationRules)) {
                // Get validated data
                $data = [
                    'kode_kriteria' => $this->request->getPost('kode_kriteria'),
                    'nama_kriteria' => $this->request->getPost('nama_kriteria'),
                    'nilai_kriteria' => $this->request->getPost('nilai_kriteria'),
                    'tipe_kriteria' => $this->request->getPost('tipe_kriteria'),
                    // Add other fields as needed
                ];

                // Insert data using the model
                $kriteriaModel->insertKriteria($data);

                // Set a success flash message
                $this->session->setFlashdata('success', 'Kriteria added successfully.');

                // Redirect to the Kriteria view or any other page as needed
                return redirect()->to(base_url('home/viewkriteria'));
            } else {
                // If validation fails, pass errors to the view
                $data['validation'] = $this->validator;
            }
        }

        // Load the form_kriteria view with any validation errors
        echo view("admin_header");
        echo view("admin_navigasi");
        echo view("form_kriteria", $data ?? []);
        echo view("admin_footer");
    }
    public function deleteKriteria($id)
    {
        $kriteriaModel = new Kriteria_model();

        // Hapus kriteria berdasarkan ID
        $kriteriaModel->deleteKriteria($id);

        // Set pesan sukses
        $this->session->setFlashdata('success', 'Kriteria deleted successfully.');

        // Redirect ke halaman tampil kriteria
        return redirect()->to(base_url('home/viewkriteria'));
    }

    public function editKriteria($id)
    {
        $kriteriaModel = new Kriteria_model();

        // Ambil data kriteria berdasarkan ID
        $data['kriteria'] = $kriteriaModel->getMhs($id);

        // Jika data tidak ditemukan, redirect ke halaman tampil kriteria
        if (!$data['kriteria']) {
            return redirect()->to(base_url('home/viewkriteria'));
        }

        // Jika form disubmit
        if ($this->request->getMethod() === 'post') {
            // Validation rules, adjust as needed
            $validationRules = [
                'kode_kriteria' => 'required',
                'nama_kriteria' => 'required',
                'nilai_kriteria' => 'required|numeric',
                'tipe_kriteria' => 'required',
                // Add other validation rules as needed
            ];

            // Run the validation
            if ($this->validate($validationRules)) {
                // Get validated data
                $updateData = [
                    'kode_kriteria' => $this->request->getPost('kode_kriteria'),
                    'nama_kriteria' => $this->request->getPost('nama_kriteria'),
                    'nilai_kriteria' => $this->request->getPost('nilai_kriteria'),
                    'tipe_kriteria' => $this->request->getPost('tipe_kriteria'),
                    // Add other fields as needed
                ];

                // Update data menggunakan model
                $kriteriaModel->updateKriteria($id, $updateData);

                // Set pesan sukses
                $this->session->setFlashdata('success', 'Kriteria updated successfully.');

                // Redirect ke halaman tampil kriteria
                return redirect()->to(base_url('home/viewkriteria   '));
            } else {
                // Jika validasi gagal, kirim error ke view
                $data['validation'] = $this->validator;
            }
        }

        // Load view untuk menampilkan form edit
        echo view("admin_header");
        echo view("admin_navigasi");
        echo view("edit_kriteria", $data);
        echo view("admin_footer");
    }

    public function showEditForm($id)
    {
        $kriteriaModel = new Kriteria_model();

        // Ambil data kriteria berdasarkan ID
        $data['kriteria'] = $kriteriaModel->getMhs($id);

        // Jika data tidak ditemukan, redirect ke halaman tampil kriteria
        if (!$data['kriteria']) {
            return redirect()->to(base_url('home/viewkriteria'));
        }

        // Load view untuk menampilkan form edit
        echo view("admin_header");
        echo view("admin_navigasi");
        echo view("edit_kriteria", $data);
        echo view("admin_footer");
    }

    ////////////////////--------------FUNGSI UNTUK ALTERNATIF----------------/////////////////////////////////
    public function insertAlternatif()
    {
        helper(['form']); // Load the Form Helper
        $alternatifModel = new Alternatif_model();

        if ($this->request->getMethod() === 'post') {
            // Validation rules, adjust as needed
            $validationRules = [
                'nama_usaha' => 'required',
                'C1' => 'required|numeric',
                'C2' => 'required|numeric',
                'C3' => 'required|numeric',
                'C4' => 'required|numeric',
                'C5' => 'required|numeric',
                'C6' => 'required|numeric',
                'C7' => 'required|numeric',
                // Add other validation rules as needed
            ];

            // Run the validation
            if ($this->validate($validationRules)) {
                // Get validated data
                $data = [
                    'nama_usaha' => $this->request->getPost('nama_usaha'),
                    'C1' => $this->request->getPost('C1'),
                    'C2' => $this->request->getPost('C2'),
                    'C3' => $this->request->getPost('C3'),
                    'C4' => $this->request->getPost('C4'),
                    'C5' => $this->request->getPost('C5'),
                    'C6' => $this->request->getPost('C6'),
                    'C7' => $this->request->getPost('C7'),
                    // Add other fields as needed
                ];

                // Insert data using the model
                $alternatifModel->insertAlternatif($data);

                // Set a success flash message
                $this->session->setFlashdata('success', 'Alternatif added successfully.');

                // Redirect to the Alternatif view or any other page as needed
                return redirect()->to(base_url('home/viewalternatif'));
            } else {
                // If validation fails, pass errors to the view
                $data['validation'] = $this->validator;
            }
        }

        // Load the form_alternatif view with any validation errors
        echo view("admin_header");
        echo view("admin_navigasi");
        echo view("form_alternatif", $data ?? []);
        echo view("admin_footer");
    }

    public function deleteAlternatif($id)
    {
        $alternatifModel = new Alternatif_model();

        // Hapus alternatif berdasarkan ID
        $alternatifModel->deleteAlternatif($id);

        // Set pesan sukses
        $this->session->setFlashdata('success', 'Alternatif deleted successfully.');

        // Redirect ke halaman tampil alternatif
        return redirect()->to(base_url('home/viewalternatif'));
    }

    public function editAlternatif($id)
    {
        $alternatifModel = new Alternatif_model();

        // Ambil data alternatif berdasarkan ID
        $data['alternatif'] = $alternatifModel->getMhs($id);

        // Jika data tidak ditemukan, redirect ke halaman tampil alternatif
        if (!$data['alternatif']) {
            return redirect()->to(base_url('home/viewalternatif'));
        }

        // Jika form disubmit
        if ($this->request->getMethod() === 'post') {
            // Validation rules, adjust as needed
            $validationRules = [
                'nama_usaha' => 'required',
                'C1' => 'required|numeric',
                'C2' => 'required|numeric',
                'C3' => 'required|numeric',
                'C4' => 'required|numeric',
                'C5' => 'required|numeric',
                'C6' => 'required|numeric',
                'C7' => 'required|numeric',
                // Add other validation rules as needed
            ];

            // Run the validation
            if ($this->validate($validationRules)) {
                // Get validated data
                $updateData = [
                    'nama_usaha' => $this->request->getPost('nama_usaha'),
                    'C1' => $this->request->getPost('C1'),
                    'C2' => $this->request->getPost('C2'),
                    'C3' => $this->request->getPost('C3'),
                    'C4' => $this->request->getPost('C4'),
                    'C5' => $this->request->getPost('C5'),
                    'C6' => $this->request->getPost('C6'),
                    'C7' => $this->request->getPost('C7'),
                    // Add other fields as needed
                ];

                // Update data menggunakan model
                $alternatifModel->updateAlternatif($id, $updateData);

                // Set pesan sukses
                $this->session->setFlashdata('success', 'Alternatif updated successfully.');

                // Redirect ke halaman tampil alternatif
                return redirect()->to(base_url('home/viewalternatif'));
            } else {
                // Jika validasi gagal, kirim error ke view
                $data['validation'] = $this->validator;
            }
        }

        // Load view untuk menampilkan form edit
        echo view("admin_header");
        echo view("admin_navigasi");
        echo view("edit_alternatif", $data);
        echo view("admin_footer");
    }

    public function showEditAlternatif($id)
    {
        $alternatifModel = new Alternatif_model();

        // Ambil data alternatif berdasarkan ID
        $data['alternatif'] = $alternatifModel->getMhs($id);

        // Jika data tidak ditemukan, redirect ke halaman tampil alternatif
        if (!$data['alternatif']) {
            return redirect()->to(base_url('home/viewalternatif'));
        }

        // Load view untuk menampilkan form edit
        echo view("admin_header");
        echo view("admin_navigasi");
        echo view("edit_alternatif", $data);
        echo view("admin_footer");
    }

}
