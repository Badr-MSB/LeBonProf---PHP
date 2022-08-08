<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Reservation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class WebsiteController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function StudentRegistration_submit(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->ville = $request->ville;
        $user->telephone = $request->telephone;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->route('home')->with('success', 'Votre compte est bien créé!');
    }

    public function StudentLogin_Submit(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('StudentDashboard');
        } else {
            return redirect()->route('home')->with('failed', "Mot de passe ou email incorrect");
        }
    }

    public function StudentDashboard()
    {
        return view('StudentDashboard');
    }
    
    public function StudentCoursDisponibles()
    {
        $posts = DB::table('posts')->leftjoin('tuteurs', 'tuteurs.id', '=', 'posts.tuteur_id')
                                ->select(
                                    'posts.id',
                                    'posts.titre',
                                    'tuteurs.nom as nom_tuteur',
                                    'posts.capacity',
                                    'posts.matiere',
                                    'posts.description',
                                    'posts.prix'
                                )->get();

        $matieres = DB::table('posts')->distinct()->get(['matiere']);



        return view('StudentCoursDisponibles', compact('posts','matieres'));
    }

    public function StudentMesDemandes()
    {

        $reservation = DB::table('reservations')
                ->leftjoin('tuteurs', 'tuteurs.id', '=', 'reservations.id_tuteur')
                ->leftjoin('posts', 'posts.id', '=', 'reservations.id_post')
                ->where('id_student', Auth::guard('web')->user()->id)
                ->select(
                        'tuteurs.nom as nom_tuteur',
                        'tuteurs.telephone as telephone_tuteur',
                        'reservations.tuteur_confirmed as c_t',
                        'posts.titre as titre_post'
                        )
                ->get();

        return view('StudentMesDemandes', compact('reservation'));
    }

    public function StudentMesRéservationsEnCours()
    {
        $reservation = DB::table('reservations')
            ->leftjoin('tuteurs', 'tuteurs.id', '=', 'reservations.id_tuteur')
            ->leftjoin('posts', 'posts.id', '=', 'reservations.id_post')
            ->leftjoin('lieus', 'lieus.id', '=', 'reservations.id_lieu')->where('id_student', Auth::guard('web')->user()->id)
            ->select(
                'reservations.id as id',
                'tuteurs.nom as nom_tuteur',
                'lieus.nom as nom_lieu',
                'tuteurs.telephone as telephone_tuteur',
                'lieus.telephone as telephone_lieu',
                'lieus.adresse as adresse_lieu',
                'reservations.tuteur_confirmed as c_t',
                'reservations.lieu_confirmed as c_l',
                'posts.titre as titre_post')
            ->get();

        return view('StudentMesRéservationsEnCours', compact('reservation'));
    }

    public function StudentMesReservationsConfirmees()
    {
        $reservation = DB::table('reservations')
            ->leftjoin('tuteurs', 'tuteurs.id', '=', 'reservations.id_tuteur')
            ->leftjoin('posts', 'posts.id', '=', 'reservations.id_post')
            ->leftjoin('lieus', 'lieus.id', '=', 'reservations.id_lieu')->where('id_student', Auth::guard('web')->user()->id)
            ->select(
                'reservations.id as id',
                'tuteurs.nom as nom_tuteur',
                'lieus.nom as nom_lieu',
                'tuteurs.telephone as telephone_tuteur',
                'lieus.telephone as telephone_lieu',
                'lieus.adresse as adresse_lieu',
                'reservations.tuteur_confirmed as c_t',
                'reservations.lieu_confirmed as c_l',
                'posts.titre as titre_post')
            ->get();

        return view('StudentMesReservationsConfirmees', compact('reservation'));
    }


    public function SearchResult(Request $request)
    {

        

        if($request->prix == 'Tri par : prix croissant') {
            $posts = DB::table('posts')->leftjoin('tuteurs', 'tuteurs.id', '=', 'posts.tuteur_id')
                                ->select(
                                    'posts.id',
                                    'posts.titre',
                                    'tuteurs.nom as nom_tuteur',
                                    'posts.capacity',
                                    'posts.matiere',
                                    'posts.description',
                                    'posts.prix'
                                )
                                ->orderBy('posts.prix','asc')
                                ->get();
        } 
        elseif ($request->prix == 'Tri par : prix décroissant') {
            $posts = DB::table('posts')->leftjoin('tuteurs', 'tuteurs.id', '=', 'posts.tuteur_id')
                                ->select(
                                    'posts.id',
                                    'posts.titre',
                                    'tuteurs.nom as nom_tuteur',
                                    'posts.capacity',
                                    'posts.matiere',
                                    'posts.description',
                                    'posts.prix'
                                )
                                ->orderBy('posts.prix','desc')
                                ->get();
        }else {
            $posts = DB::table('posts')->leftjoin('tuteurs', 'tuteurs.id', '=', 'posts.tuteur_id')
                                ->select(
                                    'posts.id',
                                    'posts.prix',
                                    'posts.titre',
                                    'tuteurs.nom as nom_tuteur',
                                    'posts.capacity',
                                    'posts.matiere',
                                    'posts.description'    
                                )
                                ->get();

                                

        }

        if($request->text_item!=''){
            if($request->prix == 'Tri par : prix croissant') {
                $posts = DB::table('posts')->leftjoin('tuteurs', 'tuteurs.id', '=', 'posts.tuteur_id')
                                    ->select(
                                        'posts.id',
                                        'posts.titre',
                                        'tuteurs.nom as nom_tuteur',
                                        'posts.capacity',
                                        'posts.matiere',
                                        'posts.description',
                                        'posts.prix'
                                    )
                                    ->where('posts.titre', 'like', '%'.$request->text_item.'%')
                                    ->orderBy('posts.prix','asc')
                                    ->get();
            } 
            elseif ($request->prix == 'Tri par : prix décroissant') {
                $posts = DB::table('posts')->leftjoin('tuteurs', 'tuteurs.id', '=', 'posts.tuteur_id')
                                    ->select(
                                        'posts.id',
                                        'posts.titre',
                                        'tuteurs.nom as nom_tuteur',
                                        'posts.capacity',
                                        'posts.matiere',
                                        'posts.description',
                                        'posts.prix'
                                    )
                                    ->where('posts.titre', 'like', '%'.$request->text_item.'%')
                                    ->orderBy('posts.prix','desc')
                                    ->get();
            }else {
                $posts = DB::table('posts')->leftjoin('tuteurs', 'tuteurs.id', '=', 'posts.tuteur_id')
                                    ->select(
                                        'posts.id',
                                        'posts.titre',
                                        'tuteurs.nom as nom_tuteur',
                                        'posts.capacity',
                                        'posts.matiere',
                                        'posts.description',
                                        'posts.prix'
                                    )
                                    ->where('posts.titre', 'like', '%'.$request->text_item.'%')
                                    ->get();
            }
        }

        if($request->matiere!='') {
            $posts = $posts->where('matiere', '=', $request->matiere);
        }

        $matieres = DB::table('posts')->distinct()->get(['matiere']);

        return view('StudentCoursDisponibles', compact('posts','matieres'));
    }

    

    

    public function StudentLogout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('home');
    }

    public function StudentEdit(Request $request)
    {
        $user = User::where('id', Auth::guard('web')->user()->id)->first();



        if ($request->password != '') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);
            $user->password = Hash::make($request->password);
        }




        $user->telephone = $request->telephone;
        $user->ville = $request->ville;
        $user->update();

        return redirect()->back()->with('success', "Votre profil a été bien modifié!");
    }

    public function StudentDelete()
    {
        $user = User::where('id', Auth::guard('web')->user()->id)->first();
        $user->delete();

        return redirect()->route('home');
    }

    public function StudentReservation_submit($id)
    {
        $test = Reservation::where('id_post', $id)->where('id_student', Auth::guard('web')->user()->id)->count();
        $capacity_test=Reservation::where('id_post', $id)->count();
        $post_capacity=Post::where('id', $id)->first()->capacity;
        if ($test) {
            return redirect()->route('StudentCoursDisponibles')->with('failed', "Vous l'avez déjà réservé!");
        }
        elseif ($capacity_test == $post_capacity)
        {
            return redirect()->route('StudentCoursDisponibles')->with('failed', "Ce cours est complet. Vous ne pouvez pas le réserver!");
        } else {
            $new_reservation = new Reservation();
            $new_reservation->id_post = $id;
            $new_reservation->student_confirmed = 1;
            $new_reservation->tuteur_confirmed = 0;
            $new_reservation->lieu_confirmed = 0;
            $new_reservation->id_student = Auth::guard('web')->user()->id;
            $post = Post::where('id', $id)->first();
            $tuteur_id = $post->tuteur_id;
            $new_reservation->id_tuteur = $tuteur_id;

            $new_reservation->save();

            return redirect()->route('StudentCoursDisponibles')->with('success', 'Votre réservation est bien créé!');
        }
    }

    public function StudentLieuSelectSubmit($lieu_id, $reservation_id)
    {
        $test = Reservation::where('id', $reservation_id)->where('id_lieu', $lieu_id)->count();
        if ($test) {
            return redirect()->route('StudentMesRéservationsEnCours')->with('failed', "Vous avez déjà réservé ce lieu!");
        } else {
            $reservation = Reservation::where('id', $reservation_id)->first();
            $reservation->id_lieu = $lieu_id;
            $reservation->update();
            return redirect()->route('StudentMesRéservationsEnCours')->with('success', 'Vous avez bien choisi le lieu!');
        }
    }

    public function TuteurLieuSelectSubmit($lieu_id, $reservation_id)
    {
        $test = Reservation::where('id', $reservation_id)->where('id_lieu', $lieu_id)->count();
        if ($test) {
            return redirect()->route('TuteurReservationsEnCours')->with('failed', "Vous avez déjà réservé ce lieu!");
        } else {
            $reservation = Reservation::where('id', $reservation_id)->first();
            $reservation->id_lieu = $lieu_id;
            $reservation->update();
            return redirect()->route('TuteurReservationsEnCours')->with('success', 'Vous avez bien choisi le lieu!');
        }
    }
}
