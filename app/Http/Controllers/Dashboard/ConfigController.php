<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Experience;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::all(['id', 'ExperienceName']);

        if (!$experiences) {
            abort(404);
        }

        return view('configuration', compact('experiences'));
    }


}
