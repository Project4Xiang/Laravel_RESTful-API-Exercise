<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\StockInfo;
use App\Models\StockList;

class StockInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockinfo = StockInfo::all();
        return response($stockinfo, Response::HTTP_CREATED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock_id = StockList::select('id')->where('no', '=', $request->no);
        if($stock_id->get()->isNotEmpty()){
            $existinfo = StockInfo::where('date', '=', $request->date)->where('stock_id', '=', $stock_id->value('id'))->get();
            if($existinfo->isEmpty()){
                $request->merge(['stock_id' => $stock_id->value('id')]);
                $request->request->remove('no');
                $stockinfo = StockInfo::create($request->all());
                return response($stockinfo, Response::HTTP_CREATED);
            }else{
                return response()->json(
                    [
                        'error' => 'Already Exist'
                    ],
                    Response::HTTP_NOT_FOUND
                );
            }
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
     * Display the specified resource.
     *
     * @param  int  $no :stock no
     * @return \Illuminate\Http\Response
     */
    public function show($no)
    {
        $stockinfo = StockInfo::where('no', $no)->get();
        if($stockinfo->isNotEmpty()){
            return response($stockinfo, Response::HTTP_CREATED);
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
        $stockinfo = StockInfo::where('date', '=', date("Y-m-d",strtotime($date)))->where('no', '=', $no)->get();
        if($stockinfo->isNotEmpty()){
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
        $stockinfo=StockInfo::where('id', $id)->firstOrFail();;
        $stockinfo->update($request->all());
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
        $stockinfo=StockInfo::where('id', $id)->firstOrFail();;
        $stockinfo->delete();
        return response('Delete Success', Response::HTTP_NO_CONTENT);
    }
}
