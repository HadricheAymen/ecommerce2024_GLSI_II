<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $articles=Article::with('scategories')->with('scategories.categories')->get();
            return response()->json($articles);
        } catch (\Exception $e) {
            return response()->json(["message" => "probleme de recuperation des articles","error"=>$e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $article = new Article([
                'designation' => $request->input('designation'),
                'imageart' => $request->input('imageart'),
                'marque' => $request->input('marque'),
                'reference' => $request->input('reference'),
                'prix' => $request->input('prix'),
                'qtestock' => $request->input('qtestock'),
                'scategorieID' => $request->input('scategorieID'),
            ]);
            $article->save();
            return response()->json($article);
        } catch (\Exception $e) {
            return response()->json(["message" => "probleme d'enregistrement des articles","error"=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $article = Article::with("scategories")->with("scategories.categories")->findOrFail($id);
            return response()->json($article);
        } catch (\Exception $e) {
            return response()->json(["message" => "probleme de recuperation de l'article","error"=>$e->getMessage()]);
        }
    }

    public function showArticlesbySCAT($idscat)
    {
        try {
            $articles = Article::where("scategorieID", $idscat)->with("scategories")->get();
            return response()->json($articles);
        } catch (\Exception $e) {
            return response()->json(["message" => "probleme de recuperation de l'article","error"=>$e->getMessage()]);
        }

    }

    public function articlesPaginate() { 
        try { 
            $perPage = request()->input('pageSize', 2); // Récupère la valeur dynamique pour la pagination 
            $articles = Article::with('scategories')->paginate($perPage); // Retourne le résultat en format JSON API 
            return response()->json(
           ['products' => $articles->items(), // Les articles paginés 
                'totalPages' => $articles->lastPage(), // Le nombre de pages 
        ]); } 
        catch (\Exception $e) 
        { 
            return response()->json("Selection impossible {$e->getMessage()}"); 
        } 
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $article=Article::findOrFail($id);
            $article->update([
                'designation' => $request->input('designation'),
                'imageart' => $request->input('imageart'),
                'marque' => $request->input('marque'),
                'reference' => $request->input('reference'),
                'prix' => $request->input('prix'),
                'qtestock' => $request->input('qtestock'),
                'scategorieID' => $request->input('scategorieID'),
            ]);
            return response()->json($article);
        } catch (\Exception $e) {
            return response()->json(["message" => "probleme de modification de l'article","error"=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deleted=Article::destroy($id);
            return response()->json(["message" => "article supprimé avec succes"]);
            
        } catch (\Exception $e) {
            return response()->json(["message" => "probleme de suppression de l'article","error"=>$e->getMessage()]);
        }
    }
}
