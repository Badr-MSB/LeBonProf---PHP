<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lieu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LieuController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function LieuRegistration_submit(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $lieu = new Lieu();
        $lieu->nom = $request->nom;
        $lieu->adresse = $request->adresse;
        $lieu->email = $request->email;
        $lieu->ville = $request->ville;
        $lieu->telephone = $request->telephone;
        $lieu->password = Hash::make($request->password);
        $lieu->description = $request->description;
        $lieu->disponible = 0;
        $lieu->confirmed_profile = 0;

        $lieu->save();
        return redirect()->route('home')->with('success', "Votre compte en tant qu'un lieu publique est bien créé!");
    }

    public function LieuLogin_Submit(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('lieu')->attempt($credentials)) {
            return redirect()->route('LieuDashboard');
        } else {
            return redirect()->route('home')->with('failed', "Mot de passe ou email incorrect");
        }
    }

    public function LieuDashboard()
    {
        $reservations = DB::table('reservations')
            ->leftjoin('posts', 'posts.id', '=', 'reservations.id_post')
            ->leftjoin('users', 'users.id', '=', 'reservations.id_student')
            ->leftjoin('tuteurs', 'tuteurs.id', '=', 'reservations.id_tuteur') 
            ->where('id_lieu', Auth::guard('lieu')->user()->id)
            ->select('reservations.id as reservation_id','users.nom as nom_student', 'tuteurs.nom as nom_tuteur', 'reservations.tuteur_confirmed as c_t'
            ,'reservations.lieu_confirmed as c_l',
            'posts.description as description',
            'users.telephone as student_telephone',
            'tuteurs.bio as tuteur_bio',
            'tuteurs.telephone as tuteur_telephone'
            )->get();

            
        
        

        return view('lieu.LieuDashboard',compact('reservations'));
    }

    public function LieuMesDemandes()
    {
        $reservations = DB::table('reservations')
            ->leftjoin('users', 'users.id', '=', 'reservations.id_student')
            ->leftjoin('tuteurs', 'tuteurs.id', '=', 'reservations.id_tuteur')
            ->leftjoin('posts', 'posts.id', '=', 'reservations.id_post')
            ->where('id_lieu', Auth::guard('lieu')->user()->id)
            ->select('reservations.id as reservation_id','users.nom as nom_student', 'tuteurs.nom as nom_tuteur', 'reservations.tuteur_confirmed as c_t'
            ,'reservations.lieu_confirmed as c_l',
            'posts.description as description',
            'users.telephone as student_telephone',
            'tuteurs.bio as tuteur_bio',
            'tuteurs.telephone as tuteur_telephone'
            )->get();


        return view('lieu.LieuMesDemandes',compact('reservations'));
    }

    public function LieReservationsConfirmees()
    {
        $reservations = DB::table('reservations')
            ->leftjoin('users', 'users.id', '=', 'reservations.id_student')
            ->leftjoin('tuteurs', 'tuteurs.id', '=', 'reservations.id_tuteur')
            ->leftjoin('posts', 'posts.id', '=', 'reservations.id_post')
            ->where('id_lieu', Auth::guard('lieu')->user()->id)
            ->select('reservations.id as reservation_id','users.nom as nom_student', 'tuteurs.nom as nom_tuteur', 'reservations.tuteur_confirmed as c_t'
            ,'reservations.lieu_confirmed as c_l',
            'posts.description as description',
            'users.telephone as student_telephone',
            'tuteurs.bio as tuteur_bio',
            'tuteurs.telephone as tuteur_telephone'
            )->get();

        return view('lieu.LieReservationsConfirmees',compact('reservations'));
    }



    public function LieuLogout()
    {
        Auth::guard('lieu')->logout();

        return redirect()->route('home');
    }

    public function LieuEdit(Request $request)
    {
        $lieu = Lieu::where('id', Auth::guard('lieu')->user()->id)->first();



        if ($request->password != '') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);
            $lieu->password = Hash::make($request->password);
        }




        $lieu->telephone = $request->telephone;
        $lieu->ville = $request->ville;
        $lieu->adresse = $request->adresse;
        $lieu->description = $request->description;
        $lieu->update();

        return redirect()->back()->with('success', "Votre profil a été bien modifié!");
    }

    public function LieuDelete()
    {
        $lieu = Lieu::where('id', Auth::guard('lieu')->user()->id)->first();
        $lieu->delete();

        return redirect()->route('home');
    }

    public function LieuDisponible()
    {
        if (Auth::guard('lieu')->user()->confirmed_profile)
        {
            $lieu = Lieu::where('id', Auth::guard('lieu')->user()->id)->first();
            $lieu->disponible=( ($lieu->disponible + 1) % 2);
            $lieu->update();
    
            return redirect()->back();
        }
        else
        {
            return redirect()->back()->with('failed', "Votre profile n'est pas encore vérifié. Vous ne pouvez malheureusement pas modifier votre disponibilité!");
        }
    }
}
