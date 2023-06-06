<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Tenant;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->input('titulo') && $request->input('mensaje')) {
            $post = new Post();
            $post->titulo = $request->input('titulo');
            $post->mensaje = $request->input('mensaje');
            $post->save();
        }
        
        $latestPost = Post::latest()->first();
        
        if ($latestPost) {
            $titulo = $latestPost->titulo;
            $mensaje = $latestPost->mensaje;
        } else {
            $titulo = 'Titulo';
            $mensaje = 'Este es mi mensaje';
        }
        
        return view('home', compact('titulo', 'mensaje'));        
    }

    public function crearTenant(Request $request)
    {
        try {
            $tenant = new Tenant;
            $tenant->name = $request->input('nombre');
            $tenant->domain = $request->input('dominio').'.localhost';
            // $tenant->database = str_replace(' ', '_', $request->input('nombre'));
            $tenant->save();

            return redirect()->back()
                ->with('correcto', 'Se ha creado un nuevo tenant con el dominio ahora eres libre de utilizarlo');        
        }catch (\Exception $e) {
            return redirect()->back()
                ->with('correcto', 'Error no se ha podido crear el tenant, ERROR: ' . $e->getMessage());
        }
    }
}
