<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class PostController extends Controller
{
    
    public function getAll()
    {
        $posts = Post::select("*")->orderByRaw('value_grant ASC')->paginate(4);
        return Response()->json($posts);
    }

    public function GetId($id)
    {
        $resu = Post::find($id);
        return Response()->json($resu);
    }


    public function createPost(Request $request){


        try {
         Post::create([
                'title' => $request->title,
                'imagen' => $request->imagen,
                'value_required' => $request->value_required,
                'value_grant' => 0,
                'description' => $request->value_description
            ]);
            return response()->json(['mensaje' => 'Post created'], 200);
        } catch (\Throwable $th) {
            return response()->json(['mensaje' => 'Post not created'], 400);
        }
   
        
       
    }

    public function Actualizar($id, $valor)
    {


        $valor = (int)$valor;
        $resu = Post::find($id);

        
        $resu->update([
            'value_grant' => $valor  + $resu->value_grant,
        ]);

        $resu->save();
        return response()->json(['mensaje' => 'actualizado'], 200);
    }

    public function eliminarPost($id){
        $resu = Post::find($id);
        try {
            $resu->delete();
            return response()->json(['mensaje' => 'Post deleted'], 200);
        } catch (\Throwable $th) {
            return response()->json(['mensaje' => 'Post not deleted'], 400);
        }
       
    }


    public function actualizarPost(Request $request , $id){

        $resu = Post::find($id);

        $resu->update([
            'title' => $request->title,
            'imagen' => $request->imagen,
            'value_required' => $request->value_required,
            'description' => $request->description
        ]);
        $resu->save();
        return response()->json(['mensaje' => 'actualizado'], 200);
    }


}
