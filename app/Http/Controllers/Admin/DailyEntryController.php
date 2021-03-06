<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEntryRequest;
use Illuminate\Http\Request;
use App\DailyEntry;
use App\Holiday;
use App\Driver;
use App\Route;
use Symfony\Component\HttpFoundation\Response;
use Redirect;

class DailyEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = DailyEntry::with(['driver','holiday','route'])->get();

        return view('admin.daily.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Driver::all();
        $types   = Holiday::all();
        $routes  = Route::all();
        return view('admin.daily.create',compact('drivers','types','routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'driver_id' => 'required',
            'work_date' => 'required',
            'type' => 'required',
            'route_id' => 'required',
            'duty' => 'required',
        ]);
        try {
        $entry = DailyEntry::create($request->all());
        notify()->success('Driver Entry created');
        return redirect()->route('admin.entries.index');

        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['Something went wrong!']);
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
        $entry   = DailyEntry::where('id',$id)->first();
        $drivers = Driver::all();
        $types   = Holiday::all();
        $routes  = Route::all();
        return view('admin.daily.edit',compact('entry','drivers','types','routes'));
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
        $entry = DailyEntry::find($id);
        $entry->update($request->all());
        notify()->success('Driver Entry updated');
        return redirect()->route('admin.entries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        notify()->success('Driver Entry deleted');
        $entry = DailyEntry::find($id);
        $entry->delete();

        return back();
    }

     public function massDestroy(MassDestroyEntryRequest $request)
    {
        DailyEntry::whereIn('id', request('ids'))->delete();
        notify()->success('Driver Entries deleted');
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
