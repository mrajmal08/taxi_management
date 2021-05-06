<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPeopleRequest;
use Illuminate\Http\Request;
use App\People;
use App\Area;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peoples = People::with('people')->get();
        return view('admin.peoples.index', compact('peoples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('admin.peoples.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $people = People::create($request->all());
        notify()->success('People created');
        return redirect()->route('admin.peoples.index');
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
        $people = People::where('id',$id)->first();
        $areas = Area::all();
        return view('admin.peoples.edit', compact('people','areas'));
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
        $people = People::find($id);
        $people->update($request->all());
        notify()->success('People updated');
        return redirect()->route('admin.peoples.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        notify()->success('People deleted');
        $people = People::find($id);
        $people->delete();

        return back();
    }

    public function massDestroy(MassDestroyPeopleRequest $request)
    {
        People::whereIn('id', request('ids'))->delete();
        notify()->success('Peoples deleted');
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
