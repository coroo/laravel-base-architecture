<?php

namespace App\Repositories\Account;

use App\Repositories\RepositoryInterface;
use App\Models\Financial\Financial;
use Auth;

class UserFinancialRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new Financial();
    }

    public function all()
    {
        return $this->model
            ->whereUserId(Auth::user()->id)
            ->with('user', 'financialTypeAlocationInput', 'financialTypeAlocationOutput')
            ->orderBy('tanggal_finansial', 'DESC')
            ->orderBy('updated_at', 'DESC')
            ->get();
    }

    public function create(array $data)
    {
        $newUserFinancial = new Financial();
        $newUserFinancial->user_id = request()->user()->id;
        
        if(isset($data['tanggal_finansial'])){
            $newUserFinancial->tanggal_finansial = $data['tanggal_finansial'];
            $newUserFinancial->bulan_finansial = $data['bulan_finansial'];
            $newUserFinancial->financial_input_type = $data['financial_input_type'];
            $newUserFinancial->nominal_finansial = $data['nominal_finansial'];
            $newUserFinancial->catatan = $data['catatan'];
            $newUserFinancial->tahun_finansial = $data['tahun_finansial'];
            $newUserFinancial->metode_finansial = $data['metode_finansial'];

            $newUserFinancial->debit_kredit = $data['debit_kredit'];
            $newUserFinancial->no_rek = $data['no_rek'];
            $newUserFinancial->atas_nama = $data['atas_nama'];
            $newUserFinancial->bank_code = $data['bank_code'];
        }

        return $newUserFinancial->save() ? $newUserFinancial : false;
    }

    public function update(array $data, $id)
    {
        $updateUserFinancial = $this->model->latest()->find($id);
        if(isset($data['tanggal_finansial'])){
            $updateUserFinancial->tanggal_finansial = $data['tanggal_finansial'];
            $updateUserFinancial->bulan_finansial = $data['bulan_finansial'];
            $updateUserFinancial->financial_input_type = $data['financial_input_type'];
            $updateUserFinancial->nominal_finansial = $data['nominal_finansial'];
            $updateUserFinancial->catatan = $data['catatan'];
            $updateUserFinancial->tahun_finansial = $data['tahun_finansial'];
            $updateUserFinancial->metode_finansial = $data['metode_finansial'];

            $updateUserFinancial->debit_kredit = $data['debit_kredit'];
            $updateUserFinancial->no_rek = $data['no_rek'];
            $updateUserFinancial->atas_nama = $data['atas_nama'];
            $updateUserFinancial->bank_code = $data['bank_code'];
        }
        if(isset($data['bukti_transfer'])){
            $updateUserFinancial->bukti_transfer = $data['bukti_transfer'];
        }

        return $updateUserFinancial->save() ? $updateUserFinancial : [];
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
