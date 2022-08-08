<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tuteur;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post_create(Request $request)
    {
        $test=Tuteur::where('id',Auth::guard('tuteur')->user()->id)->first()->confirmed_profile;

        if ($test)
        {
            $request -> validate([
                'titre'=>'required'
            ]);
    
            $post= new Post();
            $post->titre=$request->titre;
            $post->matiere=strtoupper($request->matiere);
            $post->prix=$request->prix;
            $post->capacity=$request->capacity;
            $post->tuteur_id=Auth::guard('tuteur')->user()->id;
            $post->description=$request->description;
            
            $post->save();
            return redirect()->route('TuteurDashboard')->with('success','Votre annonce est bien créée!');
        }
        else{
            return redirect()->route('TuteurDashboard')->with('failed',"Votre profile n'est pas encore vérifé. Vous ne pouvez malheureusement pas publier d'annonces!");
        }
        
    }

    public function post_delete($id)
    {
        $post=Post::where('id',$id)->first();
        $post->delete();

        return redirect()->route('TuteurDashboard')->with('failed','Votre annonce est supprimée!');
    }

    public function post_edit(Request $request,$id)
    {
        $post = Post::where('id',$id)->first();

        $post->titre = $request->titre;
        $post->matiere = strtoupper($request->matiere);
        $post->capacity = $request->capacity;
        $post->prix=$request->prix;
        $post->description = $request->description;
        
        $post->update();
        return redirect()->route('TuteurDashboard')->with('success', "Votre annonce a été bien modifiée!");
    }

    public function TuteurPostEdit($id_post)
    {
        $post = Post::where('id',$id_post)->first();
        return view('tuteur.PostEdit',compact('post'));
    }
}
