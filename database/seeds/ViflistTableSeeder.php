<?php

use Illuminate\Database\Seeder;
use App\Viflist;

class ViflistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  		set_time_limit(999999999);
	        $this->command->info('Viflist table seeding started!');

		    $filepath = '/bala/projects/inoru/WheelVisualizer/storage/app/public/viflist_data/viflist123.csv';
		    $inpfile = fopen($filepath, "r");
		    // Open and Read individual CSV file
		    if (($inpfile = fopen($filepath, 'r')) !== false) {
		        // Collect CSV each row records
		        $flag = 0;
		            while (($data = fgetcsv($inpfile, 5000)) !== false) {

		                if($flag != 0){ 
		                        $viflist = new Viflist;
								$viflist->vif = $data[0];
								$viflist->org = $data[1];
								$viflist->send = $data[2];
								$viflist->yr = $data[3];
								$viflist->make = $data[4];
								$viflist->model = $data[5];
								$viflist->trim = $data[6];
								$viflist->drs = $data[7];
								$viflist->body = $data[8];
								$viflist->cab = $data[9];
								$viflist->whls = $data[10];
								$viflist->vin = $data[11];
								$viflist->date_delivered = $data[12];
		                        $viflist->save();

		        				$this->command->info('Viflist -'.$viflist->id);
		                
		                }
		                    $flag=1;
		            }
		    }
		    fclose($inpfile); // Close individual CSV file 

	        $this->command->info('Viflist table seeded!');
    }
}
