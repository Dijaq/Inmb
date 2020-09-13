<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;
use App\Tipo;

class ServicioController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tipo_id)
    {      
        $servicios = Servicio::with('tipo')->orderBy('orden')->get();
        if($tipo_id != 0)
        {
            $servicios = $servicios->where('tipo_id', $tipo_id);
        }

        return view('administracion.servicios.index', compact('servicios', 'tipo_id'));
    }

    public function create($tipo_id)
    {
        //$atributos = Atributo::with('tipo')->get();
        $tipos = Tipo::all();
        $tipos_opcion = collect([
            ['id' => 1, 'nombre' => 'SELECT OPTION'],
            ['id' => 2, 'nombre' => 'CHECK BOX'],
            ['id' => 3, 'nombre' => 'RADIO BUTTON']
        ]);
   
        return view('administracion.servicios.create', compact('tipos_opcion', 'tipos', 'tipo_id'));
    }

    public function store(Request $request)
    {
        $image = $request->file('dir_image');
        $nameImage = $image->getClientOriginalName();
        $filename = date("Ymd-His", strtotime(now())).'_'.$nameImage;
        //$image->save(storage_path('app/public/'. $filename));
        $image->storeAs('public', $filename);

        $servicio = new Servicio();
        $servicio->tipo_id = $request->tipo;
        $servicio->nombre = $request->nombre;
        $servicio->ruta_imagen = $filename;
        $servicio->tipo_opcion = $request->tipo_opcion;
        $servicio->meta = $request->meta;
        $servicio->orden = $request->orden;
        $servicio->save();

        return redirect()->route('servicio.index', $servicio->tipo_id)->with('info', 'Se creo el tipo satisfactoriamente');
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        $tipos = Tipo::all();
        $tipos_opcion = collect([
            ['id' => 1, 'nombre' => 'SELECT OPTION'],
            ['id' => 2, 'nombre' => 'CHECK BOX'],
            ['id' => 3, 'nombre' => 'RADIO BUTTON']
        ]);
        return view('administracion.servicios.edit', compact('servicio', 'tipos', 'tipos_opcion'));
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicio::findOrFail($id);
        //$servicio->tipo_id = $request->tipo;
        $servicio->nombre = $request->nombre;
        $servicio->tipo_opcion = $request->tipo_opcion;
        $servicio->meta = $request->meta;
        $servicio->orden = $request->orden;

        if(is_file($request->file('dir_image'))){
            $image = $request->file('dir_image');
            $nameImage = $image->getClientOriginalName();
            $filename = date("Ymd-His", strtotime(now())).'_'.$nameImage;
            $image->storeAs('public', $filename);

            $servicio->ruta_imagen = $filename;
        }

        $servicio->update();

        return redirect()->route('servicio.index', $servicio->tipo_id)->with('info', 'Se creo el tipo satisfactoriamente');
    }

    public function destroy($id)
    {
        
        $servicio = Servicio::findOrFail($id);
        $tipo_id = $servicio->tipo_id;
        $servicio->delete();
        return redirect()->route('servicio.index', $tipo_id)->with('info', 'Se creo el tipo satisfactoriamente');
    }

 /* 
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try{      
            $servicio = new Servicio();
            $servicio->tipo_id = $request->tipo_id;
            $servicio->nombre = $request->nombre;
            $servicio->ruta_imagen = $request->ruta_imagen;
            $servicio->tipo = $request->tipo;
            $servicio->meta = $request->meta;
            $servicio->orden = $request->orden;
            $servicio->save();

            return response()->json(['message' => 'Generado Satisfactorimente']);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try{            
            $servicio = Servicio::findOrFail($id);
            return $servicio;
        }
        catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => 'No se ha encontrado el elemento solicitado']);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try{      
            $servicio = Servicio::findOrFail($id);
            $servicio->tipo_id = $request->tipo_id;
            $servicio->nombre = $request->nombre;
            $servicio->ruta_imagen = $request->ruta_imagen;
            $servicio->tipo = $request->tipo;
            $servicio->meta = $request->meta;
            $servicio->orden = $request->orden;
            $servicio->update();

            return response()->json(['message' => 'Modificado Satisfactorimente']);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try{     
            $servicio = Servicio::findOrFail($id);
            $servicio->delete();
            return response()->json(['message' => 'Eliminado Satisfactorimente']);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }*/
}
