<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelpers;
use App\Http\Requests\AjoutPieceRequest;
use App\Http\Requests\UpdatePieceRequest;
use App\Piece_Rechange;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PieceRechangeController extends Controller
{
    public function index()
    {
        $pieces = Piece_Rechange::all();
        $response = APIHelpers::createAPIResponse(false, 200, '', $pieces);
        return response()->json($response, 200);
    }

    public function store(AjoutPieceRequest $request)
    {
        $new_piece = new Piece_Rechange();
        $new_piece->nom = $request->nom;
        $new_piece->type = $request->type;
        $new_piece->description = $request->description;
        if($request->has('quantite')){
            $new_piece->quantite = $request->quantite;
        }
        else{
            $new_piece->quantite = 0;
        }
        $piece_save = $new_piece->save();
        if($piece_save){
            $response = APIHelpers::createAPIResponse(false, 201, 'Ajout avec succés',$new_piece);
            return response()->json($response, 200);
        }
        else{
            $response = APIHelpers::createAPIResponse(false, 201, 'Erreur de sauvguarde', null);
            return response()->json($response, 201);
        }
    }

    public function show($id)
    {
        $piece = Piece_Rechange::find($id);
        if ($piece == null) {
            $response = APIHelpers::createAPIResponse(true, 204, 'Piece introuvable', null);
        } else {
            $response = APIHelpers::createAPIResponse(false, 200, 'Piece disponible', $piece);
        }
        return response()->json($response, 200);
    }

    public function update(UpdatePieceRequest $request,$id){
        $piece= Piece_Rechange::find($id);
        if($piece!=null){
        {
            if($request->has('nom')) {
            $piece->nom = $request->nom;
            }
            if($request->has('type')) {
            $piece->type = $request->type;
            }
            if($request->has('description')){
                $piece->description = $request->description;
            }
            if($request->has('quantite')){
                $piece->quantite = $request->quantite;
            }
            $piece_save = $piece->save();
            if ($piece_save) {
                $response = APIHelpers::createAPIResponse(false, 201, 'Modifiction avec succes', $piece);
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
        $piece = Piece_Rechange::find($id);
        if ($piece == null) {
            $response = APIHelpers::createAPIResponse(true, 400, 'echec Piece Introuvable', null);
            return response()->json($response, 400);
        } else {
            $piece_delete = $piece->delete();
            if ($piece_delete) {
                $response = APIHelpers::createAPIResponse(false, 200, 'Suppression avec succes', $piece);
                return response()->json($response, 200);
            } else {
                $response = APIHelpers::createAPIResponse(true, 400, 'echec', null);
                return response()->json($response, 400);
            }
        }
    }
}
