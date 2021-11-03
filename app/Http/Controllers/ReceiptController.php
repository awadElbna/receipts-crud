<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use App\Models\Receipt;


class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $receipts=Receipt::orderBy('created_at','desc')->get();

      return  view('receipts.index',compact('receipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new=Receipt::latest()->first()->id+1;
        return  view('receipts.create',compact('new'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceiptRequest $request)
    {
        // Retrieve the validated input data

        $validated = $request->validated();
        Receipt::create($validated);

        return redirect()->route('receipts.index')->with('message', 'تم اضافه سند صرف جديد');
    }

}
