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
        $operations = Operation::all();
        return view('operations.index', compact('operations'));
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
    public function store(Request $request)
    {
        $request->validate([
            'nature_operation'=>'required',
            'date_operation'=>'required',
            'debit'=>'required',
            'category_id'=>'required',
            'status_id'=>'required',
        
        ]);

        $operation = Operation::create([
            'nature_operation' => $request->nature_operation,
            'date_operation' => $request->date_operation,
            'debit' => $request->debit,
            'category_id' => $request->category_id,
            'status_id' => $request->status_id,
    
        ]);



        return redirect()->route('operations.index')
            ->with('success', 'Opération créer avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operation= Operation::find($id);
        $category = $operation->category->category_name;
        $status = $operation->status->status_name;
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
        ]);
        Operation::whereId($id)->update($updateOperation);

        return redirect()->route('operation.index')
                         ->with('success', 'L\operation est mise à jour avec succes');
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
