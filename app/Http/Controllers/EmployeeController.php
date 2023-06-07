<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Companie;
use Carbon\Carbon;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee= Employee::paginate(2);
        return view('dashboard.employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companie=Companie::all();
        return view('dashboard.employee.create',compact('companie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required'
        ]);


         Employee::insert([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'companie_id'=>$request->companie_id,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'created_at'=>Carbon::now(),
        ]);

        // return redirect('employee');
        return back()->with('success_msg',"Employee Add Successfull!");

        // return back();



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee=Employee::where('id',$id)->first();
        $companie=Companie::all();
        return view('dashboard.employee.edit',compact('employee','companie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required'
        ]);


         Employee::find($id)->update([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'companie_id'=>$request->companie_id,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'created_at'=>Carbon::now(),
        ]);

        return redirect('employee');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::find($id)->delete();
        return back();
    }
}
