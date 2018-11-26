<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();

        return view('type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create');
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
            'name' => 'required|max:255',
            'min_years_service' => 'required|max:255|integer',
            'num_days' => 'required|max:255|integer',
            'max_days' => 'required|max:255|integer',
            'for_male' => 'required|max:255|boolean',
            'for_female' => 'required|max:255|boolean',
            'convert_to_cash' => 'required|max:255|boolean',
            'require_docs' => 'required|max:255|boolean',
            'carry_over' => 'required|max:255|boolean',
        ]);

        $type = new Type;

        $type->name = $request->name;
        $type->description = $request->description;
        $type->min_years_service = $request->min_years_service;
        $type->num_days = $request->num_days;
        $type->max_days = $request->max_days;
        $type->for_male = $request->for_male;
        $type->for_female = $request->for_female;
        $type->convert_to_cash = $request->convert_to_cash;
        $type->require_docs = $request->require_docs;
        $type->carry_over = $request->carry_over;

        $type->save();

        return redirect('type');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Type::findOrFail($id);

        return view('type.index', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::findOrFail($id);

        return view('type.edit', compact('type'));
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
        $type = Type::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:255',
            'min_years_service' => 'required|max:255|integer',
            'num_days' => 'required|max:255|integer',
            'max_days' => 'required|max:255|integer',
            'for_male' => 'required|max:255|boolean',
            'for_female' => 'required|max:255|boolean',
            'convert_to_cash' => 'required|max:255|boolean',
            'require_docs' => 'required|max:255|boolean',
            'carry_over' => 'required|max:255|boolean',
        ]);

        $type->update($request->all());
        return redirect('type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();

        return redirect('type');
    }
}
