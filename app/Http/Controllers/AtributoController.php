<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atributo;
use App\Tipo;
use Illuminate\Support\Arr;

class AtributoController extends Controller
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
        $atributos = Atributo::with('tipo')->orderBy('orden')->get();
        if($tipo_id != 0)
        {
            $atributos = $atributos->where('tipo_id', $tipo_id);
        }
        return view('administracion.atributos.index', compact('atributos', 'tipo_id'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tipo_id)
    {
        //$atributos = Atributo::with('tipo')->get();
        $tipos = Tipo::all();
        $tipos_opcion = collect([
            ['id' => 1, 'nombre' => 'SELECT OPTION'],
            //['id' => 2, 'nombre' => 'CHECK BOX'],
            ['id' => 3, 'nombre' => 'RADIO BUTTON']
        ]);
       
  
        #return $tipos_opcion[0]['nombre'];

        return view('administracion.atributos.create', compact('tipos_opcion', 'tipo_id', 'tipos'));
    }

    public function store(Request $request)
    {
        $image = $request->file('dir_image');
        $nameImage = $image->getClientOriginalName();
        $filename = date("Ymd-His", strtotime(now())).'_'.$nameImage;
        //$image->save(storage_path('app/public/'. $filename));
        $image->storeAs('public', $filename);

        $atributo = new Atributo();
        $atributo->tipo_id = $request->tipo;
        $atributo->nombre = $request->nombre;
        $atributo->ruta_imagen = $filename;
        $atributo->tipo_opcion = $request->tipo_opcion;
        $atributo->meta = str_replace(' ','',$request->meta);
        $atributo->orden = $request->orden;
        return $atributo;
        $atributo->save();

        return redirect()->route('atributo.index', $atributo->tipo_id)->with('info', 'Se creo el tipo satisfactoriamente');
    }

    public function edit($id)
    {
        $atributo = Atributo::findOrFail($id);
        $tipos = Tipo::all();
        $tipos_opcion = collect([
            ['id' => 1, 'nombre' => 'SELECT OPTION'],
            //['id' => 2, 'nombre' => 'CHECK BOX'],
            ['id' => 3, 'nombre' => 'RADIO BUTTON']
        ]);
        return view('administracion.atributos.edit', compact('atributo', 'tipos', 'tipos_opcion'));
    }

    public function update(Request $request, $id)
    {
        $atributo = Atributo::findOrFail($id);
        //$atributo->tipo_id = $request->tipo;
        $atributo->nombre = $request->nombre;
        $atributo->tipo_opcion = $request->tipo_opcion;
        $atributo->meta = str_replace(' ','',$request->meta);
        $atributo->orden = $request->orden;

        if(is_file($request->file('dir_image'))){
            $image = $request->file('dir_image');
            $nameImage = $image->getClientOriginalName();
            $filename = date("Ymd-His", strtotime(now())).'_'.$nameImage;
            $image->storeAs('public', $filename);

            $atributo->ruta_imagen = $filename;
        }

        $atributo->update();

        return redirect()->route('atributo.index', $atributo->tipo_id)->with('info', 'Se creo el tipo satisfactoriamente');
    }

    public function destroy($id)
    {
        
        $atributo = Atributo::findOrFail($id);
        $tipo_id = $atributo->tipo_id;
        $atributo->delete();
        return redirect()->route('atributo.index', $tipo_id)->with('info', 'Se creo el tipo satisfactoriamente');
    }


    /*public function index()
    {
        $atributos = Atributo::with('tipo')->get();
        return $atributos;
    }

    public function allByTipo($idTipo)
    {
        $atributos = Atributo::with('tipo')->get();
        if($idTipo != 0)
        {
            $atributos = $atributos->where('tipo_id', $idTipo);
        }

        return $atributos;
    }

    public function _index()
    {
        $AtributoController = new AtributoController();
        $atributos=$AtributoController->index();
        //$atributos = Atributo::all();
        return view('administracion.atributos.index', compact('atributos'));
    }

    public function store(Request $request)
    {
        try{      
            $atributo = new Atributo();
            $atributo->tipo_id = $request->tipo_id;
            $atributo->nombre = $request->nombre;
            $atributo->ruta_imagen = $request->ruta_imagen;
            $atributo->tipo = $request->tipo;
            $atributo->meta = $request->meta;
            $atributo->orden = $request->orden;
            $atributo->save();

            return response()->json(['message' => 'Generado Satisfactorimente'], 200);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function show($id)
    {
        try{      
            $atributo = Atributo::findOrFail($id);
            return $atributo;
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try{      
            $atributo = Atributo::findOrFail($id);
            $atributo->tipo_id = $request->tipo_id;
            $atributo->nombre = $request->nombre;
            $atributo->ruta_imagen = $request->ruta_imagen;
            $atributo->tipo = $request->tipo;
            $atributo->meta = $request->meta;
            $atributo->orden = $request->orden;
            $atributo->update();

            return response()->json(['message' => 'Modificado Satisfactorimente']);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try{     
            $atributo = Atributo::findOrFail($id);
            $atributo->delete();
            return response()->json(['message' => 'Eliminado Satisfactorimente']);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }*/
}
