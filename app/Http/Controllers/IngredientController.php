<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientRequest;
use App\Ingredient;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request){
        $ingredients = Ingredient::orderby('id','DESC')
                        ->paginate(5);
        //dd($ingredients);
        return [
            'pagination' => [
                'total'         => $ingredients->total(),
                'current_page'  => $ingredients->currentPage(),
                'per_page'      => $ingredients->perPage(),
                'last_page'     => $ingredients->lastPage(),
                'from'          => $ingredients->firstItem(),
                'to'            => $ingredients->lastItem(),
            ],
            'ingredients' => $ingredients,
        ];
    }
    public function index()
    {
        return view('ingredients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngredientRequest $request)
    {
        //Cloudinary
        \Cloudinary::config(array(
            "cloud_name" => getenv('CLOUDINARY_CLOUD_NAME'),
            "api_key" => getenv('CLOUDINARY_API_KEY'),
            "api_secret" => getenv('CLOUDINARY_API_SECRET')
        ));

        $file_img = \Cloudinary\Uploader::upload($request->file,  ["width" =>265, "height"=>165]);
        $ingredient = new Ingredient;
        $ingredient->name_ingredient = $request->name_ingredient;
        $ingredient->price = $request->price;
        $ingredient->img = $file_img['url'];
        $ingredient->save();

        return response()->json(['ingredient'=>$ingredient->name_ingredient]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function toggle($id){
        $ingredient=Ingredient::findOrFail($id);
        $ingredient->habilitado=!$ingredient->habilitado;
        $ingredient->save();
        $estado=$ingredient->habilitado?"ingrediente $ingredient->nombre habilitado":"ingrediente $ingredient->nombre inhabilitado";
        return response()->json(['estado'=>$estado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IngredientRequest $request, $id)
    {

        $ingredient = Ingredient::findOrFail($id);
        $ingredient->name_ingredient = $request->name_ingredient;
        $ingredient->price = $request->price;
        //dd($request);
        if($ingredient->img != $request->file){
            //Cloudinary
            \Cloudinary::config(array(
                "cloud_name" => getenv('CLOUDINARY_CLOUD_NAME'),
                "api_key" => getenv('CLOUDINARY_API_KEY'),
                "api_secret" => getenv('CLOUDINARY_API_SECRET')
            ));

            $file_img = \Cloudinary\Uploader::upload($request->file,  ["width" =>265, "height"=>165]);
            $ingredient->img = $file_img['url'];
        }
        $ingredient->save();
        return response()->json(['respuesta'=>'Ingrediente Modificado con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
