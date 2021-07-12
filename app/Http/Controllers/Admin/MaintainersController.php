<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Maintainer;
use App\Http\Requests\MassDestroyMaintainerRequest;

class MaintainersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintainers = Maintainer::all();

        return view('admin.maintainers.index', compact('maintainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maintainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insurance = Maintainer::create($request->all());
        notify()->success('Vehicle maintainer created');
        return redirect()->route('admin.maintainers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maintainer = Maintainer::where('id',$id)->first();
        return view('admin.maintainers.edit', compact('maintainer'));
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
        $maintainer = Maintainer::find($id);
        $maintainer->update($request->all());
        notify()->success('Vehicle maintainer updated');
        return redirect()->route('admin.maintainers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        notify()->success('Vehicle maintainer deleted');
        $maintainer = Maintainer::find($id);
        $maintainer->delete();

        return back();
    }

    public function massDestroy(MassDestroyMaintainerRequest $request)
    {
        Maintainer::whereIn('id', request('ids'))->delete();
        notify()->success('Vehicle maintainer deleted');
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
