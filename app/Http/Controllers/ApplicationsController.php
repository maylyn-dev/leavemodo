<?php

namespace App\Http\Controllers;

use App\Application;
use App\Balance;
use App\CurrentBalance;
use App\Type;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::all();
        return view('application.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::user()->id);
        $types = $user->balance->types;
        return view('application.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currentBalance = CurrentBalance::where('user_id', Auth::user()->id)->get();
        $start_date = new Carbon($request->start_date);
        $end_date = new Carbon($request->end_date);
        $totalDays = $start_date->diff($end_date)->format('%d');
        $totalDays += 1;
        foreach ($currentBalance as $balance) {
            if ($balance->type_id == $request->type_id) {
                if ($totalDays <= $balance->remaining) {
                    $application = new Application;

                    $application->date_applied = Carbon::now()->format('Y-m-d');
                    $application->start_date = $request->start_date;
                    $application->end_date = $request->end_date;
                    $application->purpose = $request->purpose;
                    $application->name_relative = $request->name_relative;
                    $application->relation = $request->relation;
                    $application->emp_notes = $request->emp_notes;
                    $application->manager_notes = $request->manager_notes;
                    $application->admin_notes = $request->admin_notes;
                    $application->user_id = Auth::user()->id;
                    $application->type_id = $request->type_id;
                    $application->status_id = 1; // Pending

                    $application->save();

                    return view('pages.dashboard');
                } else {
                    return redirect()->back();
                }
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::findOrFail($id);
        $balance = CurrentBalance::where('user_id', $application->user->id)->get();
        return view('application.show', compact('application', 'balance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Application::findOrFail($id);

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
        $application = Application::findOrFail($id);

        $application->delete();
        return redirect('application');
    }

    public function forwardApplication($id) {
        $application = Application::findOrFail($id);
        $application->status_id = 2;
        $application->update();
        return redirect()->back();
    }

    public function approveApplication($id) {
        $application = Application::findOrFail($id);
        $application->status_id = 3;
        $currentBalance = CurrentBalance::where('user_id', $application->user_id)->get();
        $start_date = new Carbon($application->start_date);
        $end_date = new Carbon($application->end_date);
        $totalDays = $start_date->diff($end_date)->format('%d');
        $totalDays += 1;
        foreach ($currentBalance as $balance) {
            if ($balance->type_id == $application->type_id) {
                $balance->remaining -= $totalDays;
                $balance->consumed += $totalDays;
                $balance->update();
                $application->update();
                return redirect()->back();
            }
        }
    }

    public function denyApplication($id) {
        $application = Application::findOrFail($id);
        $application->status_id = 4;
        $application->update();
        return redirect()->back();
    }


}
