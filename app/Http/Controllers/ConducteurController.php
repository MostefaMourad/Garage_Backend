<?php

namespace App\Http\Controllers;

use App\Conducteur;
use App\Helpers\APIHelpers;
use App\Http\Requests\AjoutConducteurRequest;
use App\Http\Requests\UpdateConducteurRequest;
use Illuminate\Routing\Controller;

class ConducteurController extends Controller
{
    public function index()
    {
        $conducteurs = Conducteur::all();
        $response = APIHelpers::createAPIResponse(false, 200, '', $conducteurs);
        return response()->json($response, 200);
    }

    public function store(AjoutConducteurRequest $request)
    {
        $new_conducteur = new Conducteur();
        $new_conducteur->nom = $request->nom;
        $new_conducteur->prenom = $request->prenom;
        $new_conducteur->date_naissance = $request->date_naissance;
        $new_conducteur->vehicule_id = $request->vehicule_id;
        $conducteur_save = $new_conducteur->save();
        if($conducteur_save){
            $response = APIHelpers::createAPIResponse(false, 201, 'Ajout avec succés',$new_conducteur);
            return response()->json($response, 200);
        }
        else{
            $response = APIHelpers::createAPIResponse(false, 201, 'Erreur de sauvguarde', null);
            return response()->json($response, 201);
        }
    }

    public function show($id)
    {
        $conducteur = Conducteur::find($id);
        if ($conducteur == null) {
            $response = APIHelpers::createAPIResponse(true, 204, 'conducteur introuvable', null);
        } else {
            $response = APIHelpers::createAPIResponse(false, 200, 'conducteur disponible', $conducteur);
        }
        return response()->json($response, 200);
    }

    public function update(UpdateConducteurRequest $request,$id){
        $conducteur= Conducteur::find($id);
        if($conducteur!=null){
        {
            if($request->has('nom')) {
            $conducteur->nom = $request->nom;
            }
            if($request->has('prenom')) {
            $conducteur->prenom = $request->prenom;
            }
            if($request->has('date_naissance')){
                $conducteur->date_naissance = $request->date_naissance;
            }
            $conducteur_save = $conducteur->save();
            if ($conducteur_save) {
                $response = APIHelpers::createAPIResponse(false, 201, 'Modifiction avec succes', $conducteur);
                return response()->json($response, 200);
            } 
            else {
                $response = APIHelpers::createAPIResponse(true, 400, 'echec', null);
                return response()->json($response, 400);
            }
        }
        }else{
            $response = APIHelpers::createAPIResponse(true, 400, 'echec', null);
            return response()->json($response, 400); 
        }
    }
    
    public function destroy($id)
    {
        $conducteur = Conducteur::find($id);
        if ($conducteur == null) {
            $response = APIHelpers::createAPIResponse(true, 400, 'echec conducteur Introuvable', null);
            return response()->json($response, 400);
        } else {
            $conducteur_delete = $conducteur->delete();
            if ($conducteur_delete) {
                $response = APIHelpers::createAPIResponse(false, 200, 'Suppression avec succes', $conducteur);
                return response()->json($response, 200);
            } else {
                $response = APIHelpers::createAPIResponse(true, 400, 'echec', null);
                return response()->json($response, 400);
            }
        }
    }
}
