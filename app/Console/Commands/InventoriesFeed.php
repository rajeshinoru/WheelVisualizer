<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InventoriesFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:inventories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy the Data from MySQL to MSSQL Database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $db_ext = \DB::connection('sqlsrv');
        // Get table data from production
        foreach(\DB::table('inventories')->whereNull('backupflag')->get() as $data){
            // dd($data);
            $this->info('MYSQL ID:'.$data->id);
             // Save data to staging database - default db connection
             $db_ext->table('inventories')->insert(
                [
                    'partno'=>$data->partno,
                    'vendor_partno'=>$data->vendor_partno,
                    'mpn'=>$data->mpn,
                    'description'=>$data->description,
                    'brand'=>$data->brand,
                    'model'=>$data->model,
                    'location_code'=>$data->location_code,
                    'available_qty'=>$data->available_qty,
                    'price'=>$data->price,
                    'drop_shipper'=>$data->drop_shipper,
                    'ds_vendor_code'=>$data->ds_vendor_code,
                    'location_name'=>$data->location_name,
                ]
             );
            \DB::table('inventories')->where('id',$data->id)->update(['backupflag'=>'yes']);
        }
    }
}
