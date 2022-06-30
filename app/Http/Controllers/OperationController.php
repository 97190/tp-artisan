<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operation;
use App\Models\Status;
use App\Models\Category;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operations = Operation::all(); // Toutes les opérations sont récuperées dans la variable $operations
        return view('operations.index', compact('operations')); // On retourne la vue avec le listing des opérations avec le template index.blade.php et compact sert à afficher les opérations dans la vue avec les variables blade
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        $categories = Category::all();
        return view('operations.create', compact('statuses','categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // La fonction store permets d'envoyer une requête pour pouvoir créer une opération dans la db
    {
        $request->validate([ // Recupération des valeurs saisies et validation de ces dernières dans le formulaire
            'nature_operation'=>'required',
            'date_operation'=>'required',
            'debit'=>'required',
            'category_id'=>'required',
            'status_id'=>'required',
            'amount'=> 'required'
        
        ]);

        $operation = Operation::create([ // Assigne les valeurs saisies dans le formulaire au champs correspondant dans la bd (création de la nouvelle opération)
            'nature_operation' => $request->nature_operation,
            'date_operation' => $request->date_operation,
            'debit' => $request->debit,
            'category_id' => $request->category_id,
            'status_id' => $request->status_id,
            'amount'=> $request->amount
        ]);



        return redirect()->route('operations.index')
            ->with('success', 'Opération créer avec succès !'); // Une redirection vers la route index avec un succès 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operation= Operation::find($id); // Récupère une opération par rapport à son ID
        $category = $operation->category->category_name; // On récupère le nom de la  categorie associé à l'opération
        $status = $operation->status->status_name; // On récupère le nom du statut associé à l'opération
        return view('operations.show', compact('operation' , 'category' , 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operation = Operation::findOrFail($id);
        $categories = Category::all();
        $statuses = Status::all(); 
        return view('operations.edit', compact('operation' , 'categories' , 'statuses'));

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
        $updateOperation = $request->validate([
            'nature_operation'=>'required',
            'date_operation'=>'required',
            'debit'=>'required',
            'category_id'=>'required',
            'status_id'=>'required',
            'amount'=> 'required'
        ]);
        Operation::whereId($id)->update($updateOperation);

        return redirect()->route('operations.index')
                         ->with('success', "L'operation est mise à jour avec succes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operation = Operation::findOrFail($id);
        $operation->delete();
        return redirect('/operations')->with('success', 'Operation supprimée');
    }
}
