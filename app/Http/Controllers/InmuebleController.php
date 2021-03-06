<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;
use App\InmuebleFotos;
use App\Tipo;
use App\Operacion;
use App\UbicacionDistrito;
use App\Atributo;
use App\Servicio;
use APp\Usuario;
use App\AtributoInmueble;
use App\ServicioInmueble;
use App\Mail\MensajePublicado;
use Illuminate\Support\Facades\Mail;

class InmuebleController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inmuebles = Inmueble::with('operacion')->with('tipo')->orderBy('fecha_publicacion', 'desc')->paginate(10);
        return view('admin_inmuebles.inmuebles.index', compact('inmuebles'));
    }

    public function seleccionar_tipo(){
        $tipos = Tipo::all();
        return view('admin_inmuebles.inmuebles.seleccionar_tipo', compact('tipos'));
    }

    public function create(Request $request)
    {
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

        return view('admin_inmuebles.inmuebles.create', compact('tipo','tipos', 'operaciones', 'ubicaciones', 'monedas', 'atributos', 'servicios'));
    }

    
    public function store(Request $request)
    {
        //return $request;
        $atributos = Atributo::where('tipo_id', $request->tipo)->get();
        $servicios = Servicio::where('tipo_id', $request->tipo)->get();

        /*$arr_servicios = array();
        return $request;
        foreach($servicios as $serv)
        {
            if($request->{'servicio_'.$serv->id} != null)
                array_push($arr_servicios, $request->{'servicio_'.$serv->id});
        }

        return $arr_servicios;
        return 0;*/

        //return $request;
        

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
        //$inmueble->fecha_vencimiento = date("Y-m-d H:m:s", strtotime($request->fecha_publicacion."+ ".$request->publicacion." days"));
        $inmueble->fecha_vencimiento = date("Y-m-d H:m:s", strtotime($request->fecha_publicacion."+ 30 days"));
        $inmueble->precio = $request->precio;

        $ubicacion = UbicacionDistrito::where('info_busqueda', $request->ubicacion)->get()->first();
        //$ubicacion = UbicacionDistrito::findOrfail($request->ubicacion);
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
        /*$image = $request->file('dir_image');
        $nameImage = $image->getClientOriginalName();
        $filename = date("Ymd-His", strtotime(now())).'_'.$nameImage;
        $image->storeAs('public', $filename);

        $inmueble_fotos = new InmuebleFotos();
        $inmueble_fotos->inmueble_id = $inmueble->id;
        $inmueble_fotos->url_imagen = 'storage/'.$filename;
        $inmueble_fotos->orden = 1;
        $inmueble_fotos->es_destacado = true;
        $inmueble_fotos->save();*/

        foreach($request->file('dir_images') as $image)
        {
            $nameImage = $image->getClientOriginalName();
            $name = "";
            for($i = 0; $i<strlen($nameImage); $i++)
            {
                $vocal = ord(substr($nameImage, $i, 1));
                if(!(($vocal >= 97 && $vocal<= 122)||($vocal >= 65 && $vocal <= 90) ||($vocal >= 48 && $vocal <= 57) || $vocal == 46))
                    $name .= '-';
                else
                    $name .= substr($nameImage, $i, 1);
            }

            $filename = date("Ymd-His", strtotime(now())).'_'.$name;
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
        
        return redirect()->route('inmueble.index')->with('success', 'Se creo el inmueble satisfactoriamente');
 
    }

    public function edit($id)
    {
        //$inmueble = Inmueble::findOrFail($id)->with('distrito')->get();
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

        return view('admin_inmuebles.inmuebles.edit', compact('inmueble', 'tipos', 'operaciones', 'ubicaciones', 'monedas', 'atributos', 'servicios', 'inmueble_atributos', 'inmueble_servicios'));
    }

    public function update(Request $request, $id)
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

        $ubicacion = UbicacionDistrito::where('info_busqueda', $request->ubicacion)->get()->first();
        //$ubicacion = UbicacionDistrito::findOrfail($request->ubicacion);
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

        return redirect()->route('inmueble.index')->with('success', 'Se modifico el inmueble satisfactoriamente');
 
    }

    public function destroy($id)
    {
        $inmueble = Inmueble::findOrFail($id);
        $inmueble->delete();
        return redirect()->route('inmueble.index')->with('success', 'Se elimino el inmueble satisfactoriamente');
    }

    public function publicar($id)
    {
        $inmueble = Inmueble::findOrFail($id);
        $inmueble->estado = "PUBLICADO";
        $inmueble->update();
        $usuario = Usuario::findOrfail($inmueble->usuario_creacion_id);

        $details = [

            'url' => 'https://www.vivelaovendela.com.pe/inmueble/'.$inmueble->slug,
            'titulo' => $inmueble->titulo
        ];
        Mail::to($usuario->email)->send(new MensajePublicado($details));

        return redirect()->route('inmueble.index')->with('success', 'Se publico el inmueble satisfactoriamente');
    }

    public function despublicar($id)
    {
        $inmueble = Inmueble::findOrFail($id);
        $inmueble->estado = "INACTIVO";
        $inmueble->update();
        return redirect()->route('inmueble.index')->with('success', 'Se cambio el estado a inactivo satisfactoriamente');
    }

    public function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            /*$data = DB::table('ubi_distritos')
                ->where('info_busqueda', 'LIKE', "%{$query}%")
                ->get();*/

            $data = UbicacionDistrito::whereRaw('info_busqueda LIKE \'%'.$query.'%\'')->get();

            $output = '<ul class="dropdown-menu" style="display:block; position:relative;">';
            foreach($data as $row)
            {
            $output .= '
            <li><a href="#" style="color: black;">'.$row->info_busqueda.'</a></li>
            ';
            }
            $output .= '</ul>';

            echo $output;
            //echo $request->get('query');
        }
        /*if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('ubi_distritos')
                ->where('info_busqueda', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
            $output .= '
            <li><a href="#">'.$row->info_busqueda.'</a></li>
            ';
            }
            $output .= '</ul>';
            echo $output;
        }*/
    }
}
