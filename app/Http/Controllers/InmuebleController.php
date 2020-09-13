<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;
use App\InmuebleFotos;
use App\Tipo;
use App\Operacion;
use App\UbicacionDistrito;

class InmuebleController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inmuebles = Inmueble::with('operacion')->with('tipo')->orderBy('fecha_publicacion', 'desc')->get();
        return view('admin_inmuebles.inmuebles.index', compact('inmuebles'));
    }

    public function create()
    {
        $tipos = Tipo::all();
        $operaciones = Operacion::all();
        $ubicaciones = UbicacionDistrito::all();

        $monedas = collect([
            ['id' => 'PEN', 'nombre' => 'SOLES'],
            ['id' => 'USD', 'nombre' => 'DOLARES'],
        ]);

        return view('admin_inmuebles.inmuebles.create', compact('tipos', 'operaciones', 'ubicaciones', 'monedas'));
    }

    
    public function store(Request $request)
    {
        
        //return $request;

        $inmueble = new Inmueble();
        $inmueble->tipo_id = $request->tipo;
        $inmueble->operacion_id = $request->operacion;
        $inmueble->moneda = $request->moneda;
        $inmueble->titulo = $request->titulo;
        $inmueble->descripcion = $request->descripcion;
        $inmueble->direccion = $request->direccion;
        $inmueble->fecha_publicacion = now();
        $inmueble->fecha_vencimiento = date("Y-m-d H:m:s", strtotime($request->fecha_publicacion."+ ".$request->publicacion." days"));
        $inmueble->precio = $request->precio;

        $ubicacion = UbicacionDistrito::findOrfail($request->ubicacion);
        $inmueble->ubigeo_distrito_id = $ubicacion->id;
        $inmueble->ubigeo_provincia_id = $ubicacion->provincia_id;
        $inmueble->ubigeo_region_id = $ubicacion->region_id;
        
        $slug = strtr(strtolower($inmueble->titulo), " ", "-");
        $inmueble->slug = $slug;
        $inmueble->mapa_latitud = $request->mapa_latitud;
        $inmueble->mapa_longitud = $request->mapa_longitud;
        $inmueble->mapa_zoom = $request->mapa_zoom;
        $inmueble->estado = "PUBLICADO";

        $inmueble->save();

        $inmueble->slug = $inmueble->slug."-".$inmueble->id;
        $inmueble->update();

        /*Images*/
        $image = $request->file('dir_image');
        $nameImage = $image->getClientOriginalName();
        $filename = date("Ymd-His", strtotime(now())).'_'.$nameImage;
        //$image->save(storage_path('app/public/'. $filename));
        $image->storeAs('public', $filename);

        $inmueble_fotos = new InmuebleFotos();
        $inmueble_fotos->inmueble_id = $inmueble->id;
        $inmueble_fotos->url_imagen = 'storage/'.$filename;
        $inmueble_fotos->orden = 1;
        $inmueble_fotos->es_destacado = true;
        $inmueble_fotos->save();
        
        return redirect()->route('inmueble.index')->with('info', 'Se creo el tipo satisfactoriamente');
 
    }

    public function edit($id)
    {
        $inmueble = Inmueble::findOrFail($id);
        $tipos = Tipo::all();
        $operaciones = Operacion::all();
        $ubicaciones = UbicacionDistrito::all();
        $monedas = collect([
            ['id' => 'PEN', 'nombre' => 'SOLES'],
            ['id' => 'USD', 'nombre' => 'DOLARES'],
        ]);

        return view('admin_inmuebles.inmuebles.edit', compact('inmueble', 'tipos', 'operaciones', 'ubicaciones', 'monedas'));
    }

    public function update(Request $request, $id)
    {
        //return $request;

        $inmueble = Inmueble::findOrFail($id);
        $inmueble->tipo_id = $request->tipo;
        $inmueble->operacion_id = $request->operacion;
        $inmueble->moneda = $request->moneda;
        $inmueble->titulo = $request->titulo;
        $inmueble->descripcion = $request->descripcion;
        $inmueble->direccion = $request->direccion;
        //$inmueble->fecha_vencimiento = date("Y-m-d H:m:s", strtotime($request->fecha_publicacion."+ ".$request->publicacion." days"));
        $inmueble->precio = $request->precio;

        $ubicacion = UbicacionDistrito::findOrfail($request->ubicacion);
        $inmueble->ubigeo_distrito_id = $ubicacion->id;
        $inmueble->ubigeo_provincia_id = $ubicacion->provincia_id;
        $inmueble->ubigeo_region_id = $ubicacion->region_id;
        
        $inmueble->mapa_latitud = $request->mapa_latitud;
        $inmueble->mapa_longitud = $request->mapa_longitud;
        $inmueble->mapa_zoom = $request->mapa_zoom;
        $inmueble->estado = "PUBLICADO";

        $inmueble->update();

        return redirect()->route('inmueble.index')->with('info', 'Se actuali el inmueble el satisfactoriamente');
 
    }

    public function destroy($id)
    {
        $inmueble = Inmueble::findOrFail($id);
        $inmueble->delete();
        return redirect()->route('inmueble.index')->with('info', 'Se elimino el inmueble satisfactoriamente');
    }

    /*public function index()
    {
        $inmuebles = Inmueble::with('operacion')->with('tipo')->get();
        return $inmuebles;
    }

    public function store(Request $request)
    {
        try{
            $inmueble = new Inmueble();
            $inmueble->tipo_id = $request->tipo_id;
            $inmueble->operacion_id = $request->operacion_id;
            //Usuario Creacion es del usuario logueado
            $inmueble->ubigeo_provincia_id = $request->ubigeo_provincia_id;
            $inmueble->ubigeo_distrito_id = $request->ubigeo_distrito_id;
            $inmueble->ubigeo_region_id = $request->ubigeo_region_id;
            $inmueble->moneda = $request->moneda;
            $inmueble->titulo = $request->titulo;
            $inmueble->slug = $request->slug;
            $inmueble->descripcion = $request->descripcion;
            $inmueble->mapa_lalitud = $request->mapa_latitud;
            $inmueble->mapa_longitud = $request->mapa_longitud;
            $inmueble->mapa_zoom = $request->mapa_zoom;
            $inmueble->fecha_publicacion = now();
            $inmueble->fecha_vencimiento = $request->fecha_vencimiento;
            $inmueble->estado = $request->estado;
            $inmueble->save();

            //return $persona;
            return response()->json(['message' => 'Generado Satisfactorimente']);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try{            
            $inmueble = Inmueble::findOrFail($id);
            return $inmueble;
        }
        catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => 'No se ha encontrado el elemento solicitado']);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $inmueble = Inmueble::findOrFail($id);
            $inmueble->tipo_id = $request->tipo_id;
            $inmueble->operacion_id = $request->operacion_id;
            //Usuario Creacion es del usuario logueado
            $inmueble->ubigeo_provincia_id = $request->ubigeo_provincia_id;
            $inmueble->ubigeo_distrito_id = $request->ubigeo_distrito_id;
            $inmueble->ubigeo_region_id = $request->ubigeo_region_id;
            $inmueble->moneda = $request->moneda;
            $inmueble->titulo = $request->titulo;
            $inmueble->slug = $request->slug;
            $inmueble->descripcion = $request->moneda;
            $inmueble->mapa_latitud = $request->moneda;
            $inmueble->mapa_longitud = $request->moneda;
            $inmueble->mapa_zoom = $request->moneda;
            $inmueble->fecha_publicacion = now();
            $inmueble->fecha_vencimiento = $request->fecha_vencimiento;
            $inmueble->estado = $request->estado;
            $inmueble->update();

            //return $persona;
            return response()->json(['message' => 'Modificado Satisfactorimente']);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        //
    }

    public function _index()
    {
        $inmuebles = InmuebleFotos::with('inmueble')->get();
    }*/
}
