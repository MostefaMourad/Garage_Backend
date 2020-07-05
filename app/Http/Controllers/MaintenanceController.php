<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelpers;
use App\Http\Requests\AjoutMaintenanceRequest;
use App\Http\Requests\UpdateMaintenanceRequest;
use App\Maintenance;
use App\Piece_Rechange;
use Illuminate\Routing\Controller;

class MaintenanceController extends Controller
{
    public function index()
    {
        $maintenances = Maintenance::all();
        $response = APIHelpers::createAPIResponse(false, 200, '', $maintenances);
        return response()->json($response, 200);
    }

    public function store(AjoutMaintenanceRequest $request)
    {
        $piece = Piece_Rechange::find($request->piece_id);
        if($piece->quantite==0){
            $response = APIHelpers::createAPIResponse(false, 201, 'Pièce non-disponible', null);
            return response()->json($response, 201);
        }
        else{   
        $new_maintenance = new Maintenance();
        $new_maintenance->date = $request->date;
        $new_maintenance->description = $request->description;
        $new_maintenance->vehicule_id = $request->vehicule_id;
        $new_maintenance->piece_id = $request->piece_id;
        $piece->quantite -=1;
        $piece->save();
        $maintenance_save = $new_maintenance->save();
        if($maintenance_save){
            $response = APIHelpers::createAPIResponse(false, 201, 'Ajout avec succés',$new_maintenance);
            return response()->json($response, 200);
        }
        else{
            $response = APIHelpers::createAPIResponse(false, 201, 'Erreur de sauvguarde', null);
            return response()->json($response, 201);
        }
        }
    }

    public function show($id)
    {
        $maintenance = Maintenance::find($id);
        if ($maintenance == null) {
            $response = APIHelpers::createAPIResponse(true, 204, 'maintenance introuvable', null);
        } else {
            $response = APIHelpers::createAPIResponse(false, 200, 'maintenance disponible', $maintenance);
        }
        return response()->json($response, 200);
    }

    public function update(UpdateMaintenanceRequest $request,$id){
        $maintenance= Maintenance::find($id);
        if($maintenance!=null){
        {
            if($request->has('date')) {
                $maintenance->date = $request->date;
            }
            if($request->has('description')){
                $maintenance->description = $request->description;
            }
            if($request->has('piece_id')){
                $maintenance->piece_id = $request->piece_id;
            }
            $maintenance_save = $maintenance->save();
            if ($maintenance_save) {
                $response = APIHelpers::createAPIResponse(false, 201, 'Modifiction avec succes', $maintenance);
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
        $maintenance = Maintenance::find($id);
        if ($maintenance == null) {
            $response = APIHelpers::createAPIResponse(true, 400, 'echec maintenance Introuvable', null);
            return response()->json($response, 400);
        } else {
            $maintenance_delete = $maintenance->delete();
            if ($maintenance_delete) {
                $response = APIHelpers::createAPIResponse(false, 200, 'Suppression avec succes', $maintenance);
                return response()->json($response, 200);
            } else {
                $response = APIHelpers::createAPIResponse(true, 400, 'echec', null);
                return response()->json($response, 400);
            }
        }
    }
}
