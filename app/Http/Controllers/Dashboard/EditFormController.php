<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EditForm;
use App\Models\Forms;
use App\Models\Experience;

class EditFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function show($id)
    {
        $experience = EditForm::where('id', $id)->first();

        if (!$experience) {
            abort(404);
        }

        return view('experiences.editForm', compact('experience'));
    }
    public function legalTexts($id)
    {
        $experience = Experience::where('id', $id)->first();


        if (!$experience) {
            return redirect()->back()->with('error', 'La experiencia no fue encontrada.');
        }

        $form = $experience->forms;

        if ($form) {

            return view('experiences.legalText', compact('form', 'experience'));
        } else {

            return view('experiences.legalText', [
                'form' => null,
                'experience' => $experience
            ]);
        }
    }
    public function fields($id)
    {
        $experience = Experience::where('id', $id)->first();


        if (!$experience) {
            return redirect()->back()->with('error', 'La experiencia no fue encontrada.');
        }

        $form = $experience->forms;

        if ($form) {
            $fields = $form->fields;
            if($fields){
                return view('experiences.fieldsForm', compact('form', 'experience'));
            }else{
                return view('experiences.fieldsForm', [
                    'fields' => null,
                    'experience' => $experience,
                    'form'=> $form
                ]);
            }
        } else {
            return view('experiences.fieldsForm', [
                'fields'=>null,
                'form' => null,
                'experience' => $experience
            ]);
        }
    }


    public function storeLegalText(Request $request)
    {
        // Crear el nuevo formulario y obtener el ID
        $form = Forms::create([
            'Name' => $request->input('formName'),
            'LegalText' => $request->input('legalText')
        ]);

        $experience = Experience::find($request->input('experience_id'));


        if ($experience) {
            $experience->form_id = $form->id;
            $experience->save();
        }


        return redirect()->back();
    }

    public function putLegalText(Request $request, $id)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'formName' => 'required|string|max:255',
            'legalText' => 'required|string',
        ]);

        // Encontrar el formulario por ID y actualizarlo
        $form = Forms::findOrFail($id);
        $form->update([
            'Name' => $validatedData['formName'],
            'LegalText' => $validatedData['legalText'],
        ]);

        // Redirigir o retornar respuesta
        return redirect()->back();
    }


}
