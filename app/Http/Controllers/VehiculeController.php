<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelpers;
use App\Http\Requests\AjoutVehiculeRequest;
use App\Http\Requests\UpdateVehiculeRequest;
use App\Vehicule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $path = Storage::putFile('VehiculeImages', $request->image);
        $new_vehicule->image = $path;
        if($request->has('kilometrage')){
            $new_vehicule->kilometrage = $request->kilometrage;
        }
        else{
            $new_vehicule->kilometrage = 0;
        }
        $vehicule_save = $new_vehicule->save();
        if($vehicule_save){
            $response = APIHelpers::createAPIResponse(false, 200, 'Ajout avec succés',$new_vehicule);
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
            $cond = $vehicule->conducteur;
            $vehicule->conducteur = $cond;
            $maints = $vehicule->maintenances->toArray();
            usort($maints, function($a, $b)
            {
                return strtotime($a['date']) - strtotime($b['date']);
            });
            unset($vehicule->maintenances);
            $vehicule->derniere_maintenance = end($maints);  
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
    public function search_immatriculation($immatriculation){
           $veh = DB::table('vehicules')->where('immatriculation',$immatriculation)->first();
           if($veh!=null){
                $vehicule = Vehicule::find($veh->id);
                $cond = $vehicule->conducteur;
                $vehicule->conducteur = $cond;
                $maints = $vehicule->maintenances->toArray();
                usort($maints, function($a, $b)
                {
                    return strtotime($a['date']) - strtotime($b['date']);
                });
                unset($vehicule->maintenances);
                $vehicule->derniere_maintenance = end($maints);
                $response = APIHelpers::createAPIResponse(false, 200, 'Vehicule Trouve', $vehicule);
                return response()->json($response, 200);
           }
           else{
                $response = APIHelpers::createAPIResponse(true, 400, 'echec', null);
                return response()->json($response, 400);
           }

    }
    public function search_marque($marque){
        $vehicules = DB::table('vehicules')->where('marque',$marque)->get();
        if($vehicules!=null){
             $response = APIHelpers::createAPIResponse(false, 200, 'Vehicule Trouve', $vehicules);
             return response()->json($response, 200);
        }
        else{
             $response = APIHelpers::createAPIResponse(true, 400, 'echec', null);
             return response()->json($response, 400);
        }

 }
}
