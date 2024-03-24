<?php

namespace App\Http\Controllers\Api;
use App\Mail\Emailcharges;
use App\Mail\Emailfund;
use App\Models\bo;
use App\Models\charp;
use App\Models\paylony;
use App\Models\web;
use App\Models\webook;
use App\Models\deposit;
use App\Models\setting;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class VertualController
{
    public function vertual(Request $request)
    {
        $apikey = $request->header('apikey');
        $user = User::where('apikey',$apikey)->first();
        if ($user) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://integration.mcd.5starcompany.com.ng/api/reseller/virtual-account',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('account_name' => $user->username, 'business_short_name' => 'EVERDATA', 'uniqueid' => $user->name, 'email' => $user->email, 'phone' => '08146328645', 'webhook_url' => 'https://mobile.prinedata.com.ng/run.php',),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: MCDKEY_903sfjfi0ad833mk8537dhc03kbs120r0h9a'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
//            echo $response;
//return $response;
//var_dump(array('account_name' => $name,'business_short_name' => 'RENO','uniqueid' => $username,'email' => $email,'phone' => '08146328645', 'webhook_url'=>'https://renomobilemoney.com/go/run.php'));
            $data = json_decode($response, true);
            $account = $data["data"]["account_name"];
            $number = $data["data"]["account_number"];
            $bank = $data["data"]["bank_name"];

            $user->account_no = $number;
            $user->account_name = $account;
            $user->save();

            return response()->json([
                'message' => 'You are not allowed to access',
            ], 200);


        }
    }

    public function run(Request $request)
    {
        if ($json = json_decode(file_get_contents("php://input"), true)) {
            print_r($json['ref']);
            $data = $json;

        }
        $refid=$data["ref"];
        $amount=$data["amount"];
        $no=$data["account_number"];

        $wallet = User::where('account_number', $no)->first();
        $pt=$wallet['wallet'];

        if ($no == $wallet->account_number) {
            $depo = deposit::where('payment_ref', $refid)->first();
            $user = user::where('username', $wallet->username)->first();
            if (isset($depo)) {
                echo "payment refid the same";
            }else {

                $char = setting::first();
                $amount1 = $amount - $char->charges;


                $gt = $amount1 + $pt;
                $reference=$refid;

                $deposit = deposit::create([
                    'username' => $wallet->username,
                    'payment_ref' =>$refid,
                    'amount' => $amount,
                    'iwallet' => $pt,
                    'fwallet' => $gt,
                ]);
                $charp = charp::create([
                    'username' => $wallet->username,
                    'payment_ref' =>"Api". $reference,
                    'amount' => $char->charges,
                    'iwallet' => $pt,
                    'fwallet' => $gt,
                ]);
                $wallet->wallet = $gt;
                $wallet->save();
                $user = user::where('username', $wallet->username)->first();


                $admin= 'info@amazingdata.com.ng';

                $receiver= $user->email;
//                Mail::to($receiver)->send(new Emailcharges($charp ));
//                Mail::to($admin)->send(new Emailcharges($charp ));
//
//
//                $receiver = $user->email;
//                Mail::to($receiver)->send(new Emailfund($deposit));
//                Mail::to($admin)->send(new Emailfund($deposit));


                $resellerURL = 'https://renomobilemoney.com/api/';
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL =>$resellerURL.'fund',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_SSL_VERIFYHOST => 0,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('refid' =>'Amazing-Data'.$refid, 'amount' => $amount),

                    CURLOPT_HTTPHEADER => array(
                        'apikey: RENO-63939122379b03.42488714'
                    )));


                $response = curl_exec($curl);

                curl_close($curl);
//                echo $response;


                return $response;

            }


        }
    }
    public function run1(Request $request)
    {


        if ($json = json_decode(file_get_contents("php://input"), true)) {
            print_r($json['TransactionRef']);
            $data = $json;

        }

        $refid=$data["TransactionRef"];
        $amount=$data["Body"]["amount"]/100;
        $type=$data["Body"]["transaction_type"];
        $email=$data["Body"]["email"];

        $wallet = User::where('email', $email)->first();
        $pt=$wallet['wallet'];

        if ($email == $wallet->email) {
            $depo = deposit::where('payment_ref', $refid)->first();
            $user = user::where('username', $wallet->username)->first();
            if (isset($depo)) {
                echo "payment refid the same";
            }else {

                $char = setting::first();
                $amount1 = $amount - $char->charges;


                $gt = $amount1 + $pt;
                $reference=$refid;

                $deposit = deposit::create([
                    'username' => $wallet->username,
                    'payment_ref' =>$refid,
                    'amount' => $amount,
                    'iwallet' => $pt,
                    'fwallet' => $gt,
                ]);
                $charp = charp::create([
                    'username' => $wallet->username,
                    'payment_ref' =>"Api". $reference,
                    'amount' => $char->charges,
                    'iwallet' => $pt,
                    'fwallet' => $gt,
                ]);
                $wallet->wallet = $gt;
                $wallet->save();
                $user = user::where('username', $wallet->username)->first();


                $admin= 'info@amazingdata.com.ng';

                $receiver= $user->email;
                Mail::to($receiver)->send(new Emailcharges($charp ));
                Mail::to($admin)->send(new Emailcharges($charp ));


                $receiver = $user->email;
                Mail::to($receiver)->send(new Emailfund($deposit));
                Mail::to($admin)->send(new Emailfund($deposit));



            }


        }
    }
    public function run2(Request $request)
    {

        if ($json = json_decode(file_get_contents("php://input"), true)) {
            print_r($json['reference']);
            $data = $json;

        }
//        return $data;

        $refid=$data["reference"];
        $amount=$data["amount"];
        $account=$data['receiving_account'];
        $narration=$data["sender_narration"];

        $wallet = User::where('account_number', $account)->first();
        $pt=$wallet['wallet'];

        if ($account== $wallet->account_number ) {
            $depo = deposit::where('payment_ref', $refid)->first();
            $user = user::where('username', $wallet->username)->first();
            if (isset($depo)) {
                echo "payment refid the same";
            }else {

                $char = setting::first();
                $amount1 = $amount - $char->charges;


                $gt = $amount1 + $pt;
                $reference=$refid;

                $deposit['narration']=$narration;
                $deposit = deposit::create([
                    'username' => $wallet->username,
                    'payment_ref' =>$refid,
                    'amount' => $amount,
                    'iwallet' => $pt,
                    'fwallet' => $gt,
                ]);
                $charp = charp::create([
                    'username' => $wallet->username,
                    'payment_ref' => $reference,
                    'amount' => $char->charges,
                    'iwallet' => $pt,
                    'fwallet' => $gt,
                ]);
                $wallet->wallet = $gt;
                $wallet->save();
                $user = user::where('username', $wallet->username)->first();


                $admin= 'info@amazingdata.com.ng';

                $receiver= $user->email;
                Mail::to($receiver)->send(new Emailfund($deposit));
                Mail::to($admin)->send(new Emailfund($deposit));

                Mail::to($receiver)->send(new Emailcharges($charp ));
                Mail::to($admin)->send(new Emailcharges($charp ));

//                $web = paylony::create([
//                    'webbook' => $json,
//                ]);
                return;


            }


        }
    }

    public function honor(Request $request)
    {
        $json = json_decode(file_get_contents("php://input"), true) ;

        $data = $json;
        $message=$data["message"];
        $refid=$data["reference"];
        $web = web::create([
            'webbook' => $message. " ID:".$refid
        ]);

    }

}

