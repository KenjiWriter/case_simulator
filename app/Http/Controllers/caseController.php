<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Item;
use Illuminate\Http\Request;

class caseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = Box::select('name','description', 'price','id')->get();
        return view('index', [
            'cases' => $cases,
        ]);
    }

    public function showCase($id)
    {
        $case = Box::find($id);
        if(isset($case)) {

            if(isset($case->item1)) $items[1] = json_decode($case->item1, true);
            if(isset($case->item2)) $items[2] = json_decode($case->item2, true);
            if(isset($case->item3)) $items[3] = json_decode($case->item3, true);
            if(isset($case->item4)) $items[4] = json_decode($case->item4, true);
            if(isset($case->item5)) $items[5] = json_decode($case->item5, true);
            if(isset($case->item6)) $items[6] = json_decode($case->item6, true);
            if(isset($case->item7)) $items[7] = json_decode($case->item7, true);
            if(isset($case->item8)) $items[8] = json_decode($case->item8, true);
            if(isset($case->item9)) $items[9] = json_decode($case->item9, true);
            if(isset($case->item10)) $items[10] = json_decode($case->item10, true);

            foreach($items as $key => $item) {
                $drops[$key] = ['item' => Item::find($item[0]['id']), 'chances' => $item[0]['chances']];
            }

            return view('case.showCase', [
                'case' => $case,
                'drops' => $drops,
            ]);
        } else {
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
