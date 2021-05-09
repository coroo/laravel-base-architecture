<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\ToModel;

class NewUserImport implements ToModel, WithStartRow
{
    protected $userTransactionID;

    public function __construct($userTransactionID)
    {
        $this->userTransactionID = $userTransactionID;
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
     * @param array $row
     *
     * @return UserProfileService|null
     */
    public function model(array $row)
    {
        if($row[2] != ''){
            return new User([
                'nama_aslu'     => $row[1],
                'nama_hijrah'   => $row[2],
                'syubah'        => $row[3],
                'farah'         => $row[4],
                'username'      => $row[5],
                'password'      => Hash::make($row[6]),
                'email'         => str_replace(' ', '', $row[7]),
                'jenis_kelamin'     => $row[8],
                'tempat_lahir'      => $row[9],
                'tanggal_lahir'     => date('Y-m-d',strtotime($row[10])),
                'status_keumatan'   => $row[11],
                'golongan_darah'   => $row[12],
                'status_kawin'   => $row[13],
                'ayah_kode_nas'   => $row[14],
                'ayah_nama_hijrah'   => $row[15],
                'ibu_kode_nas'   => $row[16],
                'ibu_nama_hijrah'   => $row[17],
                'wali_kode_nas'   => $row[18],
                'wali_nama_hijrah'   => $row[19],
                'alamat'   => $row[20],
                'kelurahan'   => $row[21],
                'kecamatan'   => $row[22],
                'kabupaten'   => $row[23],
                'provinsi'   => $row[24],
                'kode_pos'   => $row[25],
                'no_telepon'   => $row[26],
                'whatsapp'   => $row[27],
                'pin_bb'   => $row[28],
                'nama_akun_fb'   => $row[29],
                'entrance_channel'  => 'import-excel',
                'entrance_desc'     => $this->userTransactionID
            ]);
        }
    }
}
