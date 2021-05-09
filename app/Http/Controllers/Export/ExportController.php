<?php

namespace App\Http\Controllers\Export;

use App\Exports\UmmatListExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class ExportController extends Controller
{
    public function __construct()
    {
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function ummatList() 
    {
        return Excel::download(new UmmatListExport, 'ummat_list_'.Carbon::now()->format('Ymd_His').'.xlsx');
    }
}
