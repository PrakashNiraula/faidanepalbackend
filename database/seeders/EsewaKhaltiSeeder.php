<?php

namespace Database\Seeders;

use App\Models\BusinessSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EsewaKhaltiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




       $khalti = BusinessSetting::where('key','khalti')->first();

       if(!$khalti){
            DB::table('business_settings')->insert([
                'key' => 'khalti',
                'value' =>json_encode(['publicKey'=>null,'status'=>1])
            ]);
       }


       $esewa = BusinessSetting::where('key','esewa')->first();


       if(!$esewa){
        DB::table('business_settings')->insert([
            'key' => 'khalti',
            'value' =>json_encode(['key'=>null,'secret'=>null,'status'=>1])
        ]);
        }


    }
}
