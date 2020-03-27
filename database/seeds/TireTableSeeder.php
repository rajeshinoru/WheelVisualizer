<?php

use Illuminate\Database\Seeder;
use App\Tire;

class TireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

  		set_time_limit(999999999);
        $this->command->info('Tire table seeding started!');

         $in_file = public_path('/storage/tires_data/Tires-March-27.csv'); 


        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        $i=1;
        while( ($data = fgetcsv($fr, 2000000, ",")) !== FALSE ) {
                if($i != 1){
                    // dd($data[55]);
                    if((isset($data[0])&&$data[0]!='')){

                        $tire =Tire::where('partno',$data[22])->first();
                        if($tire==null){
                            $tire=new Tire;

                            $tire->partno = isset($data[22])?$data[22]:null;  
                            $tire->prodtitle = isset($data[0])?$data[0]:null;   
                            $tire->prodbrand = isset($data[1])?$data[1]:null;   
                            $tire->prodmodel = isset($data[2])?$data[2]:null;   
                            $tire->prodmetadesc = isset($data[3])?$data[3]:null;    
                            $tire->prodimage = isset($data[4])?$data[4]:null;   
                            $tire->prodimageshow = isset($data[5])?$data[5]:null;   
                            $tire->prodsortcode = isset($data[6])?$data[6]:null;    
                            $tire->prodheaderid = isset($data[7])?$data[7]:null;    
                            $tire->prodfooterid = isset($data[8])?$data[8]:null;    
                            $tire->prodinfoid = isset($data[9])?$data[9]:null;  
                            $tire->proddesc = isset($data[10])?$data[10]:null;    
                            $tire->tirediameter = isset($data[11])?$data[11]:null;    
                            $tire->tirewidth = isset($data[12])?$data[12]:null;   
                            $tire->tireprofile = isset($data[13])?$data[13]:null; 
                            $tire->tiresize = isset($data[14])?$data[14]:null;    
                            $tire->speedrating = isset($data[15])?$data[15]:null; 
                            $tire->loadindex = isset($data[16])?$data[16]:null;   
                            $tire->ply = isset($data[17])?$data[17]:null; 
                            $tire->utqg = isset($data[18])?$data[18]:null;    
                            $tire->warranty = isset($data[19])?$data[19]:null;    
                            $tire->detailtitle = isset($data[20])?$data[20]:null; 
                            $tire->keywords = isset($data[21])?$data[21]:null;    
                            $tire->price = isset($data[23])?$data[23]:0;   
                            $tire->price2 = isset($data[24])?$data[24]:0;  
                            $tire->cost = isset($data[25])?$data[25]:0;    
                            $tire->rate = isset($data[26])?$data[26]:0;    
                            $tire->saleprice = isset($data[27])?$data[27]:0;   
                            $tire->saletype = isset($data[28])?$data[28]:null;    
                            $tire->salestart = isset($data[29])?$data[29]:null;   
                            $tire->saleexp = isset($data[30])?$data[30]:null; 
                            $tire->weight = isset($data[31])?$data[31]:null;  
                            $tire->length = isset($data[32])?$data[32]:null;  
                            $tire->width = isset($data[33])?$data[33]:null;   
                            $tire->height = isset($data[34])?$data[34]:null;  
                            $tire->shpsep = isset($data[35])?$data[35]:null;  
                            $tire->shpfree = isset($data[36])?$data[36]:null; 
                            $tire->shpcode = isset($data[37])?$data[37]:null; 
                            $tire->shpflatrate = isset($data[38])?$data[38]:null; 
                            $tire->partno_old = isset($data[39])?$data[39]:null;  
                            $tire->metadesc = isset($data[40])?$data[40]:null;    
                            $tire->qtyavail = isset($data[41])?$data[41]:0;    
                            $tire->proddetailid = isset($data[42])?$data[42]:null;    
                            $tire->productid = isset($data[43])?$data[43]:null;   
                            $tire->dropshippable = isset($data[44])?$data[44]:null;   
                            $tire->vendorpartno = isset($data[45])?$data[45]:null;    
                            $tire->dropshipper = isset($data[46])?$data[46]:null; 
                            $tire->vendorpartno2 = isset($data[47])?$data[47]:null;   
                            $tire->dropshipper2 = isset($data[48])?$data[48]:null;    
                            $tire->tiretype = isset($data[49])?$data[49]:null;    
                            $tire->lt = isset($data[50])?$data[50]:null;  
                            $tire->xl = isset($data[51])?$data[51]:null;  
                            $tire->originalprice = isset($data[52])?$data[52]:0;   
                            $tire->yousave = isset($data[53])?$data[53]:0; 
                            $tire->set_amount = isset($data[54])?$data[54]:0;  
                            $tire->vehicle_type = isset($data[55])?$data[55]:null;    
                            $tire->badge1 = isset($data[56])?$data[56]:null;  
                            $tire->badge2 = isset($data[57])?$data[57]:null;  
                            $tire->badge3 = isset($data[58])?$data[58]:null;  
                            $tire->detaildesctype = isset($data[59])?$data[59]:null;  
                            $tire->detaildescfeatures = isset($data[60])?$data[60]:null;  
                            $tire->detaildesc = isset($data[61])?$data[61]:null;  
                            $tire->benefits1 = isset($data[62])?$data[62]:null;   
                            $tire->benefits2 = isset($data[63])?$data[63]:null;   
                            $tire->benefits3 = isset($data[64])?$data[64]:null;   
                            $tire->benefits4 = isset($data[65])?$data[65]:null;   
                            $tire->benefitsimage1 = isset($data[66])?$data[66]:null;  
                            $tire->benefitsimage2 = isset($data[67])?$data[67]:null;  
                            $tire->benefitsimage3 = isset($data[68])?$data[68]:null;  
                            $tire->benefitsimage4 = isset($data[69])?$data[69]:null;  
                            $tire->prodlandingdesc = isset($data[70])?$data[70]:null; 
                            $tire->prodimage1 = isset($data[71])?$data[71]:null;  
                            $tire->prodimage2 = isset($data[72])?$data[72]:null;  
                            $tire->prodimage3 = isset($data[73])?$data[73]:null;  
                            $tire->dry_performance =(isset($data[74]) && $data[74] != '')?$data[74]:0; 
                            $tire->wet_performance = (isset($data[75]) && $data[75] !='')?$data[75]:0; 
                            $tire->mileage_performance = (isset($data[76]) && $data[76] !='')?$data[76]:0; 
                            $tire->ride_comfort = (isset($data[77]) && $data[77] !='')?$data[77]:0;    
                            $tire->quiet_ride = (isset($data[78]) && $data[78] !='')?$data[78]:0;  
                            $tire->winter_performance = (isset($data[79]) && $data[79] !='')?$data[79]:0;  
                            $tire->fuel_efficiency = (isset($data[80]) && $data[80] !='')?$data[80]:0; 
                            $tire->braking = (isset($data[81]) && $data[81] !='')?$data[81]:0; 
                            $tire->responsiveness = (isset($data[82]) && $data[82] !='')?$data[82]:0;  
                            $tire->sport = (isset($data[83]) && $data[83] !='')?$data[83]:0;   
                            $tire->off_road = (isset($data[84]) && $data[84] !='')?$data[84]:0;    
                            $tire->youtube1 = isset($data[85])?$data[85]:null;    
                            $tire->youtube2 = isset($data[86])?$data[86]:null;    
                            $tire->youtube3 = isset($data[87])?$data[87]:null;    
                            $tire->youtube4 = isset($data[88])?$data[88]:null;    
                            // dd($tire);
                            $tire->save(); 

                        }
                    // echo $tire->id."-----------".$tire->partno."<br>";
                    }else{

        				$this->command->info('Tire table seeding breaked!');
                        break;
                    }
                }
                $i++;
            }
        fclose($fr);
        // fclose($fw);
        $this->command->info('Tire table seeding completed!');
    }
}
