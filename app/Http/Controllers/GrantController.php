<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use Illuminate\Http\Request;

class GrantController extends Controller
{


    public function getAll()
    {
        //$Grand = Grant::all();
        // Obtener todos los registros de la tabla grants, al igual que el posts asociado al grant
        //$Grand = Grant::with('post')->get();

        $Grand = Grant::join('posts', 'grants.post_id', '=', 'posts.id')
            ->select('grants.*', 'posts.title')
            ->orderByRaw('value_grant ASC')
            ->paginate(10);

        
        return Response()->json($Grand);
    }

    public function createGrant(Request $request)
    {

        $Grants =   Grant::create([
            'post_id' => $request->post_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'value_grant' => $request->value_grant
        ]);

        if ($Grants) {
            return response()->json(['mensaje' => 'Grant created'], 200);
        }
        return response()->json(['mensaje' => 'Grant not created'], 400);
    }

   
}
