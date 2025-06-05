<?php

namespace App\Http\Controllers;

use App\Models\CatTipoPredio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatTipoPredioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoDePredios = CatTipoPredio::all();

        return view('pages.cat_tipo_predio.index', compact('tipoDePredios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
            'nombre' => 'required',
        ];

        $messages = [
            'nombre.required'   => 'El nombre es obligatorio',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            Session::flash('error', 'El nombre del perfil es obligatorio');
            return redirect()->route('tipo-de-predios.index');
        }

        DB::beginTransaction();

        try {

            $catTipoPredio = new CatTipoPredio();
            $catTipoPredio->nombre = $nombre = \Helper::capitalizeFirst($request->nombre, "1");
            $catTipoPredio->save();

            DB::commit();
            Session::flash('success', '¡Tipo de predio registrado!');

            return redirect()->route('tipo-de-predios.index');

        }catch (\PDOException $e){
            DB::rollBack();
            return back()->withErrors(['Error' => substr($e->getMessage(), 0, 150)]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CatTipoPredio $catTipoPredio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatTipoPredio $catTipoPredio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatTipoPredio $catTipoPredio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatTipoPredio $catTipoPredio)
    {
        //
    }
}
