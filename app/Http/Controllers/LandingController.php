<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Tenant;

class LandingController extends Controller
{
    public function crearTenant(Request $request)
    {
        try {
            $tenant = new Tenant;
            $tenant->name = $request->input('nombre');
            $tenant->domain = $request->input('dominio').'.localhost';
            $tenant->save();
            // dd($request->all());

            return redirect()->back()
                ->with('correcto', 'Se ha creado un nuevo tenant con el dominio ahora eres libre de utilizarlo');
        }catch (\Exception $e) {
            return redirect()->back()
                ->with('correcto', 'Error no se ha podido crear el tenant, ERROR: ' . $e->getMessage());
        }
    }
}
