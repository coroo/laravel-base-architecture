<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UmmatListExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return User::all();
    }

    public function map($ummat): array
    {
        return [
            $ummat->id,
            $ummat->nama_aslu,
            $ummat->nama_hijrah,
            $ummat->username,
            $ummat->user_type,
            $ummat->password,
            $ummat->email,
            $ummat->access_token,
            $ummat->syubah,
            $ummat->farah,
            $ummat->image_path,
            $ummat->jenis_kelamin,
            $ummat->tempat_lahir,
            $ummat->tanggal_lahir,
            $ummat->golongan_darah,
            $ummat->status_kawin,
            $ummat->ayah_kode_nas,
            $ummat->ayah_nama_hijrah,
            $ummat->ibu_kode_nas,
            $ummat->ibu_nama_hijrah,
            $ummat->wali_kode_nas,
            $ummat->wali_nama_hijrah,
            $ummat->alamat,
            $ummat->kelurahan,
            $ummat->kecamatan,
            $ummat->kabupaten,
            $ummat->provinsi,
            $ummat->kode_pos,
            $ummat->no_telepon,
            $ummat->whatsapp,
            $ummat->pin_bb,
            $ummat->nama_akun_fb,
            $ummat->tahun_taslim,
            $ummat->syahid_1,
            $ummat->syahid_2,
            $ummat->tempat_taslim,
            $ummat->pendidikan,
            $ummat->nama_lembaga,
            $ummat->jurusan,
            $ummat->gelar_akademik,
            $ummat->pendidikan_tamat,
            $ummat->tamat_tahun,
            $ummat->minat_hobi,
            $ummat->bakat_keahlian,
            $ummat->jenis_penghasilan,
            $ummat->penghasilan_mulai,
            $ummat->penghasilan_sampai,
            $ummat->pengeluaran_mulai,
            $ummat->pengeluaran_sampai
        ];
    }

    public function headings(): array
    {
        return [
            'ummat_id',
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