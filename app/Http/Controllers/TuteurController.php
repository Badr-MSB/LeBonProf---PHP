<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuteur;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TuteurController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function TuteurRegistration_submit(Request $request)
    {
        $request -> validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        $tuteur= new Tuteur();
        $tuteur->nom=$request->nom;
        $tuteur->prenom=$request->prenom;
        $tuteur->email=$request->email;
        $tuteur->ville=$request->ville;
        $tuteur->telephone=$request->telephone;
        $tuteur->password=Hash::make($request->password);
        $tuteur->bio=$request->bio;
        $tuteur->confirmed_profile=0;
        
        $tuteur->save();
        return redirect()->route('home')->with('success','Votre compte est bien créé!');
    }

    public function TuteurLogin_Submit(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::guard('tuteur')->attempt($credentials)) {
            return redirect()->route('TuteurDashboard');
        } else {
            return redirect()->route('home')->with('failed', "Mot de passe ou email incorrect");
        }
    }

    public function TuteurDashboard()
    {
        
        $posts = Post::where('tuteur_id',Auth::guard('tuteur')->user()->id)->get();
        $reservations =DB::table('reservations')
            ->leftjoin('users', 'users.id', '=', 'reservations.id_student')
            ->leftjoin('lieus', 'lieus.id', '=', 'reservations.id_lieu')->where('id_tuteur', Auth::guard('tuteur')->user()->id)
            ->select('reservations.id as reservation_id','lieus.id as lieu_id','users.nom as nom_student', 'lieus.nom as nom_lieu', 'reservations.tuteur_confirmed as c_t'
            ,'reservations.lieu_confirmed as c_l')->get();

        

        return view('tuteur.TuteurDashboard',compact('posts','reservations'));
    }

    public function TuteurMesDemandes()
    {
        
        $reservations =DB::table('reservations')
            ->leftjoin('users', 'users.id', '=', 'reservations.id_student')
            ->leftjoin('posts', 'posts.id', '=', 'reservations.id_post')
            ->leftjoin('lieus', 'lieus.id', '=', 'reservations.id_lieu')->where('id_tuteur', Auth::guard('tuteur')->user()->id)
            ->select('reservations.id as reservation_id','lieus.id as lieu_id',
            'users.nom as nom_student',
            'lieus.nom as nom_lieu',
            'lieus.telephone as telephone_lieu',
            'lieus.adresse as adresse_lieu',
            'reservations.tuteur_confirmed as c_t',
            'reservations.lieu_confirmed as c_l',
            'users.telephone as telephone_student',
            'posts.titre as titre_post'
            )
            ->get();

        

        return view('tuteur.TuteurMesDemandes',compact('reservations'));
    }

    public function TuteurReservationsEnCours()
    {
        
        $reservations =DB::table('reservations')
            ->leftjoin('users', 'users.id', '=', 'reservations.id_student')
            ->leftjoin('posts', 'posts.id', '=', 'reservations.id_post')
            ->leftjoin('lieus', 'lieus.id', '=', 'reservations.id_lieu')->where('id_tuteur', Auth::guard('tuteur')->user()->id)
            ->select('reservations.id as reservation_id','lieus.id as lieu_id',
            'users.nom as nom_student',
            'lieus.nom as nom_lieu',
            'lieus.telephone as telephone_lieu',
            'lieus.adresse as adresse_lieu',
            'reservations.tuteur_confirmed as c_t',
            'reservations.lieu_confirmed as c_l',
            'users.telephone as telephone_student',
            'posts.titre as titre_post'
            )
            ->get();

        

        return view('tuteur.TuteurReservationsEnCours',compact('reservations'));
    }

    public function TuteurReservationsConfirmees()
    {
        
        $reservations =DB::table('reservations')
            ->leftjoin('users', 'users.id', '=', 'reservations.id_student')
            ->leftjoin('posts', 'posts.id', '=', 'reservations.id_post')
            ->leftjoin('lieus', 'lieus.id', '=', 'reservations.id_lieu')->where('id_tuteur', Auth::guard('tuteur')->user()->id)
            ->select('reservations.id as reservation_id','lieus.id as lieu_id',
            'users.nom as nom_student',
            'lieus.nom as nom_lieu',
            'lieus.telephone as telephone_lieu',
            'lieus.adresse as adresse_lieu',
            'reservations.tuteur_confirmed as c_t',
            'reservations.lieu_confirmed as c_l',
            'users.telephone as telephone_student',
            'posts.titre as titre_post'
            )
            ->get();

        

        return view('tuteur.TuteurReservationsConfirmees',compact('reservations'));
    }

    public function TuteurLogout()
    {
        Auth::guard('tuteur')->logout();

        return redirect()->route('home');
    }

    public function TuteurEdit(Request $request)
    {
        $tuteur=Tuteur::where('id',Auth::guard('tuteur')->user()->id)->first();

        

        if($request->password!='') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);
            $tuteur->password = Hash::make($request->password);
        }

        

        
        $tuteur->telephone = $request->telephone;
        $tuteur->ville = $request->ville;
        $tuteur->bio = $request->bio;
        $tuteur->update();

        return redirect()->back()->with('success', "Votre profil a été bien modifié!");
    }

    public function TuteurDelete()
    {
        $tuteur=Tuteur::where('id',Auth::guard('tuteur')->user()->id)->first();
        $tuteur->delete();

        return redirect()->route('home');
    }
}