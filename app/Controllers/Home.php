<?php

namespace App\Controllers;

use App\Models\BookingModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('apps');
    }

    // Method untuk isi data
    public function booking()
    {
        // Cek validasi form
        if (!$this->validate(
            [
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama'
                    ]
                ],
                'nomor_telepon' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Telepon'
                    ]
                ],
                'email' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Telepon'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal'
                    ]
                ],
                'jam_mulai' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jam Mulai'
                    ]
                ],
                'jam_selesai' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jam Selesai'
                    ]
                ],
            ]
        )) {
            // Jika validasi tidak sesuai
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Jika validasi sesuai
            // print_r(json_encode($this->request->getVar()));
            $BookingModel = new BookingModel();

            // Kirim data ke database
            $booked = $BookingModel->insert([
                'nama' => $this->request->getPost('nama'),
                'nomor_telepon' => $this->request->getPost('nomor_telepon'),
                'email' => $this->request->getPost('email'),
                'tanggal' => $this->request->getPost('tanggal'),
                'jam_mulai' => $this->request->getPost('jam_mulai'),
                'jam_selesai' => $this->request->getPost('jam_selesai'),
                'jenis_lapangan' => $this->request->getPost('jenis_lapangan')
            ]);

            // Jika data berhasil di simpan tampilkan pesan success
            if ($booked == true) {
                session()->setFlashdata('success', 'Data berhasil di simpan');
                return redirect()->to(base_url('/'));
            }
            // JIka data gagal disimpan tampilkan pesan error
            // Kirim data input sebelumnya 
            else {
                session()->setFlashdata('error', 'Data gagal di simpan');
                return redirect()->back()->withInput();
            }
        }
    }
}
