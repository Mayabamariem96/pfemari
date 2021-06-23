<?php

namespace App\Http\Controllers;
use App\Models\Produit;


use Illuminate\Http\Request;

class ProduitController extends Controller
{
    //
    // public function index()
    // {
    //     $produits = Produit::all();
    // }
    public function produit(Request $request)
    {

        $produits = new Produit();
        
        if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');

            $produits->image = $file_name;
            $produits->path = $file_path;
            $produits->nom = $request->nom;
            $produits->categorie = $request->categorie;
            $produits->prix = $request->prix;
            $produits->quantite = $request->quantite;
            $produits->description = $request->description;
            $produits->commande_confirme = $request->commande_confirme;
            $produits->reviews = $request->reviews;
            
            $produits->save();

            return response()->json('created');
        } else {
            return response()->json('no');

        }
        
    }

    public function produitByCategorie($categorie)
    {
        $produits = produit::where('categorie', $categorie)->get();
        return response()->json($produits);
    }
    
    public function produits()
    {
        $produits = produit::all();
        
        return response()->json($produits);
    }

    public function produitById($id) {
        if(produit::where('id', $id)->exists()) {
            $produit = produit::where('id', $id)->get();

            return response()->json($produit);
        } else {
            return response()->json([
                'Not Found'
            ], 404);

        }
    }

    public function produitByDate()
    {
        $produits = produit::orderBy('created_at', 'desc')->get();

        return response()->json($produits);
    }
    
    public function update(Request $request, $id) {
        if(produit::where('id', $id)->exists()) {
            $produit = produit::find($id);

            $produit->image = $request->image;
            $produit->nom = $request->nom;
            $produit->categorie = $request->categorie;
            $produit->prix = $request->prix;
            $produit->quantite = $request->quantite;
            $produit->description = $request->description;
            $produit->commande_confirme = $request->commande_confirme;
            $produit->reviews = $request->reviews;

            $produit->save();

            return response()->json('Product updated successfully');
        } else {
            return response()->json([
                'Not Found'
            ], 404);

        }
    }



    public function delete($id) {
        if(produit::where('id', $id)->exists()) {
            $produit = produit::find($id);
            $produit->delete();

            return response()->json('Deleted Successfully');
        } else {
            return response()->json([
                'Not Found'
            ], 404);

        }
    }
}
