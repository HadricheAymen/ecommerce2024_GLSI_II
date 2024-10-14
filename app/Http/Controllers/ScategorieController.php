<?php

namespace App\Http\Controllers;

use App\Models\Scategorie;
use Illuminate\Http\Request;

class ScategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            //$scategories=Scategorie::with('categories')->get();
            $scategories=Scategorie::all()->with('categories');
            return response()->json($scategories,status:200);
        } catch (\Exception $e) {
            return response()->json(["message" => "probleme de récuperation des categories","error" => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $scategorie = new Scategorie([
                'nomscategorie' => $request->input('nomscategorie'),
                'imagescategorie' => $request->input('imagescategorie'),
                'categorieID' => $request->input('categorieID'),
            ]);
            $scategorie->save();
            return response()->json($scategorie);
        } catch (\Throwable $th) {
            return response()->json(["message" => "probleme d'enregistrement des sous categories","error" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $scategorie=Scategorie::with('categories')->findOrFail($id);
        return response()->json($scategorie);

        } catch (\Exception $e) {
            return response()->json(["message" => "probleme de recuperation de la sous categorie","error"=>$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try {
            $scategorie=Scategorie::findOrFail($id);
            $scategorie->update([$request->all()]);
            $scategorie->save();
        return response()->json($scategorie);
        } catch (\Exception $e) {
            return response()->json(["message" => "prbleme de modifacation du sous categorie", "error" => $e->getMessage()]);
        }

         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deleted=Scategorie::destroy($id);
            return response()->json(["message" => "sous catégorie supprimé avec succes"]);
        } catch (\Exception $e) {
            return response()->json(["message" => "probleme de suppression de sous catégories","error"=>$e->getMessage()]);
        }
    }
}
