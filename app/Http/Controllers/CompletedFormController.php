<?php

namespace App\Http\Controllers;

use App\Models\CompletedForm;
use App\Models\Reservation;
use App\Models\Experience;
use App\Models\Forms;
use Illuminate\Http\Request;

class completedFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showUncompletedForm($id)
    {
        $completed_form = CompletedForm::where('id',$id)->first();
        $reservation_id = $completed_form->reservation_id;
        $reservation =  Reservation::where('id', $reservation_id)->first();
        $exp_id = $reservation->experience_id;
        $exp = Experience::where('id',$exp_id)->first();
        $form_id = $exp->form_id;
        $form = Forms::where('id', $form_id)->first();

        return view('reservations.popUpContent', [
            'completed_form' => $completed_form,
            'reservation' => $reservation,
            'experience'=> $exp,
            'form' => $form
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(completedForm $completedForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, completedForm $completedForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(completedForm $completedForm)
    {
        //
    }
}
