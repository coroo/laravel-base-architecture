<?php

namespace App\Repositories\Account;

use App\Repositories\RepositoryInterface;
use App\User;

class UserProfileRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function all()
    {
    }

    public function create(array $data)
    {
        // $newUserProfile = new User();
        // $newUserProfile->user_id = request()->user()->id;
        // $newUserProfile->kode_nas = $data['kode_nas'];

        // return $newUserProfile->save() ? $newUserProfile : false;
    }

    public function update(array $data, $id)
    {
        $updateUserProfile = $this->model->latest()->find($id);
        if(isset($data['nama_aslu'])){
            $updateUserProfile->syubah = $data['syubah'];
            $updateUserProfile->farah = $data['farah'];
            $updateUserProfile->nama_aslu = $data['nama_aslu'];
            $updateUserProfile->nama_hijrah = $data['nama_hijrah'];
            $updateUserProfile->jenis_kelamin = $data['jenis_kelamin'];
            $updateUserProfile->tempat_lahir = $data['tempat_lahir'];
            $updateUserProfile->tanggal_lahir = $data['tanggal_lahir'];
            $updateUserProfile->status_keumatan = $data['status_keumatan'];
            $updateUserProfile->golongan_darah = $data['golongan_darah'];
            $updateUserProfile->status_kawin = $data['status_kawin'];
            $updateUserProfile->ayah_kode_nas = $data['ayah_kode_nas'];
            $updateUserProfile->ayah_nama_hijrah = $data['ayah_nama_hijrah'];
            $updateUserProfile->ibu_kode_nas = $data['ibu_kode_nas'];
            $updateUserProfile->ibu_nama_hijrah = $data['ibu_nama_hijrah'];
            $updateUserProfile->wali_kode_nas = $data['wali_kode_nas'];
            $updateUserProfile->wali_nama_hijrah = $data['wali_nama_hijrah'];
            $updateUserProfile->email = $data['email'];
            $updateUserProfile->alamat = $data['alamat'];
            $updateUserProfile->kelurahan = $data['kelurahan'];
            $updateUserProfile->kecamatan = $data['kecamatan'];
            $updateUserProfile->kabupaten = $data['kabupaten'];
            $updateUserProfile->provinsi = $data['provinsi'];
            $updateUserProfile->kode_pos = $data['kode_pos'];
            $updateUserProfile->no_telepon = $data['no_telepon'];
            $updateUserProfile->whatsapp = $data['whatsapp'];
            $updateUserProfile->pin_bb = $data['pin_bb'];
            $updateUserProfile->nama_akun_fb = $data['nama_akun_fb'];
        }
        if(isset($data['tahun_taslim'])){
            $updateUserProfile->tahun_taslim = $data['tahun_taslim'];
            $updateUserProfile->syahid_1 = $data['syahid_1'];
            $updateUserProfile->syahid_2 = $data['syahid_2'];
            $updateUserProfile->tempat_taslim = $data['tempat_taslim'];
        }
        if(isset($data['nama_lembaga'])){
            $updateUserProfile->pendidikan = $data['pendidikan'];
            $updateUserProfile->nama_lembaga = $data['nama_lembaga'];
            $updateUserProfile->jurusan = $data['jurusan'];
            $updateUserProfile->gelar_akademik = $data['gelar_akademik'];
            $updateUserProfile->pendidikan_tamat = $data['pendidikan_tamat'];
            $updateUserProfile->tamat_tahun = $data['tamat_tahun'];
        }
        if(isset($data['minat_hobi'])){
            $updateUserProfile->bakat_keahlian = $data['bakat_keahlian'];
            $updateUserProfile->minat_hobi = $data['minat_hobi'];
        }
        if(isset($data['jenis_penghasilan']) || isset($data['penghasilan_mulai'])){
            $updateUserProfile->jenis_penghasilan = $data['jenis_penghasilan'];
            $updateUserProfile->penghasilan_mulai = $data['penghasilan_mulai'];
            $updateUserProfile->penghasilan_sampai = $data['penghasilan_sampai'];
            $updateUserProfile->pengeluaran_mulai = $data['pengeluaran_mulai'];
            $updateUserProfile->pengeluaran_sampai = $data['pengeluaran_sampai'];
        }
        if(isset($data['image_path'])){
            $updateUserProfile->image_path = $data['image_path'];
        }

        return $updateUserProfile->save() ? $updateUserProfile : [];
    }

    public function delete($id)
    {
    }

    public function show($id, $field = 'id')
    {
        return $model = ($field == 'id' || $field == false)
                ? $this->model->latest()->find($id)
                : $this->model->where($field, '=', $id)->latest()->first();
    }
}
