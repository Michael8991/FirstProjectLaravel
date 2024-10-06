<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        // Experience::create([
        //     'ExperienceName'=>'El Asesinato'
        // ]);
        // Experience::create([
        //     'ExperienceName'=>'Escape de Prisión'
        // ]);
        // Experience::create([
        //     'ExperienceName'=>'La Maldición'
        // ]);
        // Experience::create([
        //     'ExperienceName'=>'El Laboratorio'
        // ]);
        // Experience::create([
        //     'ExperienceName'=>'La Máquina del Tiempo'
        // ]);
    }
    public function show($id)
    {
        $experience = Experience::where('id', $id)->first();

        if (!$experience) {
            abort(404);
        }

        return view('experiences.show', compact('experience'));
    }

    public function storeExperience(Request $request)
    {
        //Validamos los campos
        $experience = $request->validate([
            'ExperienceName'=>'required|string|max:255',
            'Logo'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Imagen'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Theme'=>'required|string|in:Dark,Light'
        ]);


        //Almacenamos las imagenes en el directorio public
        $logoPath = $request->file('Logo')->store('logos','public');
        $imagePath = $request->file('Imagen')->store('Experience_images','public');


        //Creamos una nueva instancia de Experience y guardamos en la base de datos
        $experience = new Experience();
        $experience->ExperienceName = $request->input('ExperienceName');
        $experience->Logo = $logoPath;
        $experience->Imagen = $imagePath;
        $experience->Theme = $request->input('Theme');
        $experience->save();
        return view('configuracion', ['experience' => $experience]);
    }



}
