<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companie;
use Carbon\Carbon;
use Image;

class CompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $companie=Companie::paginate(10);
       return view('dashboard.companie.index',compact('companie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.companie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'logo' => 'image|max:2048|dimensions:min_width=100,min_height=100',
        ]);


        if($request->hasFile('logo')){
            $localStore =  $request->file('logo');
            $logo_name =  $request->file('logo')->getClientOriginalName();
            $newName = $request->name.''.time().''.$logo_name;
            $localStore->storeAs('public/logo/',$newName);

            Companie::insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'website'=>$request->website,
                'logo'=>$newName,
                'created_at'=>Carbon::now(),
            ]);
        }else{
            Companie::insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'website'=>$request->website,
                'created_at'=>Carbon::now(),
            ]);
        }

        return redirect('companie');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $companie=Companie::where('id',$id)->first();
       return view('dashboard.companie.edit',compact('companie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        if($request->hasFile('logo')){
            $localStore =  $request->file('logo');
            $logo_name =  $request->file('logo')->getClientOriginalName();
            $newName = $request->name.''.time().''.$logo_name;
            $localStore->storeAs('public/logo/',$newName);

            Companie::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'website'=>$request->website,
                'logo'=>$newName,
            ]);
        }else{
            Companie::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'website'=>$request->website,
            ]);
        }
        return redirect('companie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Companie::find($id)->delete();
        return back();
    }
}
