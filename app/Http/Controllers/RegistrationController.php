<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($column, $order)
    {
        // Get All the registrations and order by the registration date
        return Registration::orderBy($column, $order)->get();
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
        $types = ["Teacher", "Student"];
        $schoolIDs = [1, 2, 3, 4, 5, 6];
        
        $this->validate($request, [
            'last_name' => 'required|alpha',
            'first_name' => 'required|alpha',
            'type' => ['required', Rule::in($types)],
            'middle_initial' => 'max:2|alpha',
            'schools' => ['required', Rule::in($schoolIDs)]
        ]);

        $newRegistration = new Registration;
        $newRegistration->last_name = $request->input('last_name');
        $newRegistration->first_name = $request->input('first_name');
        $newRegistration->middle_initial = $request->input('middle_initial');
        $newRegistration->type = $request->input('type');
        $newRegistration->college = $request->input('schools');
        $newRegistration->save();

        
        return redirect('/')->with('success', "Registration Successful!");
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
