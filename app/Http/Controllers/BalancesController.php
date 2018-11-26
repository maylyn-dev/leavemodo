<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Http\Controllers\Traits\InitializeCurrentBalance;
use App\Type;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BalancesController extends Controller
{
    use InitializeCurrentBalance;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balances = Balance::all();
        return view('balance.index', compact('balances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $types = Type::all();
        return view('balance.create', compact('types', 'users'));
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
            'fiscal_year' => 'required',
            'user_id' => 'required',
        ]);

        $balance = new Balance;

        $balance->user_id = $request->user_id;
        $balance->fiscal_year = $request->fiscal_year;

        $balance->save();

        $balance->types()->attach($request->type_list);

        $this->addCurrentBalance($balance->id);
        return redirect('balance');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $balance = Balance::findOrFail($id);
        return view('balance.show', compact('balance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $balance = Balance::findOrFail($id);

        $types = Type::all();
        return view('balance.edit', compact('balance', 'types'));
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
        $balance = Balance::findOrFail($id);

        //validations

        $balance->update($request->all());

        $balance->types()->sync($request->type_list);

        return redirect('balance');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $balance = Balance::findOrFail($id);
        $balance->delete();
        return redirect('balance');
    }
}
