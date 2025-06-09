<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\Fraccionamiento;
use App\Models\CatEstatus;
use App\Models\CatEstatusDisponibilidad;
use Illuminate\Support\Facades\Log;
use DB, Session;
use App\Helpers\Helper;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        if (view()->exists('pages.gestion-lotes.index')) {
            $identy = $request->input('identy'); 
            $fraccionamientos = Fraccionamiento::orderBy('nombre', 'desc')->get();
            $fracc = $identy
                ? $fraccionamientos->firstWhere('id', $identy)
                : null;
            $estatus = CatEstatus::all();
            $estatusDisponibilidad = CatEstatusDisponibilidad::all();

            return view('pages.gestion-lotes.index', compact('fraccionamientos','identy', 'fracc','estatus','estatusDisponibilidad'));
        }
        return abort(404);
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
        
        $validated = $request->validate([
            'num_lote'         => ['required', 'string'],
            'medidas_m'        => ['required', 'string'],
            'superficie_m2'    => ['required', 'numeric', 'min:1'],
            'precio_contado'   => ['nullable', 'numeric', 'min:0'],
            'precio_credito'   => ['nullable', 'numeric', 'min:0'],
            'plano'            => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'observaciones'    => ['nullable', 'string'],
            'manzana_id'       => ['required', 'exists:manzanas,id'],
            'cat_estatus_id'   => ['required', 'exists:cat_estatus,id'],
            'cat_estatus_disponibilidad_id'   => ['required', 'exists:cat_estatus_disponibilidad,id'],
        ]);
        DB::beginTransaction();
        try {
            if ($request->hasFile('plano')) {
                $file = $request->file('plano');
                $filename = 'lote_' . time() . '.' . $file->getClientOriginalExtension(); // ejemplo: fracc_1717288000.jpg
                $path = $file->storeAs('plano', $filename, 'public');
                $validated['plano'] = $path;
            }
            $lote = new Lote();
            $lote->num_lote = $validated['num_lote'];
            $lote->medidas_m = $validated['medidas_m'];
            
            // $lote->frente_m = $validated['frente_m'];
            // $lote->fondo_m = $validated['fondo_m'];
            $lote->superficie_m2 = $validated['superficie_m2'];
            $lote->precio_contado = $validated['precio_contado'];
            $lote->precio_credito = $validated['precio_credito'];
            $lote->plano = $validated['plano'];
            $lote->observaciones = $validated['observaciones'];
            $lote->manzana_id = $validated['manzana_id'];
            $lote->cat_estatus_id = $validated['cat_estatus_id'];
            $lote->cat_estatus_disponibilidad_id = $validated['cat_estatus_disponibilidad_id'];
            $lote->save();
            DB::commit();
            Session::flash('success', 'Lote fue registrado');
            return back();
        } catch (\Throwable $th) {
            Log::error('Error guardar el lote: ' . $th->getMessage());
            DB::rollBack();
            return back()->withErrors(['Error' => substr($th->getMessage(), 0, 150)]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $lote = Lote::find($id);
        if (view()->exists('pages.gestion-lotes.edit')) {
            return view('pages.gestion-lotes.edit', compact('lote'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
       $validated = $request->validate([
            'frente_m'         => ['nullable', 'numeric', 'min:0'],
            'fondo_m'          => ['nullable', 'numeric', 'min:0'],
            'precio_contado'   => ['nullable', 'numeric', 'min:0'],
            'precio_credito'   => ['nullable', 'numeric', 'min:0'],
            'plano'            => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'observaciones'    => ['nullable', 'string'],
            'manzana_id'       => ['required', 'exists:manzanas,id'],
            'cat_estatus_id'   => ['required', 'exists:cat_estatus,id'],
        ]);
        DB::beginTransaction();
        try {
            if ($request->hasFile('plano')) {
                $file = $request->file('plano');
                $filename = 'lote_' . time() . '.' . $file->getClientOriginalExtension(); // ejemplo: fracc_1717288000.jpg
                $path = $file->storeAs('plano', $filename, 'public');
                $validated['plano'] = $path ?? null;
            }
            $lote = Lote::find($id);
            $lote->frente_m = $validated['frente_m'];
            $lote->fondo_m = $validated['fondo_m'];
            $lote->superficie_m2 = $validated['frente_m'] * $validated['fondo_m'];
            $lote->precio_contado = $validated['precio_contado'];
            $lote->precio_credito = $validated['precio_credito'];
            $lote->plano = $validated['plano'] ?? null;
            $lote->observaciones = $validated['observaciones'];
            $lote->manzana_id = $validated['manzana_id'];
            $lote->cat_estatus_id = $validated['cat_estatus_id'];
            $lote->save();
            DB::commit();
            Session::flash('success', 'Lote fue actualizado');
            return back();
        } catch (\Throwable $th) {
            Log::error('Error actualizar el lote: ' . $th->getMessage());
            DB::rollBack();
            return back()->withErrors(['Error' => substr($th->getMessage(), 0, 150)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $lote = Lote::find($id);       
            $lote->delete();
            return redirect()->back()->with('success', 'Lote eliminado correctamente');
        } catch (\Throwable $th) {
            Log::error('Error al eliminar el Lote: ' . $th->getMessage());
            return redirect()->back()->with('error', 'No se pudo eliminar el Lote. Intenta más tarde.');
        }
    }

     public function createLote(string $id)
    {
        // Este id Es para ponerlo ne le hide del form y asocarlo el lote al fraccionamiento        
        $fraccionamiento_id = $id;
        if (view()->exists('pages.gestion-lotes.create')) {
            return view('pages.gestion-lotes.create',compact('fraccionamiento_id'));
        }
        return abort(404);
    }
}
