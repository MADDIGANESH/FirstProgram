<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\strm;

class stringcontroller extends Controller
{
    public function form()
    {
        return view('man.form');
    }

    /**
     * Result method will perform the operations
     * evaluate the result and then send the data to view
     */
    public function result(Request $request)
    {
        // capture all data from the request
        $str = request()->get('str');
        $opr = request()->get('opr');
        $result = null;

        // process the requested operation (business logic)

        if($opr=='str')
        $result=strrev($str);
        elseif($opr=='noofw')
        $result=str_word_count($str);
        elseif($opr=='noofl')
        $result=strlen($str);

        //save this data in database table
        // create model object
       
        $calc= new strm(); 
        $calc->str = $str;
        $calc->opr = $opr;
        $calc->result = $result;
        $calc->save(); 
      
        // save the record to table

        return view('man.result')
            ->with('result', $result)
            ->with('str', $str)
            ->with('opr', $opr);
    }

    /**
     * This method is used for listing the logs from db table
     */
    public function logs()
    {
        $str = new strm();
        $data = $str->all();
        return view('man.logs')->with('data', $data);
    //    return view('$data.logs',compact('$data'));
    }
}
