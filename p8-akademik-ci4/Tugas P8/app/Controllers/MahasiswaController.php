<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use CodeIgniter\HTTP\ResponseInterface;

class MahasiswaController extends BaseController
{
    public function index()
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->findAll();

        return view('mahasiswa/index', $data);
    }

    public function create()
    {
        return view('mahasiswa/create');
    }

    public function store()
    {
        // 1. TAMBAHAN: Validasi input CI4
        $rules = [
            'nim'   => 'required|numeric|min_length[7]|max_length[15]|is_unique[mahasiswa.nim]',
            'nama'  => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email|is_unique[mahasiswa.email]',
            'prodi' => 'required',
            'ipk'   => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Kode lama tetap jalan
        $model = new MahasiswaModel();
        $data = [
            'nim'   => $this->request->getPost('nim'),
            'nama'  => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'prodi' => $this->request->getPost('prodi'),
            'ipk'   => $this->request->getPost('ipk'),
        ];
        $model->insert($data);
        return redirect()->to('/mahasiswa')->with('success', 'Data berhasil ditambahkan.');
    }

    // 2. TAMBAHAN: Menampilkan form edit
    public function edit($nim)
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->find($nim);

        return view('mahasiswa/edit', $data);
    }

    // 3. TAMBAHAN: Memproses perubahan data + validasi
    public function update($nim)
    {
        $rules = [
            'nim'   => "required|numeric|min_length[7]|max_length[15]|is_unique[mahasiswa.nim,nim,{$nim}]",
            'nama'  => 'required|min_length[3]|max_length[100]',
            'email' => "required|valid_email|is_unique[mahasiswa.email,nim,{$nim}]",
            'prodi' => 'required',
            'ipk'   => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new MahasiswaModel();
        $data = [
            'nim'   => $this->request->getPost('nim'),
            'nama'  => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'prodi' => $this->request->getPost('prodi'),
            'ipk'   => $this->request->getPost('ipk'),
        ];
        $model->update($nim, $data);
        return redirect()->to('/mahasiswa')->with('success', 'Data berhasil diubah.');
    }

    // 4. TAMBAHAN: Menghapus data
    public function delete($nim)
    {
        $model = new MahasiswaModel();
        $model->delete($nim);
        return redirect()->to('/mahasiswa')->with('success', 'Data berhasil dihapus.');
    }
}