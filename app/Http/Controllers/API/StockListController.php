<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\StockList;

class StockListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocklist = StockList::all();
        return response($stocklist, Response::HTTP_CREATED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stocklist = StockList::create($request->all());
        return response($stocklist, Response::HTTP_CREATED);
    }

    /**
     * Display the specified no resource.
     *
     * @param  int  $no :stock no, ex:"2330"
     * @return \Illuminate\Http\Response
     */
    public function show($no)
    {
        $stocklist = StockList::where('no', $no)->get();
        if($stocklist->isNotEmpty()){
            return response($stocklist, Response::HTTP_CREATED);
        }else{
            return response()->json(
                [
                    'error' => 'Not Found'
                ],
                Response::HTTP_NOT_FOUND
            );
        }
    }

    /**
     * Display the specified no and date resource.
     *
     * @param  int  $no :stock no, ex:2330
     * @param  str  $date :search date, ex:"20220101"
     * @return \Illuminate\Http\Response
     */
    public function show_specified($no, $date)
    {
        $stocklist = StockList::where('date', '=', date("Y-m-d",strtotime($date)))->where('no', '=', $no)->get();
        if($stocklist->isNotEmpty()){
            return response($stocklist, Response::HTTP_CREATED);
        }else{
            return response()->json(
                [
                    'error' => 'Not Found'
                ],
                Response::HTTP_NOT_FOUND
            );
        }
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
        $stocklist=StockList::where('id', $id)->firstOrFail();;
        $stocklist->update($request->all());
        return response('Update Success', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stocklist=StockList::where('id', $id)->firstOrFail();;
        $stocklist->delete();
        return response('Delete Success', Response::HTTP_OK);
    }
}
