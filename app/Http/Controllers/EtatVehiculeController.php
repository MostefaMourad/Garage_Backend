<?php

namespace App\Http\Controllers;

use App\EtatVehicule;
use App\Helpers\APIHelpers;
use App\Http\Requests\AjoutEtatVehiculeRequest;
use App\Http\Requests\UpdateEtatVehiculeRequest;
use App\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class EtatVehiculeController extends Controller
{
    public function index()
    {
        $etat_vehicules = EtatVehicule::all();
        $response = APIHelpers::createAPIResponse(false, 200, '', $etat_vehicules);
        return response()->json($response, 200);
    }

    public function store(AjoutEtatVehiculeRequest $request)
    {
        $new_etat_vehicule = new EtatVehicule();
        $new_etat_vehicule->immatriculation = $request->immatriculation;
        $new_etat_vehicule->date = $request->date;
        $new_etat_vehicule->nomre_chang_pneu = $request->nomre_chang_pneu;
        $new_etat_vehicule->nombre_maintenance = $request->nombre_maintenance;
        $new_etat_vehicule->kilometrage = $request->kilometrage;
        $new_etat_vehicule->etat_batterie = $request->etat_batterie;
        $veh = DB::table('vehicules')->where('immatriculation',$request->immatriculation)->first();
        $vehicule = Vehicule::find($veh->id);
        $new_etat_vehicule->vehicule_id = $vehicule->id;
        $etat_vehicule_save = $new_etat_vehicule->save();
        if($etat_vehicule_save){
            $response = APIHelpers::createAPIResponse(false, 201, 'Ajout avec succés',$new_etat_vehicule);
            return response()->json($response, 200);
        }
        else{
            $response = APIHelpers::createAPIResponse(false, 201, 'Erreur de sauvguarde', null);
            return response()->json($response, 201);
        }
    }

    public function show($id)
    {
        $etat_vehicule = EtatVehicule::find($id);
        if ($etat_vehicule == null) {
            $response = APIHelpers::createAPIResponse(true, 204, 'etat_vehicule introuvable', null);
        } else {
            $response = APIHelpers::createAPIResponse(false, 200, 'etat_vehicule disponible', $etat_vehicule);
        }
        return response()->json($response, 200);
    }

    public function update(UpdateEtatVehiculeRequest $request,$id){
        $etat_vehicule= EtatVehicule::find($id);
        if($etat_vehicule!=null){
        {
            if($request->has('nomre_chang_pneu')) { 
            $etat_vehicule->nomre_chang_pneu = $request->nomre_chang_pneu;
            }
            if($request->has('nombre_maintenance')) {
            $etat_vehicule->nombre_maintenance = $request->nombre_maintenance;
            }
            if($request->has('kilometrage')){
                $etat_vehicule->kilometrage = $request->kilometrage;
            }
            if($request->has('etat_batterie')){
                $etat_vehicule->etat_batterie = $request->etat_batterie;
            }
            $etat_vehicule_save = $etat_vehicule->save();
            if ($etat_vehicule_save) {
                $response = APIHelpers::createAPIResponse(false, 201, 'Modifiction avec succes', $etat_vehicule);
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
        $etat_vehicule = EtatVehicule::find($id);
        if ($etat_vehicule == null) {
            $response = APIHelpers::createAPIResponse(true, 400, 'echec Etat_vehicule Introuvable', null);
            return response()->json($response, 400);
        } else {
            $etat_vehicule_delete = $etat_vehicule->delete();
            if ($etat_vehicule_delete) {
                $response = APIHelpers::createAPIResponse(false, 200, 'Suppression avec succes', $etat_vehicule);
                return response()->json($response, 200);
            } else {
                $response = APIHelpers::createAPIResponse(true, 400, 'echec', null);
                return response()->json($response, 400);
            }
        }
    }
    public function search_immatriculation($immatriculation){
        $veh = DB::table('vehicules')->where('immatriculation',$immatriculation)->first();
        $vehicule = Vehicule::find($veh->id);
        $etats = $vehicule->etats_vehicule->toArray();
        if(($etats!=null) && !(empty(($etats))) ){
             $response = APIHelpers::createAPIResponse(false, 200, 'les Etats de vehicule Trouves', $etats);
             return response()->json($response, 200);
        }
        else{
             $response = APIHelpers::createAPIResponse(true, 400, 'echec', null);
             return response()->json($response, 400);
        }
    }
}
