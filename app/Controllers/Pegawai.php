<?php

namespace App\Controllers;

use App\Models\Modelpegawai;

class Pegawai extends BaseController
{
    protected $Modelpegawai;

    public function __construct()
    {
        $this->Modelpegawai = new Modelpegawai();
    }

    // public function test()
    // {
    //     echo password_hash('admin', PASSWORD_BCRYPT);
    // }

    public function index()
    {
        $data = [
            'title' => 'Data Pegawai',
        ];

        return view('pegawai/dataPegawai', $data);
    }

    public function ambildata()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $data = [
                'getPegawai' => $this->Modelpegawai->findAll()
            ];

            $msg = [
                'data' => view('pegawai/tablePegawai', $data)
            ];

            echo json_encode($msg);
        } else {
            return redirect()->to('/pegawai');
        }
    }

    public function simpanData()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'foto' => [
                    'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran Foto terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ],
                'nip' => [
                    'label' => 'NIP',
                    'rules' => 'required|numeric|is_unique[pegawai.nip]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah terdaftar',
                        'numeric' => '{field} harus angka'
                    ]
                ],
                'nama' => [
                    'label' => 'Nama Pegawai',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tmp_lahir' => [
                    'label' => 'Tempat Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tgl_lahir' => [
                    'label' => 'Tanggal Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jk' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'foto' => $validation->getError('foto'),
                        'nip' => $validation->getError('nip'),
                        'nama' => $validation->getError('nama'),
                        'tmp_lahir' => $validation->getError('tmp_lahir'),
                        'tgl_lahir' => $validation->getError('tgl_lahir'),
                        'jk' => $validation->getError('jk')
                    ]
                ];
            } else {

                // ambil foto
                $fotoPegawai = $request->getFile('foto');

                // apakah tidak ada gambar yang diupload
                if ($fotoPegawai->getError() == 4) {
                    $namaFoto = 'default.jpg';
                } else {
                    $namaFoto = $fotoPegawai->getName();
                    $fotoPegawai->move('assets/images/profile', $namaFoto);
                }


                $this->Modelpegawai->save([
                    'nip' => $request->getVar('nip'),
                    'nama' => $request->getVar('nama'),
                    'tmp_lahir' => $request->getVar('tmp_lahir'),
                    'tgl_lahir' => $request->getVar('tgl_lahir'),
                    'jk' => $request->getVar('jk'),
                    'foto' => $namaFoto
                ]);

                $msg = [
                    'sukses' => 'Data Pegawai berhasil tersimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            return redirect()->to('/pegawai');
        }
    }

    public function pegawaiById()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $id_pegawai = $request->getVar('id_pegawai');

            $data = $this->Modelpegawai->find($id_pegawai);

            echo json_encode($data); // Mengencode variabel data menjadi json format
        } else {
            return redirect()->to('/pegawai');
        }
    }

    public function ubahData()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'editFoto' => [
                    'rules' => 'max_size[editFoto,2048]|is_image[editFoto]|mime_in[editFoto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran Foto terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ],
                'editNip' => [
                    'label' => 'NIP',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'editNama' => [
                    'label' => 'Nama Pegawai',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'editTmp_lahir' => [
                    'label' => 'Tempat Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'editTgl_lahir' => [
                    'label' => 'Tanggal Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'editJk' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'editFoto' => $validation->getError('editFoto'),
                        'editNip' => $validation->getError('editNip'),
                        'editNama' => $validation->getError('editNama'),
                        'editTmp_lahir' => $validation->getError('editTmp_lahir'),
                        'editTgl_lahir' => $validation->getError('editTgl_lahir'),
                        'editJk' => $validation->getError('editJk')
                    ]
                ];
            } else {

                $fotoPegawai = $request->getFile('editFoto');
                $fotoLama = $request->getVar('fotoLama');

                // cek gambar apakah tetep gambar lama
                if ($fotoPegawai->getError() == 4) {
                    $namaFoto = $request->getVar('fotoLama');
                } else {

                    $namaFoto = $fotoPegawai->getName();

                    // pindahkan gambar
                    $fotoPegawai->move('assets/images/profile', $namaFoto);

                    if ($fotoLama != 'default.jpg') {
                        // hapus file lama
                        unlink('assets/images/profile/' . $fotoLama);
                    }
                }

                $this->Modelpegawai->save([
                    'id_pegawai' => $request->getVar('idPeg'),
                    'nip' => $request->getVar('editNip'),
                    'nama' => $request->getVar('editNama'),
                    'tmp_lahir' => $request->getVar('editTmp_lahir'),
                    'tgl_lahir' => $request->getVar('editTgl_lahir'),
                    'jk' => $request->getVar('editJk'),
                    'foto' => $namaFoto
                ]);

                $msg = [
                    'sukses' => 'Data Pegawai berhasil diubah.'
                ];
            }
            echo json_encode($msg);
        } else {
            return redirect()->to('/pegawai');
        }
    }

    public function hapusPegawai()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $id_pegawai = $request->getVar('id_pegawai');

            $this->Modelpegawai->delete($id_pegawai);

            $msg = [
                'sukses' => 'Data Pegawai berhasil dihapus.'
            ];

            echo json_encode($msg); // Mengencode variabel data menjadi json format
        } else {
            return redirect()->to('/pegawai');
        }
    }

    public function formTambahBanyak()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {

            $msg = [
                'data' => view('pegawai/formTambahBanyak')
            ];

            echo json_encode($msg);
        } else {
            return redirect()->to('/pegawai');
        }
    }

    public function simpanDataBanyak()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {

            $nip = $request->getVar('nip');
            $nama = $request->getVar('nama');
            $tmp_lahir = $request->getVar('tmp_lahir');
            $tgl_lahir = $request->getVar('tgl_lahir');
            $jk = $request->getVar('jk');

            $jmlData = count($nip);

            for ($i = 0; $i < $jmlData; $i++) {
                $this->Modelpegawai->save([
                    'nip' => $nip[$i],
                    'nama' => $nama[$i],
                    'tmp_lahir' => $tmp_lahir[$i],
                    'tgl_lahir' => $tgl_lahir[$i],
                    'jk' => $jk[$i],

                ]);
            }

            $msg = [
                'sukses' => "$jmlData Data Pegawai berhasil tersimpan"
            ];

            echo json_encode($msg);
        } else {
            return redirect()->to('/pegawai');
        }
    }

    public function hapusBanyak()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {

            $id_pegawai = $request->getVar('id_pegawai');

            $jmlData = count($id_pegawai);

            for ($i = 0; $i < $jmlData; $i++) {
                $this->Modelpegawai->delete($id_pegawai[$i]);
            }

            $msg = [
                'sukses' => "$jmlData Data Pegawai berhasil dihapus"
            ];

            echo json_encode($msg);
        } else {
            return redirect()->to('/pegawai');
        }
    }
}
