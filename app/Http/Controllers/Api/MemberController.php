<?php

namespace App\Http\Controllers\Api;

use App\Models\Members;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MemberResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function index()
    {
        //get members
        $data = Members::latest()->paginate(5);

        //return collection of members as a resource
        return new MemberResource(true, 'List Data Members', $data);
    }
    
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'job'   => 'required',
            'about' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/member', $image->hashName());

        //create members
        $data = Members::create([
            'name'     => $request->name,
            'job'   => $request->job,
            'about'   => $request->about,
            'image'     => $image->hashName(),
        ]);

        //return response
        return new MemberResource(true, 'Data Member Berhasil Ditambahkan!', $data);
    }

    public function show($id)
    {
        //return single member as a resource
        $data = Members::find($id);

        if(empty($data)){
            return response()->json(['error' => 'Id '.$id.' not found'], 401);
        }

        return new MemberResource(true, 'Data Member Ditemukan!', $data);
    }

    public function update(Request $request, $id)
    {
        $data = Members::find($id);
        if(empty($data)){
            return response()->json(['error' => 'Id '.$id.' not found'], 401);
        }

        //define validation rules
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'job'   => 'required',
            'about' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request->hasFile('image')) {
            //upload image
            $image = $request->file('image');
            $image->storeAs('public/member', $image->hashName());

            //delete old image
            Storage::delete('public/member/'.$data->image);

            //update member with new image
            $data->update([
                'name'     => $request->name,
                'job'   => $request->job,
                'about'   => $request->about,
                'image'     => $image->hashName(),
            ]);

        } else {

            //update member without image
            $data->update([
                'name'     => $request->name,
                'job'   => $request->job,
                'about'   => $request->about,
            ]);
        }

        //return response
        return new MemberResource(true, 'Data Member Berhasil Diubah!', $data);
    }

    public function destroy($id)
    {
        $data = Members::find($id);
        if(empty($data)){
            return response()->json(['error' => 'Id '.$id.' not found'], 401);
        }

        //delete image
        Storage::delete('public/member/'.$data->image);

        //delete post
        $data->delete();

        //return response
        return new MemberResource(true, 'Data Member Berhasil Dihapus!', null);
    }
}
