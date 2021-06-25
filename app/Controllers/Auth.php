<?php

namespace App\Controllers;

use App\Models\Modelpegawai;
use App\Models\ModelUsers;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->Modelpegawai = new Modelpegawai();
        $this->ModelUsers = new ModelUsers();
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Login'
        ];
        return view('auth/login', $data);
    }

    public function cekUser()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $email = $request->getVar('email');
            $password = $request->getVar('password');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'email' => [
                    'label' => 'Alamat Email',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'valid_email' => '{field} tidak Valid!'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'email' => $validation->getError('email'),
                        'password' => $validation->getError('password')
                    ]
                ];
            } else {
                // Cek User di database
                $builder = $this->db->table('users');
                $user = $builder->getWhere(['email' => $email])->getRowArray();

                // Jika usernya ada
                if ($user) {
                    // Jika usernya aktif
                    if ($user['active'] == 1) {
                        // Cek password
                        if (password_verify($password, $user['password'])) {
                            // Buat Session
                            $data = [
                                'login' => true,
                                'idUser' => $user['id_user'],
                                'email' => $user['email'],
                                'levelID' => $user['level_id']
                            ];
                            $this->session->set($data);

                            $msg = [
                                'sukses' => [
                                    'link' => '/pegawai'
                                ]
                            ];
                        } else {
                            $msg = [
                                'error' => [
                                    'password' => 'Password Salah!'
                                ]
                            ];
                        }
                    } else {
                        $msg = [
                            'error' => [
                                'email' => 'Email ini belum diaktifkan!'
                            ]
                        ];
                    }
                } else {
                    $msg = [
                        'error' => [
                            'email' => 'Maaf email tidak terdaftar'
                        ]
                    ];
                }
            }

            echo json_encode($msg);
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/auth');
    }

    public function register()
    {
        $data = [
            'title' => 'Halaman Registrasi'
        ];
        return view('auth/register', $data);
    }

    public function saveRegister()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
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
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'alpha_space' => 'Kolom {field} hanya boleh berisi karakter alfabet dan spasi'
                    ]
                ],
                'tmp_lahir' => [
                    'label' => 'Tempat Lahir',
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'alpha_space' => 'Kolom {field} hanya boleh berisi karakter alfabet dan spasi'
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
                'email' => [
                    'label' => 'Alamat Email',
                    'rules' => 'required|valid_email|is_unique[users.email]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'valid_email' => '{field} tidak Valid!',
                        'is_unique' => '{field} sudah terdaftar'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|min_length[5]|matches[password2]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'matches' => '{field} tidak cocok!',
                        'min_length' => '{field} terlalu pendek!'
                    ]
                ],
                'password2' => [
                    'label' => 'Confirm Password',
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'matches' => '{field} tidak cocok!',
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nip' => $validation->getError('nip'),
                        'nama' => $validation->getError('nama'),
                        'tmp_lahir' => $validation->getError('tmp_lahir'),
                        'tgl_lahir' => $validation->getError('tgl_lahir'),
                        'jk' => $validation->getError('jk'),
                        'email' => $validation->getError('email'),
                        'password' => $validation->getError('password'),
                        'password2' => $validation->getError('password2')
                    ]
                ];
            } else {

                $this->ModelUsers->save([
                    'email' => $request->getVar('email'),
                    'password' => password_hash($request->getVar('password'), PASSWORD_BCRYPT),
                    'level_id' => 2,
                    'active' => 0
                ]);

                // $id_user = $this->ModelUsers->insertID();

                $this->Modelpegawai->save([
                    // 'id_user' => $id_user,
                    'nip' => $request->getVar('nip'),
                    'nama' => $request->getVar('nama'),
                    'tmp_lahir' => $request->getVar('tmp_lahir'),
                    'tgl_lahir' => $request->getVar('tgl_lahir'),
                    'jk' => $request->getVar('jk'),
                ]);

                $msg = [
                    'sukses' => 'Selamat! Akun anda telah dibuat. Harap aktifkan akun anda.'
                ];
            }
            echo json_encode($msg);
        } else {
            return redirect()->back();
        }
    }
}
