<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Pelaporan;

class PelaporanController extends Controller
{
 
    public function index()
    {
        $data = Pelaporan::get();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['id']);
        unset($data['created_at']);
        unset($data['updated_at']);
        $data = Pelaporan::insert($data);

        return response()->json([
            'success' => true,
            'message' => 'Pelaporan created successfully',
        ], 200);
    }

    public function show($id)
    {
        $data = Pelaporan::find($id);
    
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Pelaporan not found.'
            ], 400);
        }
    
        return response()->json($data, 200);
    }

    public function search(Request $req)
    {
        $data = Pelaporan::where('name', 'like', "%".$req->search."%")
                        ->simplePaginate(10)
                        ->appends(request()->all());
    
        return response()->json($data, 200);
    }

    public function edit(Pelaporan $data)
    {
    }

    public function update(Request $request)
    {

        $data = $request->all();
        unset($data['created_at']);
        unset($data['updated_at']);
        $Pelaporan = Pelaporan::where("id",$data['id'])->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Pelaporan updated successfully',
            'data' => $Pelaporan
        ], 200);
    }

    public function destroy($id)
    {
        
        $data = Pelaporan::find($id);
        if($data){
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Pelaporan deleted successfully'
            ], 200);   
        }else{

            return response()->json([
                'success' => false,
                'error' => 'Sorry, Pelaporan not found.'
            ], 400);
        }
    }
}
