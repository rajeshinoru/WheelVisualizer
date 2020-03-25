<?php

use Illuminate\Database\Seeder;
use App\Inventory;

class InventoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


  set_time_limit(999999999);
        $this->command->info('Inventories table seeding started!');

    $filepath = public_path('/storage/inventories_data/vftp0018.csv');
    $inpfile = fopen($filepath, "r");
    // Open and Read individual CSV file
    if (($inpfile = fopen($filepath, 'r')) !== false) {
        // Collect CSV each row records
        $flag = 0;
            while (($data = fgetcsv($inpfile, 10000)) !== false) {

                if($flag != 0){
                    if(!Inventory::where('partno',$data[0])->where('location_code',$data[6])->first()){
                        $inventory = new Inventory;
                        $inventory->partno = $data[0]??null;
                        $inventory->vendor_partno = $data[1]??null;
                        $inventory->mpn = $data[2]??null;
                        $inventory->description = $data[3]??null;
                        $inventory->brand = $data[4]??null;
                        $inventory->model = $data[5]??null;
                        $inventory->location_code = $data[6]??null;
                        $inventory->available_qty = $data[7]??null;
                        $inventory->price = $data[8]??null;
                        $inventory->drop_shipper = $data[9]??null;
                        $inventory->ds_vendor_code = $data[10]??null;
                        $inventory->location_name = $data[11]??null;
                        $inventory->save();

        				$this->command->info('Inventories -'.$inventory->id);
                    }
                
                }
                    $flag=1;
            }
    }
    fclose($inpfile); // Close individual CSV file 

        $this->command->info('Inventories table seeded!');
    }
}
