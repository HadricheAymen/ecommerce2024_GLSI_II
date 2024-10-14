<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories=Categorie::all();
            return response()->json($categories);
        } catch (\Exception $e) {
            return response()->json(["message" => "probleme de recuperation des catégories","error"=>$e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $categorie=new Categorie([
                'nomcategorie'=>$request->input('nomcategorie'),
                'imagecategorie'=>$request->input('imagecategorie'), 
            ]);
            $categorie->save();
            return response()->json($categorie);

            
        } catch (\Exception $e) {
            return response()->json(["message" => "probleme de sauvegarde des catégories","error"=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $categorie=Categorie::findOrFail($id);
            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json(["message" => "probleme de recuperation de catégorie","error"=>$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request,  $id)
    {
        try {
            $categorie=Categorie::findOrFail($id);
            $categorie->update($request->all());
            // $categorie->update([
            //     'nomcategorie'=>$request->input('nomcategorie'),
            //     'imagecategorie'=>$request->input('imagecategorie'),
            // ]);
            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json(["message" => "probleme de modification de catégories","error"=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deleted=Categorie::destroy($id);
            return response()->json(["message" => "catégorie supprimé avec succes"]);
        } catch (\Exception $e) {
            return response()->json(["message" => "probleme de suppression de catégories","error"=>$e->getMessage()]);
        }
        
    }
}
