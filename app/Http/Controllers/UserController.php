<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::students()->find(Auth::user()->id);
        $brithday = Carbon::parse($users->brithday)->format('d/m/Y');
        $courses = User::courseAttended()->get();
        return view('users.profile', compact('users', 'brithday', 'courses'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::find($request->fid);

        if ($request->favauser) {
            $image = $request->favauser;
            $fileName = $image->getClientOriginalName();
            $data['logo_path'] = $fileName;

            Storage::disk('ava_user')->put($fileName, file_get_contents($image->getRealPath()));
        }

        if ($request->fname) {
            $data->name = $request->fname;
        }

        if ($request->femail) {
            $data->email = $request->femail;
        }

        if ($request->fphone) {
            $data->phone = $request->fphone;
        }

        if ($request->faddress) {
            $data->address = $request->faddress;
        }

        if ($request->fabout) {
            $data->about = $request->fabout;
        }

        $data->save();

        return back();
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
