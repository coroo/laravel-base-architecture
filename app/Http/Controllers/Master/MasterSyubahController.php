<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralResource;
use App\Services\Master\MasterSyubahService;
use Illuminate\Http\Request;

/**
 * @group Master
 *
 * API for managing Master
 */
class MasterSyubahController extends Controller
{
    protected $statusCode = 200;

    public function __construct()
    {
        $this->masterSyubahService = new MasterSyubahService();
    }

    /**
     * Job Info.
     *
     * Job information of the user
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $userJob = $this->masterSyubahService->all();
        return (new GeneralResource($userJob))->response()->setStatusCode(200);
    }

    /**
     * Job Info.
     *
     * Job information of the user
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $userJob = $this->masterSyubahService->show(request()->user()->id);
        return (new GeneralResource($userJob))->response()->setStatusCode(200);
    }

    public function add(Request $request)
    {
        $userJob = $this->masterSyubahService->add($request);
    }

    public function update(Request $request, $id)
    {
        $userJob = $this->masterSyubahService->update($request, $id);
    }
}
