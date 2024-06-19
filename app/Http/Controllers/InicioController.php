<?php

namespace App\Http\Controllers;

use App\Models\multimedia;
use App\Models\status;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $multimedia = Multimedia::with('category')->where('category_id', 1)->paginate(3);

        $status = Status::all();

        $category = Category::where('id', 1)->first();

        return view('admin.home.home', compact('multimedia', 'status', 'category'));
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
        $datosValidados = $request->validate([
            'name' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'url' => 'required',
        ]);
        $link = 'N/A';
        $linkSave = Str::after($link, 'https://youtu.be/');
        
        $userId = Auth::id();
        

        if ($request->hasFile('url')) {
            
            $archivo = $request->file('url');
            $extension = $archivo->getClientOriginalExtension();
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();

            try {
                
                $rutaArchivo = $archivo->storeAs('public/img', $nombreArchivo);

                $multimedia = new Multimedia();
                $multimedia->name = $datosValidados['name'];
                $multimedia->descripcion = $datosValidados['descripcion'];
                $multimedia->url = 'storage/img/' . $nombreArchivo;
                $multimedia->link = $linkSave;
                $multimedia->user_id = $userId;
                $multimedia->status_id = '1';
                $multimedia->category_id = '1';
                $multimedia->save();

                return redirect()->route('home.index')->with('success', 'Archivo creado correctamente.');
            } catch (\Exception $e) {

            
                return back()->withErrors(['error' => $e->getMessage()]);
            }
        }

        return back()->withErrors(['error' => 'Error al subir el archivo.']);
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
    public function edit($id)
    {
        $multimedias = Multimedia::findOrFail($id);

        return view('admin.home.edit', compact('multimedias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'url' => 'nullable|file|mimes:jpg,jpeg,png,mp4', // Ejemplo de validación para archivos
        ]);

        // Busca el multimedia por su ID
        $multimedia = Multimedia::findOrFail($id);

        // Actualiza los campos
        $multimedia->name = $request->name;
        $multimedia->descripcion = $request->descripcion;

        // Manejo de archivo adjunto (si se proporciona uno nuevo)
        if ($request->hasFile('url')) {
            $archivo = $request->file('url');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $rutaArchivo = $archivo->storeAs('public/img', $nombreArchivo);
            $multimedia->url = 'storage/img/' . $nombreArchivo;
    
            if ($multimedia->url) {
                Storage::delete($multimedia->url);
            }
        }

        $multimedia->save();

        return redirect()->route('home.index')->with('success', 'Multimedia actualizado correctamente.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(multimedia $multimedia)
        {
            $multimedia->delete();

            return redirect()->route('multimedia.index')->with('error', 'Multimedia eliminada correctamente.');
        }
}
