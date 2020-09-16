<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;
use App\InmuebleFotos;
use App\Operacion;
use App\Tipo;
use App\ServicioInmueble;
use App\AtributoInmueble;
use App\Persona;
use App\Usuario;

use App\UbicacionDistrito;
use App\Atributo;
use App\Servicio;
use Auth;


class WebController extends Controller
{
    public function index(){
        //$inmuebles = Inmueble::join('inmueble_fotos', 'inmueble.id', '=', 'inmueble_fotos.inmueble_id')->where('inmueble_fotos.es_destacado', true)->get();
        $inmuebles = Inmueble::with(['fotos' => function($query) {
            $query->where('es_destacado', true);
        }])->where('estado', 'PUBLICADO')->orderBy('fecha_publicacion', 'desc')->take(3)->get();

        $operaciones = Operacion::all();
        $tipos = Tipo::all();
        $cantidad = 3;

        return view('general.index', compact('inmuebles', 'operaciones', 'tipos', 'cantidad'));
    }

    public function more(Request $request){
        //return $request['cantidad'];
        //$inmuebles = Inmueble::join('inmueble_fotos', 'inmueble.id', '=', 'inmueble_fotos.inmueble_id')->where('inmueble_fotos.es_destacado', true)->get();
        $cantidad = $request['cantidad']+3;
        $inmuebles = Inmueble::with(['fotos' => function($query) {
            $query->where('es_destacado', true);
        }])->where('estado', 'PUBLICADO')->orderBy('fecha_publicacion', 'desc')->take($cantidad)->get();

        $operaciones = Operacion::all();
        $tipos = Tipo::all();
        return view('general.index', compact('inmuebles', 'operaciones', 'tipos', 'cantidad'));
    }

    public function busqueda(Request $request){
        //return $request;
        //return Inmueble::where('titulo', 'LIKE', "'%PROBANDO%'")->get();
        //return Inmueble::whereRaw('titulo LIKE \'%'.$request->busqueda.'%\'')->get();
        
        $inmuebles = Inmueble::with('fotos')->with('distrito')->with('provincia')->where('estado', 'PUBLICADO')->orderBy('fecha_publicacion', 'desc')->get();

        if(!is_null($request->busqueda))
        {
            $inmuebles = Inmueble::whereRaw('titulo LIKE \'%'.$request->busqueda.'%\'')->with('fotos')->with('distrito')->with('provincia')->orderBy('fecha_publicacion', 'desc')->get();
        }
        
        if(is_numeric($request->operacion)){
            $inmuebles = $inmuebles->where('operacion_id',$request->operacion);    
        }

        if(is_numeric($request->tipo)){
            $inmuebles = $inmuebles->where('tipo_id',$request->tipo);
        }

        /*if(!is_null($request->busqueda))
        {
            //$inmuebles = $inmuebles->where('titulo', 'LIKE','%'.$request->busqueda.'%');
            //$inmuebles = $inmuebles->query()->orWhere('titulo', 'LIKE', '%'.$request->busqueda.'%')->get();
            $inmuebles = $inmuebles->whereRaw('titulo LIKE \'%'.$request->busqueda.'%\'')->get();
        }*/

        //return $inmuebles;

        $operaciones = Operacion::all();
        $tipos = Tipo::all();
        return view('general.busqueda', compact('inmuebles', 'operaciones', 'tipos'));
    }

    public function inmueble($slug_page){
      
        $inmueble = Inmueble::where('slug',$slug_page)->with('fotos')->get()[0];
        $tipos = Tipo::all();
        $inmueble_servicios = ServicioInmueble::with('servicio')->where('inmueble_id', $inmueble->id)->get();
        $inmueble_atributos = AtributoInmueble::with('atributo')->where('inmueble_id', $inmueble->id)->get();
        
        //return $inmueble_atributos;

        return view('general.inmueble', compact('inmueble', 'tipos', 'inmueble_servicios', 'inmueble_atributos'));
    }

    public function registro()
    {
        $tipos = Tipo::all();
        return view('general.registro', compact('tipos'));
    }

    public function registroStore(Request $request)
    {
        $persona = new Persona();
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->dni = $request->dni;
        $persona->correo = $request->email;
        $persona->telefono = $request->celular;
        //$persona->info_busqueda = $request->nombres." ".$request->apellidos." ".$request->celular;
        $persona->save();

        //return explode(" ",$request->nombres)[0];

        $usuario = new Usuario();
        $usuario->persona_id = $persona->id;
        //$usuario->nombre = $request->nombre_usuario;
        $usuario->nombre = explode(" ",$request->nombres)[0];
        $usuario->email = $persona->correo;
        $usuario->rol = 'USER';
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        return redirect()->route('login')->with('info', 'Se creo el usuario satisfactoriamente');
    }

    public function publicaSeleccionar(){

        if(Auth::check())
        {
            $tipos = Tipo::all();
            return view('general.seleccionar_tipo', compact('tipos'));
        }
        {
            return redirect()->route('login');
        }
        
    }

    public function publicaEdit($id)
    {
        $inmueble = Inmueble::findOrFail($id);
        $tipos = Tipo::all();
        $operaciones = Operacion::all();
        $ubicaciones = UbicacionDistrito::all();
        $monedas = collect([
            ['id' => 'PEN', 'nombre' => 'SOLES'],
            ['id' => 'USD', 'nombre' => 'DOLARES'],
        ]);

        $atributos = Atributo::where('tipo_id', $inmueble->tipo_id)->get();
        $servicios = Servicio::where('tipo_id', $inmueble->tipo_id)->get();

        $inmueble_atributos = AtributoInmueble::where('inmueble_id', $id)->get();
        $inmueble_servicios = ServicioInmueble::where('inmueble_id', $id)->get();

        //return $inmueble_atributos;
        //return sizeof($inmueble_atributos->where('atributo_id',5));
        
        foreach($atributos as $atrib)
        {
            if(sizeof($inmueble_atributos->where('atributo_id',$atrib->id))>0)
            {
                $atrib->inmueble_value = $inmueble_atributos->where('atributo_id',$atrib->id)->first()->valor;
                //$atrib->inmueble_value = $inmueble_atributos->where('atributo_id',$atrib->id)[0]->valor;                                              
            }
            else{
                $atrib->inmueble_value = null;
            }
        }
        
        foreach($servicios as $serv)
        {
            if(sizeof($inmueble_servicios->where('servicio_id',$serv->id))>0)
            {
                $serv->inmueble_value = $inmueble_servicios->where('servicio_id',$serv->id)->first()->valor;
                //$atrib->inmueble_value = $inmueble_atributos->where('atributo_id',$atrib->id)[0]->valor;                                              
            }
            else{
                $serv->inmueble_value = null;
            }
        }        

        return view('general.editarInmueble', compact('inmueble', 'tipos', 'operaciones', 'ubicaciones', 'monedas', 'atributos', 'servicios', 'inmueble_atributos', 'inmueble_servicios'));
    }

    
    public function publicaCreate(Request $request)
    {
        //return $request;
        $tipo = $request->tipo;

        $tipos = Tipo::all();
        $operaciones = Operacion::all();
        $ubicaciones = UbicacionDistrito::all();

        $monedas = collect([
            ['id' => 'PEN', 'nombre' => 'SOLES'],
            ['id' => 'USD', 'nombre' => 'DOLARES'],
        ]);

        $atributos = Atributo::where('tipo_id', $tipo)->get();
        $servicios = Servicio::where('tipo_id', $tipo)->get();

        //return explode(",",$atributos[0]->meta);

        return view('general.registrarInmueble', compact('tipo','tipos', 'operaciones', 'ubicaciones', 'monedas', 'atributos', 'servicios'));
    }

    public function publicaStore(Request $request)
    {
        //return $request;
        $atributos = Atributo::where('tipo_id', $request->tipo)->get();
        $servicios = Servicio::where('tipo_id', $request->tipo)->get();        

        $inmueble = new Inmueble();
        $inmueble->tipo_id = $request->tipo;
        //$inmueble->area = $request->area;
        $inmueble->operacion_id = $request->operacion;
        $inmueble->moneda = $request->moneda;
        $inmueble->titulo = $request->titulo;
        $inmueble->usuario_creacion_id = auth()->user()->id;
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
        $inmueble->estado = "NO PUBLICADO";

        $inmueble->save();

        $inmueble->slug = $inmueble->slug."-".$inmueble->id;
        $inmueble->update();

        foreach($request->file('dir_images') as $image)
        {
            $nameImage = $image->getClientOriginalName();
            $filename = date("Ymd-His", strtotime(now())).'_'.$nameImage;
            $image->storeAs('public', $filename);

            $inmueble_fotos = new InmuebleFotos();
            $inmueble_fotos->inmueble_id = $inmueble->id;
            $inmueble_fotos->url_imagen = 'storage/'.$filename;
            $inmueble_fotos->orden = 1;
            $inmueble_fotos->es_destacado = true;
            $inmueble_fotos->save();
        }

        foreach($atributos as $atrib)
        {
            if($request->{'atributo_'.$atrib->id} != null)
            {
                $atributoInmueble = new AtributoInmueble();                             
                $atributoInmueble->atributo_id = $atrib->id;
                $atributoInmueble->inmueble_id = $inmueble->id;
                $atributoInmueble->valor = $request->{'atributo_'.$atrib->id};
                $atributoInmueble->save(); 
            }       
            //array_push($arr_servicios, $request->{'atributo_'.$atrib->id});
        }

        foreach($servicios as $serv)
        {
            if($request->{'servicio_'.$serv->id} != null)
            {
                $servicioInmueble = new ServicioInmueble();
                $servicioInmueble->servicio_id = $serv->id;
                $servicioInmueble->inmueble_id = $inmueble->id;
                $servicioInmueble->valor = $request->{'servicio_'.$serv->id};
                $servicioInmueble->save(); 
            }
            //array_push($arr_servicios, $request->{'servicio_'.$serv->id});
        }
        
        return redirect()->route('mispublicaciones')->with('info', 'Se creo el tipo satisfactoriamente');
 
    }

    public function publicaUpdate(Request $request, $id)
    {
        //return $request;

        $inmueble = Inmueble::findOrFail($id);
        $inmueble->operacion_id = $request->operacion;
        $inmueble->moneda = $request->moneda;
        $inmueble->titulo = $request->titulo;
        $inmueble->descripcion = $request->descripcion;
        $inmueble->direccion = $request->direccion;
        //$inmueble->area = $request->area;
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

        $atributos = Atributo::where('tipo_id', $inmueble->tipo_id)->get();
        $servicios = Servicio::where('tipo_id', $inmueble->tipo_id)->get();

        //return $request;
        foreach($atributos as $atrib)
        {
            if($request->{'atributo_'.$atrib->id} != null)
            {
                //UPDATE
                $query = AtributoInmueble::where('atributo_id', $atrib->id)->where('inmueble_id', $inmueble->id)->get();
                //return $query;
                if(sizeof($query) > 0)
                {
                    $atributoInmueble = AtributoInmueble::where('atributo_id', $atrib->id)->where('inmueble_id', $inmueble->id)->first();
                    $atributoInmueble->valor = $request->{'atributo_'.$atrib->id};
                    $atributoInmueble->update();
                }
                else{//CREATE
                    //return $request->{'atributo_'.$atrib->id};
                    $atributoInmueble = new AtributoInmueble();                             
                    $atributoInmueble->atributo_id = $atrib->id;
                    $atributoInmueble->inmueble_id = $inmueble->id;
                    $atributoInmueble->valor = $request->{'atributo_'.$atrib->id};
                    $atributoInmueble->save(); 
                }
            }       
            //array_push($arr_servicios, $request->{'atributo_'.$atrib->id});
        }

        foreach($servicios as $serv)
        {
            if($request->{'servicio_'.$serv->id} != null)
            {
                $query = ServicioInmueble::where('servicio_id', $atrib->id)->where('inmueble_id', $inmueble->id)->get();
                if(sizeof($query) > 0)
                {
                    $servicioInmueble = ServicioInmueble::where('servicio_id', $atrib->id)->where('inmueble_id', $inmueble->id)->first();
                    $servicioInmueble->valor = $request->{'servicio_'.$serv->id};
                    $servicioInmueble->update();
                }
                else{
                    $servicioInmueble = new ServicioInmueble();
                    $servicioInmueble->servicio_id = $serv->id;
                    $servicioInmueble->inmueble_id = $inmueble->id;
                    $servicioInmueble->valor = $request->{'servicio_'.$serv->id};
                    $servicioInmueble->save(); 
                }
                
            }
            //array_push($arr_servicios, $request->{'servicio_'.$serv->id});
        }

        return redirect()->route('mispublicaciones')->with('info', 'Se creo el tipo satisfactoriamente');
 
    }
}
