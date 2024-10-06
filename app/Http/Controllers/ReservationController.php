<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Experience;
use App\Models\CompletedForm;
use Illuminate\Http\Request;

use Carbon\Carbon;

class ReservationController extends Controller
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

        $reservations = Reservation::paginate(4);

        if ($reservations->isEmpty()) {
            abort(404);
        }


        return view('register', [
            'reservations' => $reservations,
            'pagination' => $reservations->links(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $experience_id=$request->input('Experience');
        $experience = Experience::findOrFail($experience_id);

        $reservation = Reservation::create([
            'ownerNameReservation' => $request->input('Name'),
            'ownerSurnameReservation' => $request->input('Surname'),
            'TotalPeople' => $request->input('TotalPeople'),
            'experience_id' => $request->input('Experience'),
            'Experience' => $experience->ExperienceName,
            'reservation_date' => $request->input('Date'),
            'reservation_time' => $request->input('Time'),
        ]);

        CompletedForm::create([
            'DNI' => $request->input('DNI'),
            'Name' => $request->input('Name'),
            'Surname' => $request->input('Surname'),
            'signature' => true,
            'reservation_id' => $reservation->id //
        ]);


        return redirect()->back()->with('success', 'Formulario enviado con éxito.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

            $reservation = Reservation::find($id);

            if (!$reservation) {
                return redirect()->back()->with('error', 'La reserva no fue encontrada.');
            }
            $reservation->delete();
            return redirect()->back()->with('success', 'Reserva eliminada con éxito.');

    }

    public function getExperiences()
    {
        $experiences = Experience::all(['id', 'ExperienceName']);

        if (!$experiences) {
            abort(404);
        }

        return view('newReservation', compact('experiences'));
    }

    public function search(Request $request)
    {

        $criteria = $request->input('criteria');
        $query = $request->input('query');


        $reservations = Reservation::where($criteria, 'like', '%' . $query . '%')
            ->paginate(4)
            ->appends(['query' => $query])
            ->appends(['criteria' => $criteria]);
        return view('register', compact('reservations'));
    }
    public function searchDelete(Request $request)
    {
        $query = $request->input('query');
        $criteria = 'ownerNameReservation';

        $reservations = Reservation::where($criteria, 'like', '%' . $query . '%')
            ->paginate(4)
            ->appends(['query' => $query])
            ->appends(['criteria' => $criteria]);
        return view('registerDelete', compact('reservations'));
    }

    public function getReservationsToday()
    {
        $today = Carbon::today()->toDateString();

        $reservations = Reservation::whereDate('reservation_date', $today)->paginate(4);

        return view('registerReservations', [
            'reservations' => $reservations,
            'pagination' => $reservations->links(),
        ]);
    }

    public function getPastReservations()
    {
        $today = Carbon::today()->toDateString();
        $reservations = Reservation::whereDate('reservation_date', '<', $today)->paginate(4);
        return view('registerReservations', [
            'reservations' => $reservations,
            'pagination' => $reservations->links(),
        ]);
    }
    public function getFutureReservations()
    {
        $today = Carbon::today()->toDateString();
        $reservations = Reservation::whereDate('reservation_date', '>', $today)->paginate(4);
        return view('registerReservations', [
            'reservations' => $reservations,
            'pagination' => $reservations->links(),
        ]);
    }
}
