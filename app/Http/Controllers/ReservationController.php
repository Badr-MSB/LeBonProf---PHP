<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Lieu;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function TuteurReservationDelete($id)
    {   
        $reservation = Reservation::where('id',$id)->first();
        $reservation->delete();

        return redirect()->route('TuteurReservationsConfirmees')->with('failed','La réservation est annulée!');
    }
    public function LieuReservationDelete($id)
    {   
        $reservation = Reservation::where('id',$id)->first();
        $reservation->id_lieu=NULL;
        $reservation->lieu_confirmed=0;
        $reservation->update();

        return redirect()->route('LieuMesDemandes')->with('failed','La réservation est annulée!');
    }

    public function StudentReservationDelete($id)
    {   
        $reservation = Reservation::where('id',$id)->first();
        $reservation->delete();

        return redirect()->route('StudentMesReservationsConfirmees')->with('failed','La réservation est annulée!');
    }
    

    public function TuteurReservationValidate($id)
    {
        $reservation = Reservation::where('id',$id)->first();
        $reservation->tuteur_confirmed = 1;
        $reservation->update();
        return redirect()->route('TuteurMesDemandes')->with('success','La réservation est validée!');
    }

    public function LieuReservationValidate($id)
    {
        $reservation = Reservation::where('id',$id)->first();
        $reservation->lieu_confirmed = 1;
        $reservation->update();
        return redirect()->route('LieuMesDemandes')->with('success','La réservation est validée!');
    }
    
    public function LieuSelect($id_reservation)
    {
        $lieux = Lieu::get();
        return view('LieuTableShow',compact('lieux','id_reservation'));
    }

    public function TuteurLieuSelect($id_reservation)
    {
        $lieux = Lieu::get();
        return view('tuteur.TuteurLieuTableShow',compact('lieux','id_reservation'));
    }

}
