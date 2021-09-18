<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyRecieptRequest;
use App\Driver;
use App\DailyEntry;
use App\Receipt;
use Redirect;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        $reciepts = Receipt::with('drivers')->get();

        return view('admin.receipts.index',compact('drivers','reciepts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'start_date' => 'required',
            'end_date' => 'required',
            'driver_id' => 'required',
            'vat_number' => 'required',
        ]);

        try{

        $data = DailyEntry::whereBetween('work_date',[$request['start_date'],$request['end_date']])->with(['contract','driver'])->where('driver_id',$request['driver_id'])->get();
        $total_paid = 0;
        $full_days = 0;
        $half_days = 0;
        $postal = $request['code'] ?? '-';
        $company = $request['address'] ?? '-';
        $ref = $request['ref'] ?? '-';
        $vat_number = $request['vat_number'] ?? '-';
        foreach ($data as $key => $value) {
            if($value['duty'] == 1)
            {
                $total_paid += $value['contract']['pay_per_day'];
                $full_days++;
            }

            if($value['duty'] == 2)
            {
                $total_paid += ($value['contract']['pay_per_day']/2);
                $half_days++;
            }
        }
        $date = Date(now());
        $date = date('m/d/Y h:i:s a', strtotime($date));
        $vat_amount = 0;
        $vat_percent = $request['vat'] ?? 0;
        if(!empty($request['vat']))
        {
            $vat_amount= ($request['vat'] / 100) * $total_paid;
        }

        $driver_id = $data[0]['driver_id'];
        $total_paid_vat = $total_paid + $vat_amount;
        $check = Receipt::where('start_date',$request['start_date'])->where('end_date',$request['end_date'])->where('driver_id',$request['driver_id'])->get();

        if(count($check) == 0){
            $invoice_id = Receipt::create([
                'start_date' => $request['start_date'],
                'end_date'   => $request['end_date'],
                'driver_id'  => $driver_id,
                'vat_number' => $vat_number,
                'refrence'   => $ref,
                'company'    => $company,
                'postal_code' => $postal,
                'created_date' => $date,
                'vat'        => $vat_percent
            ])->id;
        } else {
            $invoice_id = $check[0]['id'];
        }
        //dd($total_paid,$full_days,$half_days,$data,$request);
        return view('admin.receipts.layout_1',compact('data','total_paid','date','postal','company','company','ref','vat_number','vat_percent','vat_amount','total_paid_vat','invoice_id'));

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
        $rec = Receipt::where('id',$id)->get();

        $data = DailyEntry::whereBetween('work_date',[$rec[0]['start_date'],$rec[0]['end_date']])->with(['contract','driver'])->where('driver_id',$rec[0]['driver_id'])->get();

        $total_paid = 0;
        $full_days = 0;
        $half_days = 0;
        $postal = $rec[0]['postal_code'] ?? '-';
        $company = $rec[0]['company'] ?? '-';
        $ref = $rec[0]['refrence'] ?? '-';
        $vat_number = $rec[0]['vat_number'] ?? '-';
        foreach ($data as $key => $value) {
            if($value['duty'] == 1)
            {
                $total_paid += $value['contract']['pay_per_day'];
                $full_days++;
            }

            if($value['duty'] == 2)
            {
                $total_paid += ($value['contract']['pay_per_day']/2);
                $half_days++;
            }
        }

        $date = $rec[0]['created_date'];
        $vat_amount = 0;
        $vat_percent = $rec[0]['vat'] ?? 0;
        if(!empty($rec[0]['vat']))
        {
            $vat_amount= ($rec[0]['vat'] / 100) * $total_paid;
        }

        $driver_id = $rec[0]['driver_id'];
        $total_paid_vat = $total_paid + $vat_amount;
        $invoice_id = $rec[0]['id'];
        return view('admin.receipts.layout_1',compact('data','total_paid','date','postal','company','company','ref','vat_number','vat_percent','vat_amount','total_paid_vat','invoice_id'));

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
        notify()->success('Receipt deleted');
        $receipt = Receipt::find($id);
        $receipt->delete();

        return back();
    }

    public function massDestroy(MassDestroyRecieptRequest $request)
    {
        Receipt::whereIn('id', request('ids'))->delete();
        notify()->success('Receipts deleted');
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
