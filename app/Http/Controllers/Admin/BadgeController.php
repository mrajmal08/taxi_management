<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyBadgeRequest;
use App\Badge;

class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $badges = Badge::all();

        return view('admin.badge.index', compact('badges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.badge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $badge = Badge::create($request->all());
        notify()->success('Badge created');
        return redirect()->route('admin.badges.index');
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
        $badge = Badge::where('id',$id)->first();
        return view('admin.badge.edit', compact('badge'));
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
        $badge = Badge::find($id);
        $badge->update($request->all());
        notify()->success('Badge updated');
        return redirect()->route('admin.badges.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        notify()->success('Badge deleted');
        $badge = Badge::find($id);
        $badge->delete();

        return back();
    }

    public function massDestroy(MassDestroyBadgeRequest $request)
    {
        Badge::whereIn('id', request('ids'))->delete();
        notify()->success('Badges deleted');
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
