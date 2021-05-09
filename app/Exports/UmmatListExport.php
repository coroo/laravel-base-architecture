<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserListExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return User::all();
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->nama_aslu,
            $user->nama_hijrah,
            $user->username,
            $user->user_type,
            $user->password,
            $user->email,
            $user->access_token,
            $user->syubah,
            $user->farah,
            $user->image_path,
            $user->jenis_kelamin,
            $user->tempat_lahir,
            $user->tanggal_lahir,
            $user->golongan_darah,
            $user->status_kawin,
            $user->ayah_kode_nas,
            $user->ayah_nama_hijrah,
            $user->ibu_kode_nas,
            $user->ibu_nama_hijrah,
            $user->wali_kode_nas,
            $user->wali_nama_hijrah,
            $user->alamat,
            $user->kelurahan,
            $user->kecamatan,
            $user->kabupaten,
            $user->provinsi,
            $user->kode_pos,
            $user->no_telepon,
            $user->whatsapp,
            $user->pin_bb,
            $user->nama_akun_fb,
            $user->tahun_taslim,
            $user->syahid_1,
            $user->syahid_2,
            $user->tempat_taslim,
            $user->pendidikan,
            $user->nama_lembaga,
            $user->jurusan,
            $user->gelar_akademik,
            $user->pendidikan_tamat,
            $user->tamat_tahun,
            $user->minat_hobi,
            $user->bakat_keahlian,
            $user->jenis_penghasilan,
            $user->penghasilan_mulai,
            $user->penghasilan_sampai,
            $user->pengeluaran_mulai,
            $user->pengeluaran_sampai
        ];
    }

    public function headings(): array
    {
        return [
            'user_id',
            'nama_aslu',
            'nama_hijrah',
            'username',
            'user_type',
            'password',
            'email',
            'access_token',
            'syubah',
            'farah',
            'image_path',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'golongan_darah',
            'status_kawin',
            'ayah_kode_nas',
            'ayah_nama_hijrah',
            'ibu_kode_nas',
            'ibu_nama_hijrah',
            'wali_kode_nas',
            'wali_nama_hijrah',
            'alamat',
            'kelurahan',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'kode_pos',
            'no_telepon',
            'whatsapp',
            'pin_bb',
            'nama_akun_fb',
            'tahun_taslim',
            'syahid_1',
            'syahid_2',
            'tempat_taslim',
            'pendidikan',
            'nama_lembaga',
            'jurusan',
            'gelar_akademik',
            'pendidikan_tamat',
            'tamat_tahun',
            'minat_hobi',
            'bakat_keahlian',
            'jenis_penghasilan',
            'penghasilan_mulai',
            'penghasilan_sampai',
            'pengeluaran_mulai',
            'pengeluaran_sampai'
        ];
    }
}