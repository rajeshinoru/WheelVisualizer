<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tire;
use Exception;
use Illuminate\Support\Facades\Storage;

class TireResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tires = Tire::select('partno','prodtitle','prodbrand','prodmodel','prodimage','tiresize','tirewidth','tireprofile','tirediameter','speedrating','loadindex','ply','utqg','price','qtyavail','prodmetadesc','proddesc','id')->get()->unique('prodtitle');
        // dd($tires);
        $tires = MakeCustomPaginator($tires, $request, 5);
        return view('admin.tire.index',compact('tires'));
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

            'prodbrand'=>'required',
            'prodmodel'=>'required',
            'prodtitle'=>'required',
            'prodimage'=>'required',
            'partno'=>'required|unique:tires,partno',
            'qtyavail'=>'required',
            'tirediameter'=>'required',
            'tirewidth'=>'required',
            'tirewidth'=>'required',
            'tiresize'=>'required',
            'weight'=>'required',
            'length'=>'required',
            'width'=>'required',
            'height'=>'required',
            'price'=>'required',
            'originalprice'=>'required',
            'saleprice'=>'required',
            'prodimage' =>'mimes:png,jpg,jpeg',
            'badge1' =>'mimes:png,jpg,jpeg',
            'badge2' =>'mimes:png,jpg,jpeg',
            'badge3' =>'mimes:png,jpg,jpeg',
            'prodimage1' =>'mimes:png,jpg,jpeg',
            'prodimage2' =>'mimes:png,jpg,jpeg',
            'prodimage3' =>'mimes:png,jpg,jpeg',
            'benefitsimage1' =>'mimes:png,jpg,jpeg',
            'benefitsimage2' =>'mimes:png,jpg,jpeg',
            'benefitsimage3' =>'mimes:png,jpg,jpeg',
            'benefitsimage4' =>'mimes:png,jpg,jpeg', 
        ]);
        try{  

            $tire = Tire::create($request->all());
            // dd($product);
            if($request->hasFile('prodimage') ){
                $imagename = $request->prodimage->getClientOriginalName();  
                $request->prodimage->move(public_path('/storage/tires'), $imagename); 
                $tire->prodimage = $imagename; 
            } 

            // 3 Prod Images Uploading Here //

            if($request->hasFile('prodimage1') ){
                $imagename = $request->prodimage1->getClientOriginalName();  
                $request->prodimage1->move(public_path('/storage/tires/models/'.$tire->prodmodel), $imagename); 
                $tire->prodimage1 = $tire->prodmodel."/".$imagename; 
            } 

            if($request->hasFile('prodimage2') ){
                $imagename = $request->prodimage2->getClientOriginalName();  
                $request->prodimage2->move(public_path('/storage/tires/models/'.$tire->prodmodel), $imagename); 
                $tire->prodimage2 = $tire->prodmodel."/".$imagename; 
            } 

            if($request->hasFile('prodimage3') ){
                $imagename = $request->prodimage3->getClientOriginalName();  
                $request->prodimage3->move(public_path('/storage/tires/models/'.$tire->prodmodel), $imagename); 
                $tire->prodimage3 = $tire->prodmodel."/".$imagename; 
            } 
            
            // Badge Images Uploading here

            if($request->hasFile('badge1') ){
                $imagename = $request->badge1->getClientOriginalName();  
                $request->badge1->move(public_path('/storage/tires/badges/'), $imagename); 
                $tire->badge1 = $imagename; 
            } 

            if($request->hasFile('badge2') ){
                $imagename = $request->badge2->getClientOriginalName();  
                $request->badge2->move(public_path('/storage/tires/badges/'), $imagename); 
                $tire->badge2 = $imagename; 
            } 

            if($request->hasFile('badge3') ){
                $imagename = $request->badge3->getClientOriginalName();  
                $request->badge3->move(public_path('/storage/tires/badges/'), $imagename); 
                $tire->badge3 = $imagename; 
            } 
            // Benefits Images Uploading here

            if($request->hasFile('benefitsimage1') ){
                $imagename = $request->benefitsimage1->getClientOriginalName();  
                $request->benefitsimage1->move(public_path('/storage/tires/benefits/'.$tire->prodmodel), $imagename); 
                $tire->benefitsimage1 = $tire->prodmodel."/".$imagename; 
            } 

            if($request->hasFile('benefitsimage2') ){
                $imagename = $request->benefitsimage2->getClientOriginalName();  
                $request->benefitsimage2->move(public_path('/storage/tires/benefits/'.$tire->prodmodel), $imagename); 
                $tire->benefitsimage2 = $tire->prodmodel."/".$imagename; 
            } 

            if($request->hasFile('benefitsimage3') ){
                $imagename = $request->benefitsimage3->getClientOriginalName();  
                $request->benefitsimage3->move(public_path('/storage/tires/benefits/'.$tire->prodmodel), $imagename); 
                $tire->benefitsimage3 = $tire->prodmodel."/".$imagename; 
            } 
            if($request->hasFile('benefitsimage4') ){
                $imagename = $request->benefitsimage4->getClientOriginalName();  
                $request->benefitsimage4->move(public_path('/storage/tires/benefits/'.$tire->prodmodel), $imagename); 
                $tire->benefitsimage4 = $tire->prodmodel."/".$imagename; 
            } 

            $tire->save(); 

            return back()->with('flash_success','Wheel Product Added successfully');

        }catch(Exception $e){ 
            return back()->with('flash_error',$e->getMessage());
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
        try {
            
            $wheel = Tire::find($id);
            return response()->json(['status' => true,'data'=>$wheel]); 
        } catch (Exception $e) {
            return response()->json(['status' => fasle,'data'=>$wheel]); 
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
        // dd($request->all());
        $this->validate($request, [

            'prodbrand'=>'required',
            'prodmodel'=>'required',
            'prodtitle'=>'required',
            'prodimage'=>'required',
            'partno'=>'required|unique:tires,partno,' . $id,
            'qtyavail'=>'required',
            'tirediameter'=>'required',
            'tirewidth'=>'required',
            'tirewidth'=>'required',
            'tiresize'=>'required',
            'weight'=>'required',
            'length'=>'required',
            'width'=>'required',
            'height'=>'required',
            'price'=>'required',
            'originalprice'=>'required',
            'saleprice'=>'required',
            'prodimage' =>'mimes:png,jpg,jpeg',
            'badge1' =>'mimes:png,jpg,jpeg',
            'badge2' =>'mimes:png,jpg,jpeg',
            'badge3' =>'mimes:png,jpg,jpeg',
            'prodimage1' =>'mimes:png,jpg,jpeg',
            'prodimage2' =>'mimes:png,jpg,jpeg',
            'prodimage3' =>'mimes:png,jpg,jpeg',
            'benefitsimage1' =>'mimes:png,jpg,jpeg',
            'benefitsimage2' =>'mimes:png,jpg,jpeg',
            'benefitsimage3' =>'mimes:png,jpg,jpeg',
            'benefitsimage4' =>'mimes:png,jpg,jpeg', 
        ]);
        try{  

            $tire = Tire::find($id);
            $updateData = $request->all();
            // dd($product);
            if($request->hasFile('prodimage') ){
                $imagename = $request->prodimage->getClientOriginalName();  
                $request->prodimage->move(public_path('/storage/tires'), $imagename); 
                $updateData['prodimage'] = $imagename; 
            } 

            // 3 Prod Images Uploading Here //

            if($request->hasFile('prodimage1') ){
                $imagename = $request->prodimage1->getClientOriginalName();  
                $request->prodimage1->move(public_path('/storage/tires/models/'.$tire->prodmodel), $imagename); 
                $updateData['prodimage1'] = $tire->prodmodel."/".$imagename; 
            } 

            if($request->hasFile('prodimage2') ){
                $imagename = $request->prodimage2->getClientOriginalName();  
                $request->prodimage2->move(public_path('/storage/tires/models/'.$tire->prodmodel), $imagename); 
                $updateData['prodimage2'] = $tire->prodmodel."/".$imagename; 
            } 

            if($request->hasFile('prodimage3') ){
                $imagename = $request->prodimage3->getClientOriginalName();  
                $request->prodimage3->move(public_path('/storage/tires/models/'.$tire->prodmodel), $imagename); 
                $updateData['prodimage3'] = $tire->prodmodel."/".$imagename; 
            } 
            
            // Badge Images Uploading here

            if($request->hasFile('badge1') ){
                $imagename = $request->badge1->getClientOriginalName();  
                $request->badge1->move(public_path('/storage/tires/badges/'), $imagename); 
                $updateData['badge1'] = $imagename; 
            } 

            if($request->hasFile('badge2') ){
                $imagename = $request->badge2->getClientOriginalName();  
                $request->badge2->move(public_path('/storage/tires/badges/'), $imagename); 
                $updateData['badge2'] = $imagename; 
            } 

            if($request->hasFile('badge3') ){
                $imagename = $request->badge3->getClientOriginalName();  
                $request->badge3->move(public_path('/storage/tires/badges/'), $imagename); 
                $updateData['badge3'] = $imagename; 
            } 
            // Benefits Images Uploading here

            if($request->hasFile('benefitsimage1') ){
                $imagename = $request->benefitsimage1->getClientOriginalName();  
                $request->benefitsimage1->move(public_path('/storage/tires/benefits/'.$tire->prodmodel), $imagename); 
                $updateData['benefitsimage1'] = $tire->prodmodel."/".$imagename; 
            } 

            if($request->hasFile('benefitsimage2') ){
                $imagename = $request->benefitsimage2->getClientOriginalName();  
                $request->benefitsimage2->move(public_path('/storage/tires/benefits/'.$tire->prodmodel), $imagename); 
                $updateData['benefitsimage2'] = $tire->prodmodel."/".$imagename; 
            } 

            if($request->hasFile('benefitsimage3') ){
                $imagename = $request->benefitsimage3->getClientOriginalName();  
                $request->benefitsimage3->move(public_path('/storage/tires/benefits/'.$tire->prodmodel), $imagename); 
                $updateData['benefitsimage3'] = $tire->prodmodel."/".$imagename; 
            } 
            if($request->hasFile('benefitsimage4') ){
                $imagename = $request->benefitsimage4->getClientOriginalName();  
                $request->benefitsimage4->move(public_path('/storage/tires/benefits/'.$tire->prodmodel), $imagename); 
                $updateData['benefitsimage4'] = $tire->prodmodel."/".$imagename; 
            } 

            $tire->update($updateData); 

            return back()->with('flash_success','Tire Data Updated successfully');

        }catch(Exception $e){ 
            return back()->with('flash_error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try {
            Tire::find($id)->delete();
            return redirect('/admin/tire')->with('flash_success', 'Tire deleted successfully');
        } 
        catch (Exception $e) {
            return back()->with('flash_error', 'Tire Not Found');
        }
    }

    public function getTiresByModel($id)
    {
        try {
            $tire = Tire::find(base64_decode($id));
            $tires = Tire::where('prodbrand',$tire->prodbrand)->where('prodmodel',$tire->prodmodel)->paginate(10);
            // dd($tires);
            return view('admin.tire.model',compact('tires','tire'));
        } 
        catch (Exception $e) {
            // dd($e);
            return back()->with('flash_error', 'Tire Not Found');
        }
    }



    public function uploadcsv(Request $request){ 
        try{   
            $this->validate($request, [ 
                'tireuploadedfile'=>'required',
            ]); 

            if($request->hasFile('tireuploadedfile') ){
                $filename = $request->tireuploadedfile->getClientOriginalName();  
                $request->tireuploadedfile->move(public_path('/storage/uploaded_csv'), $filename); 
                // dd(base_path('storage/app/public/uploaded_csv/').$filename);
                $filepath = base_path('storage/app/public/uploaded_csv/').$filename;  

                if( !$fr = @fopen($filepath, "r") ){

                    return back()->with('flash_error',"File Could not be read!!");
                }
                // $fw = fopen($out_file, "w");
                $i=1;
                
                while( ($data = fgetcsv($fr, 2000000, ",")) !== FALSE ) {
                    if($i != 1){ 
                        if((isset($data[0])&&$data[0]!='')){

                                $tire['partno'] = isset($data[0])?$data[0]:null;  
                                $tire['prodtitle'] = isset($data[1])?$data[1]:null;   
                                $tire['prodbrand'] = isset($data[2])?$data[2]:null;   
                                $tire['prodmodel'] = isset($data[3])?$data[3]:null;   
                                $tire['prodmetadesc'] = isset($data[4])?$data[4]:null;    
                                $tire['prodimage'] = isset($data[5])?$data[5]:null;   
                                $tire['prodimageshow'] = isset($data[6])?$data[6]:null;   
                                $tire['prodsortcode'] = isset($data[7])?$data[7]:null;    
                                $tire['prodheaderid'] = isset($data[8])?$data[8]:null;    
                                $tire['prodfooterid'] = isset($data[9])?$data[9]:null;    
                                $tire['prodinfoid'] = isset($data[10])?$data[10]:null;  
                                $tire['proddesc'] = isset($data[11])?$data[11]:null;    
                                $tire['tirediameter'] = isset($data[12])?$data[12]:null;    
                                $tire['tirewidth'] = isset($data[13])?$data[13]:null;   
                                $tire['tireprofile'] = isset($data[14])?$data[14]:null; 
                                $tire['tiresize'] = isset($data[15])?$data[15]:null;    
                                $tire['speedrating'] = isset($data[16])?$data[16]:null; 
                                $tire['loadindex'] = isset($data[17])?$data[17]:null;   
                                $tire['ply'] = isset($data[18])?$data[18]:null; 
                                $tire['utqg'] = isset($data[19])?$data[19]:null;    
                                $tire['warranty'] = isset($data[20])?$data[20]:null;    
                                $tire['detailtitle'] = isset($data[21])?$data[21]:null; 
                                $tire['keywords'] = isset($data[22])?$data[22]:null;    
                                $tire['price'] = isset($data[23])?$data[23]:0;   
                                $tire['price2'] = isset($data[24])?$data[24]:0;  
                                $tire['cost'] = isset($data[25])?$data[25]:0;    
                                $tire['rate'] = isset($data[26])?$data[26]:0;    
                                $tire['saleprice'] = isset($data[27])?$data[27]:0;   
                                $tire['saletype'] = isset($data[28])?$data[28]:null;    
                                $tire['salestart'] = isset($data[29])?$data[29]:null;   
                                $tire['saleexp'] = isset($data[30])?$data[30]:null; 
                                $tire['weight'] = isset($data[31])?$data[31]:null;  
                                $tire['length'] = isset($data[32])?$data[32]:null;  
                                $tire['width'] = isset($data[33])?$data[33]:null;   
                                $tire['height'] = isset($data[34])?$data[34]:null;  
                                $tire['shpsep'] = isset($data[35])?$data[35]:null;  
                                $tire['shpfree'] = isset($data[36])?$data[36]:null; 
                                $tire['shpcode'] = isset($data[37])?$data[37]:null; 
                                $tire['shpflatrate'] = isset($data[38])?$data[38]:null; 
                                $tire['partno_old'] = isset($data[39])?$data[39]:null;  
                                $tire['metadesc'] = isset($data[40])?$data[40]:null;    
                                $tire['qtyavail'] = isset($data[41])?$data[41]:0;    
                                $tire['proddetailid'] = isset($data[42])?$data[42]:null;    
                                $tire['productid'] = isset($data[43])?$data[43]:null;   
                                $tire['dropshippable'] = isset($data[44])?$data[44]:null;   
                                $tire['vendorpartno'] = isset($data[45])?$data[45]:null;    
                                $tire['dropshipper'] = isset($data[46])?$data[46]:null; 
                                $tire['vendorpartno2'] = isset($data[47])?$data[47]:null;   
                                $tire['dropshipper2'] = isset($data[48])?$data[48]:null;    
                                $tire['tiretype'] = isset($data[49])?$data[49]:null;    
                                $tire['lt'] = isset($data[50])?$data[50]:null;  
                                $tire['xl'] = isset($data[51])?$data[51]:null;  
                                $tire['originalprice'] = isset($data[52])?$data[52]:0;   
                                $tire['yousave'] = isset($data[53])?$data[53]:0; 
                                $tire['set_amount'] = isset($data[54])?$data[54]:0;  
                                $tire['vehicle_type'] = isset($data[55])?$data[55]:null;    
                                $tire['badge1'] = isset($data[56])?$data[56]:null;  
                                $tire['badge2'] = isset($data[57])?$data[57]:null;  
                                $tire['badge3'] = isset($data[58])?$data[58]:null;  
                                $tire['detaildesctype'] = isset($data[59])?$data[59]:null;  
                                $tire['detaildescfeatures'] = isset($data[60])?$data[60]:null;  
                                $tire['detaildesc'] = isset($data[61])?$data[61]:null;  
                                $tire['benefits1'] = isset($data[62])?$data[62]:null;   
                                $tire['benefits2'] = isset($data[63])?$data[63]:null;   
                                $tire['benefits3'] = isset($data[64])?$data[64]:null;   
                                $tire['benefits4'] = isset($data[65])?$data[65]:null;   
                                $tire['benefitsimage1'] = isset($data[66])?$data[66]:null;  
                                $tire['benefitsimage2'] = isset($data[67])?$data[67]:null;  
                                $tire['benefitsimage3'] = isset($data[68])?$data[68]:null;  
                                $tire['benefitsimage4'] = isset($data[69])?$data[69]:null;  
                                $tire['prodlandingdesc'] = isset($data[70])?$data[70]:null; 
                                $tire['prodimage1'] = isset($data[71])?$data[71]:null;  
                                $tire['prodimage2'] = isset($data[72])?$data[72]:null;  
                                $tire['prodimage3'] = isset($data[73])?$data[73]:null;  
                                $tire['dry_performance'] =(isset($data[74]) && $data[74] != '')?$data[74]:0; 
                                $tire['wet_performance'] = (isset($data[75]) && $data[75] !='')?$data[75]:0; 
                                $tire['mileage_performance'] = (isset($data[76]) && $data[76] !='')?$data[76]:0; 
                                $tire['ride_comfort'] = (isset($data[77]) && $data[77] !='')?$data[77]:0;    
                                $tire['quiet_ride'] = (isset($data[78]) && $data[78] !='')?$data[78]:0;  
                                $tire['winter_performance'] = (isset($data[79]) && $data[79] !='')?$data[79]:0;  
                                $tire['fuel_efficiency'] = (isset($data[80]) && $data[80] !='')?$data[80]:0; 
                                $tire['braking'] = (isset($data[81]) && $data[81] !='')?$data[81]:0; 
                                $tire['responsiveness'] = (isset($data[82]) && $data[82] !='')?$data[82]:0;  
                                $tire['sport'] = (isset($data[83]) && $data[83] !='')?$data[83]:0;   
                                $tire['off_road'] = (isset($data[84]) && $data[84] !='')?$data[84]:0;    
                                $tire['youtube1'] = isset($data[85])?$data[85]:null;    
                                $tire['youtube2'] = isset($data[86])?$data[86]:null;    
                                $tire['youtube3'] = isset($data[87])?$data[87]:null;    
                                $tire['youtube4'] = isset($data[88])?$data[88]:null;    

                                Tire::updateOrCreate(['partno' =>$tire['partno']] , $tire ); 


                        }
                    }
                    $i++;
                }
                fclose($fr);
            }

            return back()->with('flash_success','Wheel Products Data Uploaded successfully');
        }catch(Exception $e){
            return back()->with('flash_error',$e->getMessage());
        } 

    }

}
