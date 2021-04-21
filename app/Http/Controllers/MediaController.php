<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Response;
use App\File as SupplierFile;

class MediaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //
    }

    public function supplierFile($filename)
    {
        $path = storage_path('app/public/file/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        return $this->generateOutput($path);
    }
    public function supplyOfficer($filename)
    {
        $path = storage_path('app/public/file/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        return $this->generateOutput($path);
    }
    

    private function generateOutput($path)
    {
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    
}
