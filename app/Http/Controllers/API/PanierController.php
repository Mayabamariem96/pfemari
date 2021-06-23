<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Panier;
use App\Models\PanierProduits;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth('api')->user();

        //calculer monatant totale panier

        $montant = 0;
        foreach($request['produits'] as $produit){
            $montant += ($produit['prix']*$produit['quantite']);
        }


        $panier_id = \DB::table('paniers')->insertGetId(array(
            'user_id' => $user ? $user->id : null,
            'nom_client' => $request['nom_client'],
            'adresse' => $request['adresse'],
            'phone' => $request['phone'],
            'statut' => 'comande',
            'montant' => $montant
        ));

        


        foreach($request['produits'] as $produit){
            PanierProduits::create([
                'panier_id' => $panier_id,
                'produit_id' => $produit['id'],
                'qty' => $produit['quantite']
            ]);
        }

        return ['message' => 'succes'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
