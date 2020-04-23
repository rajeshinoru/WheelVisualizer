<?php

use Illuminate\Database\Seeder;
use App\Viflist;
use App\Vehicle;

class ViflistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  		// set_time_limit(999999999);
	    //     $this->command->info('Viflist table seeding started!');

		   //  $filepath = '/bala/projects/inoru/WheelVisualizer/storage/app/public/viflist_data/viflist123.csv';
		   //  $inpfile = fopen($filepath, "r");
		   //  // Open and Read individual CSV file
		   //  if (($inpfile = fopen($filepath, 'r')) !== false) {
		   //      // Collect CSV each row records
		   //      $flag = 0;
		   //          while (($data = fgetcsv($inpfile, 5000)) !== false) {

		   //              if($flag != 0){ 
		   //                      $viflist = new Viflist;
					// 			$viflist->vif = $data[0];
					// 			$viflist->org = $data[1];
					// 			$viflist->send = $data[2];
					// 			$viflist->yr = $data[3];
					// 			$viflist->make = $data[4];
					// 			$viflist->model = $data[5];
					// 			$viflist->trim = $data[6];
					// 			$viflist->drs = $data[7];
					// 			$viflist->body = $data[8];
					// 			$viflist->cab = $data[9];
					// 			$viflist->whls = $data[10];
					// 			$viflist->vin = $data[11];
					// 			$viflist->date_delivered = $data[12];
		   //                      $viflist->save();

		   //      				$this->command->info('Viflist -'.$viflist->id);
		                
		   //              }
		   //                  $flag=1;
		   //          }
		   //  }
		   //  fclose($inpfile); // Close individual CSV file 

	    //     $this->command->info('Viflist table seeded!');


	    set_time_limit(999999999);
	    $this->command->info('Viflist table seeding started!');
        $in_file = public_path('/storage/viflist_data/Vif-Matching.csv'); 

        if( !$fr = @fopen($in_file, "r") ) die("Failed to open file");
        // $fw = fopen($out_file, "w");
        $key = 1;
        while( ($data = fgetcsv($fr, 1000, ",")) !== FALSE ) {
                if($data[1] != 'VehicleID'){
                    $vahicle = Vehicle::where('vehicle_id',$data[1])->where('base_vehicle_id',$data[2])->update(
                        [
                            'vif' => (isset($data[9])&&$data[9]!='')?$data[9]:null
                        ]
                    );
                    $this->command->info($key);
                    $key++;
                }
            }
        fclose($fr);
        // fclose($fw);
        // return 'hiii';
	        $this->command->info('Viflist table seeded!');
    }
}
