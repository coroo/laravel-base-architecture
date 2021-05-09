<?php

namespace App\Policies;

use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class logNewUserUploaderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny($logNewUserUploader)
    {
        return Gate::any(['manageLogNewUserUploader', 'viewLogNewUserUploader'], $logNewUserUploader);
    }

    public function view($logNewUserUploader)
    {
        return Gate::any(['manageLogNewUserUploader', 'viewLogNewUserUploader'], $logNewUserUploader);
    }

    public function create($logNewUserUploader)
    {
        return $logNewUserUploader->can('manageLogNewUserUploader');
    }

    public function update($logNewUserUploader)
    {
        return $logNewUserUploader->can('manageLogNewUserUploader', $logNewUserUploader);
    }

    public function delete($logNewUserUploader)
    {
        return false;
    }

    public function restore($logNewUserUploader)
    {
        return false;
    }

    public function forceDelete($logNewUserUploader)
    {
        return false;
    }

    public function addUserInvoice($logNewUserUploader)
    {
        return false;
    }

    public function addUser($logNewUserUploader)
    {
        return false;
    }
}
