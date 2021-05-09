<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralResource;
use App\Services\Master\MasterFarahService;
use Illuminate\Http\Request;

/**
 * @group Master
 *
 * API for managing Master
 */
class MasterFarahController extends Controller
{
    protected $statusCode = 200;

    public function __construct()
    {
        $this->masterFarahService = new MasterFarahService();
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
        $userJob = $this->masterFarahService->all();
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
        $userJob = $this->masterFarahService->show(request()->user()->id);
        return (new GeneralResource($userJob))->response()->setStatusCode(200);
    }

    public function add(Request $request)
    {
        $userJob = $this->masterFarahService->add($request);
    }

    public function update(Request $request, $id)
    {
        $userJob = $this->masterFarahService->update($request, $id);
    }
}
