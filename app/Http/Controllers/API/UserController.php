<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class UserController extends Controller
{
    protected $user;
 

    public function index()
    {
        $data = User::get();
        return response()->json($data, 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->all();
        //Validate data
        $validator = Validator::make($data, User::$rules);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()
            ], 200);
        }

        $data = User::create($data);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
        ], 200);
    }

    public function show($id)
    {
        $data = User::find($id);
    
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, User not found.'
            ], 400);
        }
    
        return response()->json($data, 200);
    }

    public function search(Request $req)
    {
        $data = User::where('name', 'like', "%".$req->search."%")
                        ->simplePaginate(10)
                        ->appends(request()->all());
    
        return response()->json($data, 200);
    }

    public function edit(User $data)
    {
    }

    public function update(Request $request)
    {

        $data = $request->all();
        //Validate data
        $validator = Validator::make($data, User::$rules_update);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()
            ], 200);
        }

        /*$data = */
        $User = $User->update($data);

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully',
            'data' => $User
        ], 200);
    }

    public function destroy($id)
    {
        
        $data = User::find($id);
        if($data){
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully'
            ], 200);   
        }else{

            return response()->json([
                'success' => false,
                'error' => 'Sorry, User not found.'
            ], 400);
        }
    }
}
