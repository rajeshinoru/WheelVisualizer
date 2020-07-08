<?php

namespace App\Http\Controllers;

use App\Dropshipper;
use Illuminate\Http\Request;
use Excel;

class DropshipperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $dropshippers = Dropshipper::paginate(10);
        return view('admin.dropshipper.index',compact('dropshippers'));
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
        $this->validate($request, [
            'dropshipper'=>'required',
            'code'=>'required',
            'address1'=>'required' ,
            'city'=>'required',
            'state'=>'required',
            'zip'=>'required' ,
            'emailaddress'=>'required|email',
            // 'ccemailaddress'=>'email',
            'contactname'=>'required' ,
        ]);
        try{  

                $data = $request->except(['_token']);

                $dropshipper = Dropshipper::create($data);  
                

                return back()->with('success','Dropshipper Created Successfully!!');

            }catch(Exception $e){
                return back()->withInput(Input::all())->with('error',$e->getMessage());
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dropshipper  $dropshipper
     * @return \Illuminate\Http\Response
     */
    public function show(Dropshipper $dropshipper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dropshipper  $dropshipper
     * @return \Illuminate\Http\Response
     */
    public function edit(Dropshipper $dropshipper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dropshipper  $dropshipper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dropshipper $dropshipper)
    {
        // dd($post,$request->all());

        $this->validate($request, [
            'dropshipper'=>'required',
            'code'=>'required',
            'address1'=>'required' ,
            'city'=>'required',
            'state'=>'required',
            'zip'=>'required' ,
            'emailaddress'=>'required|email',
            // 'ccemailaddress'=>'email',
            'contactname'=>'required' ,
        ]);
        try{   
                $dropshipper->update($request->all());

                return back()->with('success','Dropshipper Updated Successfully!!');

            }catch(Exception $e){
                return back()->withInput(Input::all())->with('error',$e->getMessage());
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dropshipper  $dropshipper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dropshipper $dropshipper)
    {
        try{  
            
            $dropshipper->delete();

            return back()->with('success','Dropshipper Deleted Successfully!!');

        }catch(Exception $e){
            return back()->withInput(Input::all())->with('error',$e->getMessage());
        }
    }

    public function verify_string($str){
        if($str == " " || $str == ""){
            return null;
        }else{
            return (string)$str;
        }
    }

    public function DropshipperImport()
    { 
        $excelFile = public_path('/storage/Dropshippers.xlsx'); 

        $test=Excel::selectSheets('Sheet1')->load($excelFile, function($reader) {
            // $reader->ignoreEmpty();
            $results = $reader->get()->toArray(); 
            foreach($results as $key => $value){ 
                $newData=array( 
                    'dropshipper'=>$this->verify_string($value['dropshipper']),
                    'code'=>$this->verify_string($value['dropshippercode']),
                    'address1'=>$this->verify_string($value['dropshipperaddress1']),
                    'address2'=>$this->verify_string($value['dropshipperaddress2']),
                    'city'=>$this->verify_string($value['dropshippercity']),
                    'state'=>$this->verify_string($value['dropshipperstate']),
                    'zip'=>$this->verify_string($value['dropshipperzip']),
                    'allowshipsep2'=>$this->verify_string($value['allowshipsep2']),
                    'emailaddress'=>$this->verify_string($value['emailaddress']),
                    'ccemailaddress'=>$this->verify_string($value['ccemailaddress']),
                    'contactname'=>$this->verify_string($value['contactname']),
                    'bandable'=>$this->verify_string($value['bandable']),
                    'password'=>$this->verify_string($value['password']),

                ); 
                $pro = Dropshipper::updateOrCreate(
                [
                    'dropshipper' =>$newData['dropshipper'],
                    'code' =>$newData['code'],
                    'zip' =>$newData['zip']
                ] , $newData ); 
                     
            }
            })->get();
        
        
    }


}
