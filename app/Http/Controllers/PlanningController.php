<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelpers;
use App\Http\Requests\AjoutPlanningRequest;
use App\Http\Requests\UpdatePlanningRequest;
use App\Planning;
use App\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PlanningController extends Controller
{
    public function index()
    {
        $plannings = Planning::all();
        $response = APIHelpers::createAPIResponse(false, 200, '', $plannings);
        return response()->json($response, 200);
    }

    public function store(AjoutPlanningRequest $request)
    {
        $new_planning = new Planning();
        $new_planning->data = $request->date;
        $new_planning->region = $request->region;
        $new_planning->adresse = $request->adresse;
        $new_planning->nom_panne = $request->nom_panne;
        $new_planning->type_panne = $request->type_panne;
        $new_planning->description_panne = $request->description_panne;
        $new_planning->vehicule_id = $request->vehicule_id;
        $veh = Vehicule::find($request->vehicule_id);
        $new_planning->immatriculation = $veh->immatriculation;
        $planning_save = $new_planning->save();
        if($planning_save){
            $response = APIHelpers::createAPIResponse(false, 201, 'Ajout avec succés',$new_planning);
            return response()->json($response, 200);
        }
        else{
            $response = APIHelpers::createAPIResponse(false, 201, 'Erreur de sauvguarde', null);
            return response()->json($response, 201);
        }
    }

    public function show($id)
    {
        $planning = Planning::find($id);
        if ($planning == null) {
            $response = APIHelpers::createAPIResponse(true, 204, 'planning introuvable', null);
        } else {
            $response = APIHelpers::createAPIResponse(false, 200, 'planning disponible', $planning);
        }
        return response()->json($response, 200);
    }

    public function update(UpdatePlanningRequest $request,$id){
        $planning= Planning::find($id);
        if($planning!=null){
        {
            if($request->has('date')) {
            $planning->data = $request->date;
            }
            if($request->has('region')) {
            $planning->region = $request->region;
            }
            if($request->has('adresse')){
                $planning->adresse = $request->adresse;
            }
            if($request->has('nom_panne')){
                $planning->nom_panne = $request->nom_panne;
            }
            if($request->has('type_panne')){
                $planning->type_panne = $request->type_panne;
            }
            if($request->has('description_panne')){
                $planning->description_panne = $request->description_panne;
            }
            $planning_save = $planning->save();
            if ($planning_save) {
                $response = APIHelpers::createAPIResponse(false, 201, 'Modifiction avec succes', $planning);
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
        $planning = Planning::find($id);
        if ($planning == null) {
            $response = APIHelpers::createAPIResponse(true, 400, 'echec planning Introuvable', null);
            return response()->json($response, 400);
        } else {
            $planning_delete = $planning->delete();
            if ($planning_delete) {
                $response = APIHelpers::createAPIResponse(false, 200, 'Suppression avec succes', $planning);
                return response()->json($response, 200);
            } else {
                $response = APIHelpers::createAPIResponse(true, 400, 'echec', null);
                return response()->json($response, 400);
            }
        }
    }
}
