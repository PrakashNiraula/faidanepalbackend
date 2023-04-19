<?php

use App\CentralLogics\Helpers;
use App\Models\User;
use Illuminate\Support\Facades\App;


function calculateInterest($user_id){
    
    $user = User::where('id',$user_id)->first();


    $interest= \App\Models\BusinessSetting::where('key', 'interest')->first();
    

    if($interest){
        $interest_rate = $interest->value/100;
    }else{
        $interest_rate =5/100;
    }

    // return $interest_rate;

    if($user->interest_date){
        $updated_at = $user->interest_date;

    }else{
        $updated_at = $user->updated_at;
    }

    $updated_date = date('Y-m-d',strtotime($updated_at));

    $current_date = date('Y-m-d');


    $days_between = ceil(abs(strtotime($updated_date) - strtotime($current_date)) / 86400);

    $wallet_balance = (($user->wallet_balance * $interest_rate)/365) * $days_between;


  return round($wallet_balance, 2);

}

if (! function_exists('translate')) {
    function translate($key, $replace = [])
    {
        if(strpos($key, 'validation.') === 0 || strpos($key, 'passwords.') === 0 || strpos($key, 'pagination.') === 0 || strpos($key, 'order_texts.') === 0) {
            return trans($key, $replace);
        }
        
        $key = strpos($key, 'messages.') === 0?substr($key,9):$key;
        $local = Helpers::default_lang();
        App::setLocale($local);
        try {
            $lang_array = include(base_path('resources/lang/' . $local . '/messages.php'));
            $processed_key = ucfirst(str_replace('_', ' ', Helpers::remove_invalid_charcaters($key)));

            if (!array_key_exists($key, $lang_array)) {
                $lang_array[$key] = $processed_key;
                $str = "<?php return " . var_export($lang_array, true) . ";";
                file_put_contents(base_path('resources/lang/' . $local . '/messages.php'), $str);
                $result = $processed_key;
            } else {
                $result = trans('messages.' . $key, $replace);
            }
        } catch (\Exception $exception) {
            info($exception);
            $result = trans('messages.' . $key, $replace);
        }

        return $result;
    }
}