<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Requests\ProductoRequest;

class ProductoController extends Controller
{

    public function index()
    {
        if (auth()->check() && auth()->user()->hasRole('vendedor')) {
            $productos = Producto::where('vendedor_id', auth()->user()->id)
                ->latest()
                ->get();
            return view('panel.vendedor.lista_productos.index', compact('productos'));
        } else {
            return view('acceso_denegado'); // Muestra la vista de acceso denegado
        }
    }



    public function create(){

        // Creamos un Producto nuevo para cargarle datos
        $producto = new Producto();

        // Recuperamos todas las categorias de la BD
        $categorias = Categoria::all(); //Recordar importar el modelo Categoria!!

        // Retornamos la vista de creacion de productos, enviamos el producto y las categorias
        return view('panel.vendedor.lista_productos.create', compact('producto', 'categorias'));

    }


    public function store(ProductoRequest $request){

        $producto = new Producto();

        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->categoria_id = $request->get('categoria_id');
        $producto->vendedor_id = auth()->user()->id;
        
        if ($request->hasFile('imagen')) {
            //subida de imagen al servidor (public > storage)
            $imagen_url = $request->file('imagen')->store('public/producto');
            $producto->imagen = asset(str_replace('public', 'storage', $imagen_url));
        } else {
            $producto->imagen = "";
        }

        // Almacena la info del producto en la BD
        $producto->save();
        
        return redirect()
                ->route('producto.index')
                ->with('alert', 'Producto "' . $producto->nombre . '" agregado exitosamente.');

    }


    public function show(Producto $producto){
        return view('panel.vendedor.lista_productos.show', compact('producto'));
    }


    public function edit(Producto $producto){
        $categorias = Categoria::all();
        return view('panel.vendedor.lista_productos.edit', compact('producto', 'categorias'));
    }


    public function update(ProductoRequest $request, Producto $producto){
        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->categoria_id = $request->get('categoria_id');

        if ($request->hasFile('imagen')) {
            // Subida de la imagen nueva al servidor
            $imagen_url = $request->file('imagen')->store('public/producto');
            $producto->imagen = asset(str_replace('public', 'storage', $imagen_url));
        }

        // Actualiza la info del producto en la BD
        $producto->update();

        return redirect()
                ->route('producto.index')
                ->with('alert', 'Producto "' . $producto->nombre. '" actualizado exitosamente crack.');
    }


    public function destroy(Producto $producto){
        $producto->delete();

        return redirect()
                ->route('producto.index')
                ->with('alert', 'Producto eliminado exitosamente crack.');
    }
}
