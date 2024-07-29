<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videogame;
use App\Models\Category;

class videojuegoController extends Controller
{
    public function index()
    {
        $videogames = Videogame::with('category')->paginate(5);
        return view('videojuegos.index', compact('videogames'));
    }

    /**
     * Muestra el formulario para crear un nuevo videojuego.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('videojuegos.crear', compact('categories'));
    }

    /**
     * Almacena un nuevo videojuego en el almacenamiento.
     * Realiza validación de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required|unique:videogames,name',
            'category_id' => 'required|exists:categories,id',
            'active' => 'boolean',
        ]);

        // Crear un nuevo videojuego
        Videogame::create($request->all());

        // Redirigir a la vista index
        return redirect()->route('videojuegos.index');
    }

    /**
     * Muestra el recurso videojuego especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $videogame = Videogame::with('category')->findOrFail($id);
        return view('videojuegos.show', compact('videogame'));
    }

    /**
     * Muestra el formulario para editar el videojuego especificado.
     *
     * @param  \App\Models\Videogame  $videogame
     * @return \Illuminate\Http\Response
     */
    public function edit(Videogame $videojuego)
    {
        $categories = Category::all();
        return view('videojuegos.editar', compact('videojuego', 'categories'));
    }

    /**
     * Actualiza el videojuego especificado en el almacenamiento.
     * Realiza validación de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Videogame  $videogame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Videogame $videojuego)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required|unique:videogames,name,' . $videojuego->id,
            'category_id' => 'required|exists:categories,id',
            'active' => 'boolean',
        ]);

        // Actualizar el videojuego
        $videojuego->update($request->all());

        // Redirigir a la vista index
        return redirect()->route('videojuegos.index');
    }

    /**
     * Elimina el videojuego especificado del almacenamiento.
     *
     * @param  \App\Models\Videogame  $videogame
     * @return \Illuminate\Http\Response
     */
    public function destroy(Videogame $videojuego)
    {
        // Eliminar el videojuego
        $videojuego->delete();

        // Redirigir a la vista index
        return redirect()->route('videojuegos.index');
    }
}
