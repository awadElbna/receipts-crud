<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use App\Models\Receipt;
use App\Models\Cost;
use App\Models\DebitAccount;


class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts = Receipt::orderBy('created_at', 'desc')->get();

        return view('receipts.index', compact('receipts'));
    }

    public  function show(Receipt $receipt)
    {
        return view('receipts.show', compact('receipt'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new = Receipt::latest('id')->first()->id + 1;

        return view('receipts.create', compact('new'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceiptRequest $request)
    {
        // Retrieve the validated input data

        $validated = $request->validated();

        $costs = $validated['cost'];
        $debits = $validated['debit'];

        unset($validated['cost']);
        unset($validated['debit']);


        $id = Receipt::create($validated)->id;

        if (!empty($costs) && $costs[1]['center'] != null)
        {

            foreach ($costs as $index => $cost) {
                $costs[$index]['receipt_id'] = $id;
            }
            Cost::insert($costs);
        }

        if (!empty($debits) && $debits[1]['amount'] != null)
        {

            foreach ($debits as $index => $debit) {
                $debits[$index]['receipt_id'] = $id;
            }
            DebitAccount::insert($costs);
        }

        return response()->json(['message' => 'تم اضافه السند  بنجاح'], 200);
    }

    public function destroy(Receipt $receipt)
    {
        $receipt->delete();
        return response()->json(['status'=>200,'success'=>true]);
    }

}
