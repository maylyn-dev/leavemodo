<?php

namespace App\Http\Controllers;

use App\Department;
use App\Position;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('user.create', compact('departments', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'gender' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'birth_date' => 'required',
            'civil_status' => 'required',
            'date_hired' => 'required',
            'position_id' => 'required',
            'department_id' => 'required',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->contact_no = $request->contact_no;
        $user->birth_date = $request->birth_date;
        $user->civil_status = $request->civil_status;
        $user->date_hired = $request->date_hired;
        $user->position_id = $request->position_id;
        $user->department_id = $request->department_id;
        $user->admin_notes = $request->admin_notes;

        $user->save();

        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $departments = Department::all();
        $positions = Position::all();
        return view('user.edit', compact('user', 'departments', 'positions'));
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
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'birth_date' => 'required',
            'civil_status' => 'required',
            'date_hired' => 'required',
            'position_id' => 'required',
            'department_id' => 'required',
        ]);

        $user->update($request->all());

        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('user');
    }
}
