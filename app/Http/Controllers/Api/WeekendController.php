<?php

namespace App\Http\Controllers\Api;

use App\Models\Weekend;
use App\Models\Members;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WeekendResource;
use Illuminate\Support\Facades\Validator;

class WeekendController extends Controller
{
    public function index()
    {
        //get weekends
        // $data = Weekend::latest()->paginate(5);
        $data = Weekend::with('member:id,name,job')->paginate(5);

        //return collection of weekends as a resource
        return new WeekendResource(true, 'List Data Weekends', $data);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'topic'      => 'required',
            'member_id'  => 'required',
            'date'       => 'required',
            'firts_time' => 'required',
            'last_time'  => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create weekend
        $data = Weekend::create([
            'topic'      => $request->topic,
            'member_id'  => $request->member_id,
            'date'       => $request->date,
            'firts_time' => $request->firts_time,
            'last_time'  => $request->last_time,
        ]);

        //return response
        // return new WeekendResource(true, 'Data Weeken Berhasil Ditambahkan!', $data);
        return response()->json(['message' => 'Successfully Posted']);
    }

    public function show($id)
    {
        //return single member as a resource
        $data = Weekend::with('member:id,name,job')->find($id);
        if(empty($data)){
            return response()->json(['error' => 'Id '.$id.' not found'], 401);
        }

        return new WeekendResource(true, 'Data Weekend Ditemukan!', $data);
    }

    public function update(Request $request, $id)
    {
        $data = Weekend::find($id);
        if(empty($data)){
            return response()->json(['error' => 'Id '.$id.' not found'], 401);
        }

        //define validation rules
        $validator = Validator::make($request->all(), [
            'topic'      => 'required',
            'member_id'  => 'required',
            'date'       => 'required',
            'firts_time' => 'required',
            'last_time'  => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        //update weekend
        $data->update([
            'topic'      => $request->topic,
            'member_id'  => $request->member_id,
            'date'       => $request->date,
            'firts_time' => $request->firts_time,
            'last_time'  => $request->last_time,
        ]);

        //return response
        // return new WeekendResource(true, 'Data Weekend Berhasil Diubah!', $data);
        return response()->json(['message' => 'Successfully Updated']);
    }

    public function destroy($id)
    {
        $data = Weekend::find($id);
        if(empty($data)){
            return response()->json(['error' => 'Id '.$id.' not found'], 401);
        }

        //delete post
        $data->delete();

        //return response
        // return new WeekendResource(true, 'Data Weekend Berhasil Dihapus!', null);
        return response()->json(['message' => 'Successfully Deleted']);
    }
}
