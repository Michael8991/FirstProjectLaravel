<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FormData;
use Illuminate\Http\Request;

class FormDataController extends Controller
{
    public function create(Request $request, $id)
    {

        try {
            $formData = FormData::find($id);

            if (!$formData) {
                return response()->json(['success' => false, 'message' => 'Registro no encontrado'], 404);
            }

            // Asigna el JSON recibido al campo fields
            $formData->fields = $request->input('fields');
            $formData->save();

            return response()->json(['message' => 'Formulario actualizado correctamente.'], 200);
        } catch (\Exception $e) {
            // Manejar cualquier excepción y devolver un error JSON
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al procesar la solicitud.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
