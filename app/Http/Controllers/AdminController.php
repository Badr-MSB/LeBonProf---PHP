<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Lieu;
use App\Models\Tuteur;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function login_submit(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('AdminShowStudent');
        } else {
            return redirect()->route('admin_login')->with('failed', "Mot de passe ou email incorrect");
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }

    public function dashboard()
    {
        $lieux = Lieu::get();
        $confirmed_tuteurs = Tuteur::where('confirmed_profile', 1)->get();
        $unconfirmed_tuteurs = Tuteur::where('confirmed_profile', 0)->get();
        $confirmed_lieux = Lieu::where('confirmed_profile', 1)->get();
        $unconfirmed_lieux = Lieu::where('confirmed_profile', 0)->get();
        $students = User::get();

        return view('admin.AdminShowStudent', compact(
            'confirmed_tuteurs',
            'unconfirmed_tuteurs',
            'confirmed_lieux',
            'unconfirmed_lieux',
            'students'
        ));
    }

    public function AdminShowStudent()
    {
        $students = User::get();

        return view('admin.AdminShowStudent', compact('students'));
    }

    public function AdminShowTuteur()
    {
        $confirmed_tuteurs = Tuteur::where('confirmed_profile', 1)->get();
        $unconfirmed_tuteurs = Tuteur::where('confirmed_profile', 0)->get();
        $students = User::get();

        return view('admin.AdminShowTuteur', compact('confirmed_tuteurs', 'unconfirmed_tuteurs', 'students'));
    }

    public function AdminShowLieu()
    {
        $confirmed_lieux = Lieu::where('confirmed_profile', 1)->get();
        $unconfirmed_lieux = Lieu::where('confirmed_profile', 0)->get();
        $students = User::get();

        return view('admin.AdminShowLieu', compact('confirmed_lieux', 'unconfirmed_lieux', 'students'));
    }

    public function AdminShowPosts()
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

        return view('admin.AdminShowPosts', compact('posts'));
    }

    public function AdminLieuDelete($id)
    {
        $lieu = Lieu::where('id', $id)->first();
        $lieu->delete();

        return redirect()->back()->with('failed', "Vous avez supprimé le lieu sélectionné!");
    }
    public function AdminLieuValidate($id)
    {
        $lieu = Lieu::where('id', $id)->first();
        $lieu->confirmed_profile = 1;
        $lieu->update();

        return redirect()->back()->with('sucess', "Vous avez confirmé le profile du lieu sélectionné!");
    }

    public function AdminTuteurDelete($id)
    {
        $tuteur = Tuteur::where('id', $id)->first();
        $tuteur->delete();

        return redirect()->back()->with('failed', "Vous avez supprimé le tuteur sélectionné!");
    }

    public function AdminTuteurValidate($id)
    {
        $tuteur = Tuteur::where('id', $id)->first();
        $tuteur->confirmed_profile = 1;
        $tuteur->update();

        return redirect()->back()->with('sucess', "Vous avez confirmé le profile du tuteur sélectionné!");
    }


    public function AdminStudentDelete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();

        return redirect()->back()->with('failed', "Vous avez supprimé l'étudiant sélectionné!");
    }

    public function AdminPostDelete($id)
    {
        $post = Post::where('id', $id)->first();
        $post->delete();

        return redirect()->back()->with('failed', "Vous avez supprimé l'annonce sélectionné!");
    }
}
