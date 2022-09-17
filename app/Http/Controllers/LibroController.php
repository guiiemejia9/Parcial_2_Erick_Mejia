<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Libro;


class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {


        $libros = Libro::orderBy('id')->paginate(5);

        return [
            'pagination' => [
                'total'         => $libros->total(),
                'current_page'  => $libros->currentPage(),
                'per_page'      => $libros->perPage(),
                'last_page'     => $libros->lastPage(),
                'from'          => $libros->firstItem(),
                'to'            => $libros->lastPage(),
            ],
            'libros' => $libros
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'fecha' => 'required',
            'nombre_autor' => 'required',
            'serie' => 'required',
        ]);

        Libro::create($request->all());

        return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'fecha' => 'required',
            'nombre_autor' => 'required',
            'serie' => 'required',
        ]);

        Libro::find($id)->update($request->all());

        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();
    }
}
