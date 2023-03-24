<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Paiement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'phone'=>'min:9|max:9|exists:etudiants,phone',
        ]);

        $etudiant = Etudiant::where('phone', $request->phone)->first();
        $formations = $etudiant->formations;
        $niveaux = $etudiant->niveaux;
        $paiements = $etudiant->paiements;
        $total = $paiements->sum('montant');
        $formation = '';
        $niveau = '';


        foreach ($formations as $key => $value) {
            $formation = $value;
        }

        foreach ($niveaux as $key => $value) {
            $niveau = $value;
        }
        
        return view('nouveau',['etudiant'=>$etudiant, 'formation'=>$formation, 'niveau'=>$niveau, 'paiements'=>$paiements, 'total'=>$total]);
    }

    public function paiement(Request $request)
    {
        if ($request->type == '') {
            return back()->with('fail', 'Veuillez indiquer le type de paiement s\'il vous plait !');
        } elseif ($request->montant < 0) {
            return back()->with('fail', 'Le montant saisi n\'est pas autorisé');
        }
         else{
            $paiement = new Paiement;

            $paiement->montant = $request->montant;
            $paiement->type = $request->type;
            $paiement->etudiant_phone = $request->phone;
            $paiement->modePaiement = 'Espéce';
            $paiement->user_id = Auth::id();
            $paiement->niveau_code = $request->code;
            $paiement->date = Carbon::now();

            $save = $paiement->save();

            if($save){
                return back()->with('success','Paiement effectué avec succés');
             }else{
                 return back()->with('fail','Une erreur s\'est produite, veuiller réessayer plutard');
             }

        }
    }

    public function dashboard()
    {
        $paiements = Paiement::where('user_id', Auth::id())->get();
        return view('dashboard',['paiements'=>$paiements]);
    }
}
