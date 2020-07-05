<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelpers;
use App\Http\Requests\AjoutVehiculeRequest;
use App\Http\Requests\UpdateVehiculeRequest;
use App\Vehicule;
use Illuminate\Routing\Controller;

class VehiculeController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::all();
        $response = APIHelpers::createAPIResponse(false, 200, '', $vehicules);
        return response()->json($response, 200);
    }

    public function store(AjoutVehiculeRequest $request)
    {
        $new_vehicule = new Vehicule();
        $new_vehicule->immatriculation = $request->immatriculation;
        $new_vehicule->marque = $request->marque;
        $new_vehicule->couleur = $request->couleur;
        $new_vehicule->categorie = $request->categorie;
        if($request->has('kilometrage')){
            $new_vehicule->kilometrage = $request->kilometrage;
        }
        else{
            $new_vehicule->kilometrage = 0;
        }
        $vehicule_save = $new_vehicule->save();
        if($vehicule_save){
            $response = APIHelpers::createAPIResponse(false, 201, 'Ajout avec succés',$new_vehicule);
            return response()->json($response, 200);
        }
        else{
            $response = APIHelpers::createAPIResponse(false, 201, 'Erreur de sauvguarde', null);
            return response()->json($response, 201);
        }
    }

    public function show($id)
    {
        $vehicule = Vehicule::find($id);
        if ($vehicule == null) {
            $response = APIHelpers::createAPIResponse(true, 204, 'vehicule introuvable', null);
        } else {
            $response = APIHelpers::createAPIResponse(false, 200, 'vehicule disponible', $vehicule);
        }
        return response()->json($response, 200);
    }

    public function update(UpdateVehiculeRequest $request,$id){
        $vehicule= Vehicule::find($id);
        if($vehicule!=null){
        {
            if($request->has('immatriculation')) {
            $vehicule->immatriculation = $request->immatriculation;
            }
            if($request->has('marque')) {
            $vehicule->marque = $request->marque;
            }
            if($request->has('couleur')){
                $vehicule->couleur = $request->couleur;
            }
            if($request->has('categorie')){
                $vehicule->categorie = $request->categorie;
            }
            if($request->has('kilometrage')){
                $vehicule->kilometrage = $request->kilometrage;
            }
            $vehicule_save = $vehicule->save();
            if ($vehicule_save) {
                $response = APIHelpers::createAPIResponse(false, 201, 'Modifiction avec succes', $vehicule);
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
        $vehicule = Vehicule::find($id);
        if ($vehicule == null) {
            $response = APIHelpers::createAPIResponse(true, 400, 'echec vehicule Introuvable', null);
            return response()->json($response, 400);
        } else {
            $vehicule_delete = $vehicule->delete();
            if ($vehicule_delete) {
                $response = APIHelpers::createAPIResponse(false, 200, 'Suppression avec succes', $vehicule);
                return response()->json($response, 200);
            } else {
                $response = APIHelpers::createAPIResponse(true, 400, 'echec', null);
                return response()->json($response, 400);
            }
        }
    }
}
