<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculator;

class CalculatorController extends Controller
{

    public function api($id){

       //$alert  = request()->session()->get('alert');
       $rec=calculator::find($id);  
      // dd($rec);      
       return $rec;

    }

    /**
     * Form method will show the form page from view
     */
        
     public function show($id)
     {
        $alert  = request()->session()->get('alert');
        // $r=DB::table('calculators')->where('id',$id)->first();
         //$r=DB::table('calculators')->find($id);
         $rec=calculator::find($id);
       return view('calculator.show')->with('data',$rec)->with('alert' , $alert);
        
     }


     public function edit($id)
    {
        $data=Calculator::where('id',$id)->first();
       return view('calculator.edit')->with('data',$data);
       
    }

    //savedata

    public function save($id)
    {
      
      $rec=Calculator::find($id);
      $data=request()->all();
      
   // $rec=Calculator::where('id',$id)->first();
    //dd($rec);
    
     //$rec=Calculator::find('id',$id)->first();
    
     
  
    //return view('calculator.edit')->with('data',$data);
    
        $rec->a=request()->get('a');
        $rec->b=request()->get('b');
        $rec->opr=request()->get('opr');
        if(request()->get('opr')=='add')
        $rec->result=$rec->a + $rec->b;
        else if(request()->get('opr')=='sub')
        $rec->result=$rec->a - $rec->b;
        else if(request()->get('opr')=='mul')
        $rec->result=$rec->a * $rec->b;
        $rec->save();
        $alert ="you have succesfully updated (" .$rec->id.")";
        return redirect()->to('calculator/show/'.$id)
        ->with('alert' , $alert);
}
public function destroy($id){
    $rec=calculator::find($id);
    if($rec)
    $rec->delete();
    return redirect()->to('calculator/logs/');
}

    public function form()
    {
        return view('calculator.form');
    }

    /**
     * Result method will perform the operations
     * evaluate the result and then send the data to view
     */
    public function result()
    {
        // capture all data from the request
        $a = request()->get('a');
        $b = request()->get('b');
        $opr = request()->get('opr');
        $result = null;


         // process the requested operation (business logic)

         if ($opr == 'add')
            $result = $a + $b;
        else if ($opr == 'sub')
            $result = $a - $b;
        else if ($opr == 'mul')
            $result = $a * $b;

        // save this data in database table
        $calc = new Calculator(); // create model object
        $calc->a = $a;
        $calc->b = $b;
        $calc->opr = $opr;
        $calc->result = $result;
        $calc->save(); 
        // save the record to table

        return view('calculator.result')
            ->with('result', $result)
            ->with('a', $a)
            ->with('b', $b)
            ->with('opr', $opr);
    }

    /**
     * This method is used for listing the logs from db table
     */
    public function logs()
    {
        $calc = new Calculator();

        $data = $calc->all();

        return view('calculator.logs')->with('data', $data);
         echo "opr - ".$d->opr."<br>";

       
    }

    public function queries()
    {
        $calc = new Calculator();
        
        // filter = all =>list all data
        // filter = first =>dishplay first record
        // filter = last => dishplay last record
        // filter = top3 => dishplay top 3 records 
        // filter = reverse => dishplay value desc order


        $filter = request()->get('filter');
        $value = request()->get('value');

        if($filter=='all') {

             $data=$calc->all();
            echo "all records ".$data->count()."<br><br>";
       
                     // if(request()->get('all')==1){

                      // $data=$calc->where('opr','add')->get();
       
                     // $data=$calc->where('opr','!=','add')->get();
      
                     //opr-> colomn name  != -> comparisen add -> value

                     // $data=$calc->where('created_at','<','2023-07-02 14:31:42')->get();
        
                     // $data=$calc->where('created_at','>=','2023-07-02 14:31:42')->get();
         
                     //to get all records some condistions on where  
                    
                      // $data=$calc->where('created_at','>=','2023-07-02 14:31:42')
                     // ->get();
        
                      // $data=$calc->where('created_at','>=','2023-07-02 14:31:42')
                       //     ->orderby('id','desc')->get();
        
                    foreach($data as $d){
                        echo "id - ".$d->id." | ";
                        echo "a - ".$d->a." | ";
                        echo "b - ".$d->b." | ";
                        echo "opr - ".$d->opr." | ";
                        echo "created_at - ".$d->created_at."<br><br>";
                    }
        
                  }
        
               
        
                //where is used as a condation on the table get will return a collection 
                   // collection of records
                // first() will return the first record

                //this will be first record
                
                if($filter=='first'){
                        
                        
                        $data=$calc->first();
                         echo "first records ".$data->count()."<br><br>";
                        
                        // foreach($data as $d){
                            echo "id - ".$data->id." | ";
                            echo "a - ".$data->a." | ";
                            echo "b - ".$data->b." | ";
                            echo "opr - ".$data->opr." | ";
                            echo "created_at - ".$data->created_at."<br><br>";
                       //  }
                }

                //this will be last record

                if($filter=='last'){
                        
                        
                    $data=$calc->orderby('id','desc')->first();
                     echo "last records ".$data->count()."<br><br>";
                    
                    // foreach($data as $d){
                        echo "id - ".$data->id." | ";
                        echo "a - ".$data->a." | ";
                        echo "b - ".$data->b." | ";
                        echo "opr - ".$data->opr." | ";
                        echo "created_at - ".$data->created_at."<br><br>";
                   //  }
                    }
                    // this will be top 3

                   if($filter=='top'){
                        
                    $data=$calc->limit(3)->get();
                    
                    echo "top3 records ".$data->count()."<br><br>";
                    
                    foreach($data as $d){
                        echo "id - ".$d->id." | ";
                        echo "a - ".$d->a." | ";
                        echo "b - ".$d->b." | ";
                        echo "opr - ".$d->opr." | ";
                        echo "created_at - ".$d->created_at."<br><br>";
                     }
                    }

                    //this will be reverse

                    if($filter=='rev'){
                        
                        $data=$calc->orderby('id','desc')->get();
                         echo "reverse records ".$data->count()."<br><br>";
                        
                        foreach($data as $d){
                            echo "id - ".$d->id." | ";
                            echo "a - ".$d->a." | ";
                            echo "b - ".$d->b." | ";
                            echo "opr - ".$d->opr." |  <br><br>";
                           // echo "created_at - ".$data->created_at."
                          
                         }
                }

         }
}
