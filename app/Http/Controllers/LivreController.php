<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\Categorie;
use Illuminate\View\View;

class LivreController extends Controller
{

    public function liste() {
        // ---- LIste des livres
        //$livres = DB::select("select * from livres");
        //$livres = DB::table('livres')->get();
        $livres = Livre::all();
       //dd($livres);
    
        // ----- livre d'id 1
        //$livres = DB::select("select * from livres where id=?",[1]);
        //$livre = DB::table('livres')->find(1);
        //$livre = Livre::find(1);
        //dump($livre);
    
        // ------ Titre, prix des livres ayant « Tom » dans le titre
        //$livres = DB::select("select titre, prix from livres where titre like ?",['%Tom%']);
        //$livres = DB::table('livres')->where("titre","like","%Tom%")->get();
        //$livres = Livre::where("titre","like","%Tom%")->get();
        //dump($livres);
    
        return view('liste_livres', ["livres"=>$livres]);
    }
    public function mesLivres(): View {
        $livres = Livre::where('user_id','=', Auth::user()->id )->get();
        return view('meslivres' ,['livres'=>$livres]);
    }

    public function ajouterForm(): View {
        $categories = Categorie::get();
        return view('ajoutlivre',['categories'=>$categories]);
    }

    public function ajouterBD(Request $request) : View {
        $livre = new Livre;
        $livre->titre = $request->titre;
        $livre->resume = $request->resume;
        $livre->prix = $request->prix;
    // - ajout du user qui crée le livre
        $livre->user_id = Auth::user()->id ;
    // - ajout de la catégorie
        $livre->categorie_id = $request->categorie_id;
    // transfert de l'image
        if ($request->hasFile('image')) {
            $nameimage = 'livre_'.time().'.jpg';
            $request->image->move(public_path()."/images/", $nameimage);
            $livre->image = $nameimage;
        }
        // enregistrement dans la BD
        $livre->save();
        // $livres = Livre::get();
        $livres = Livre::where('user_id','=',Auth::user()->id )->get();
        return view('meslivres',['livres'=>$livres,'message'=>'Le livre a été ajouté']);
    }

    public function recherche (Request $request): View {
        $motcle = $request->input('search');
        $livres = Livre::where("titre","like","%$motcle%")->get();
    
        return view('resultat_recherche', ["livres"=>$livres]);
    }

    public function delete(Request $request): View {
        $livre = Livre::find($request->idlivre);
        $livre->delete();
        //$livres = Livre::get();
        $livres = Livre::where('user_id','=',Auth::user()->id )->get();
        return view('meslivres',['livres'=>$livres,'message'=>'Le livre a été supprimé']);
    }

    public function modifierForm(Request $request) {
        $livre = Livre::find($request->idlivre);
        $categories = Categorie::get();
        return view('modiflivre',['livre'=>$livre,'categories'=>$categories]);
    }
    
    public function modifierBD(Request $request) {
        $livre = Livre::find($request->idlivre);
        $livre->titre = $request->titre;
        $livre->resume = $request->resume;
        $livre->prix = $request->prix;
        // - ajout de la catégorie
        $livre->categorie_id = $request->categorie_id;
    // transfert de l'image
        if ($request->hasFile('image')) {
            $nameimage = 'livre_'.time().'.jpg';
            $request->image->move(public_path()."/images/", $nameimage);
            $livre->image = $nameimage;
            // supprimer l'ancienne image
            $oldimage_path = public_path()."/images/".$request->oldimage;  // Value is not URL but directory file path
            if(File::exists($oldimage_path)) {
                File::delete($oldimage_path);
                echo "fichier supprimé";
            }
        } else {
            $livre->image = $request->oldimage;
        }
        $livre->save();
        // $livres = Livre::get();
        $livres = Livre::where('user_id','=',Auth::user()->id )->get();
        return view('meslivres',['livres'=>$livres,'message'=>'Le livre a été modifié']);
    }
}
