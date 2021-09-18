<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyDriverRecieptRequest;
use App\Driver;
use App\DailyEntry;
use App\Contract;
use App\DriverReceipt;

class DriverReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        $reciepts = DriverReceipt::with('drivers')->get();
        return view('admin.d-receipts.index', compact('drivers', 'reciepts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'driver_id' => 'required',
        ]);
        try {

            $routes = Contract::where('driver', $request['driver_id'])->with('routes')->get();

            $routes_data = [];
            $total_amount = 0;
            $sub_total_amount = 0;
            $vat_percent = $request['vat'] ?? 0;
            $vat_amount = 0;
            foreach ($routes as $route) {
                $route_name = '';
//                $count = DailyEntry::whereBetween('work_date', [$request['start_date'], $request['end_date']])->where('route_id', $route['route'])->where('driver_id', $request['driver_id'])->count();
                $count = DailyEntry::whereBetween('work_date', [$request['start_date'], $request['end_date']])->where('driver_id', $request['driver_id'])->count();
                $route_name = $route['routes']['route_id'];
                $d_rate = $route['pay_per_day'] + $route['pr_rate'] ?? 0;

                $routes_data[$route_name] = array(
                    'days' => $count,
                    'route' => $route_name,
                    'rate' => $route['pay_per_day'],
                    'pa' => $route['pr_rate'] ?? 0,
                    'total' => $count * $d_rate,
                    'daily_rate' => $d_rate

                );

                $sub_total_amount += $count * $d_rate;
            }

            if (!empty($request['vat'])) {
                $vat_amount = ($request['vat'] / 100) * $sub_total_amount;
            }
            $total_amount = $vat_amount + $sub_total_amount;

            $date = Date(now());
            $date = date('m/d/Y h:i:s a', strtotime($date));
            $invoice_id = 0;
            $check = DriverReceipt::where('start_date', $request['start_date'])->where('end_date', $request['end_date'])->where('driver_id', $request['driver_id'])->get();
            if (count($check) == 0) {
                $invoice_id = DriverReceipt::create([
                    'start_date' => $request['start_date'],
                    'end_date' => $request['end_date'],
                    'vat' => $request['vat'],
                    'driver_id' => $request['driver_id'],
                    'created_date' => $date
                ])->id;
            } else {
                $invoice_id = $check[0]['id'];
            }
            return view('admin.d-receipts.layout_1', compact('routes_data', 'sub_total_amount', 'date', 'vat_amount', 'total_amount', 'invoice_id', 'vat_percent'));

        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['Something went wrong!']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rec = DriverReceipt::where('id', $id)->get();

        $routes = Contract::where('driver', $rec[0]['driver_id'])->with('routes')->get();
        $routes_data = [];
        $total_amount = 0;
        $sub_total_amount = 0;
        $vat_percent = $rec[0]['vat'] ?? 0;
        $vat_amount = 0;
        //dd($routes);
        foreach ($routes as $route) {
            $route_name = '';
            $count = DailyEntry::whereBetween('work_date', [$rec[0]['start_date'], $rec[0]['end_date']])->where('route_id', $route['route'])->where('driver_id', $rec[0]['driver_id'])->count();
            $route_name = $route['routes']['route_id'];
            $d_rate = $route['pay_per_day'] + $route['pr_rate'] ?? 0;
            $routes_data[$route_name] = array(
                'days' => $count,
                'route' => $route_name,
                'rate' => $route['pay_per_day'],
                'pa' => $route['pr_rate'] ?? 0,
                'total' => $count * $d_rate,
                'daily_rate' => $d_rate

            );

            $sub_total_amount += $count * $d_rate;
        }
        if (!empty($rec[0]['vat'])) {
            $vat_amount = ($rec[0]['vat'] / 100) * $sub_total_amount;
        }
        $total_amount = $vat_amount + $sub_total_amount;

        $date = $rec[0]['created_date'];


        $invoice_id = $rec[0]['id'];

        return view('admin.d-receipts.layout_1', compact('routes_data', 'sub_total_amount', 'date', 'vat_amount', 'total_amount', 'invoice_id', 'vat_percent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        notify()->success('Receipt deleted');
        $receipt = DriverReceipt::find($id);
        $receipt->delete();

        return back();
    }

    public function massDestroy(MassDestroyDriverRecieptRequest $request)
    {
        DriverReceipt::whereIn('id', request('ids'))->delete();
        notify()->success('Receipts deleted');
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
