<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelpegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_user', 'nip', 'nama', 'tmp_lahir', 'tgl_lahir', 'jk', 'foto'];
    protected $useAutoIncrement = true;
}
