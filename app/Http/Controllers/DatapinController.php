<?php

namespace App\Http\Controllers;

use App\Models\big;
use App\Models\bo;
use App\Models\data;
use App\Models\profit;
use App\Models\server;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;

class DatapinController extends Controller
{
    function pinindex()
    {
        $product=data::where('network', 'data_pin')->first();
        return view('datapin', compact('product'));
    }
    function processdatapin(Request $request)
    {
        $request->validate([
            'productid'=>'required',
        ]);

        $user = User::find($request->user()->id);
            $product = data::where('network', $request->productid)->first();

        if ($user->apikey == '') {

            $amount = $product->tamount;
        } elseif ($user != '') {
            $amount = $product->ramount;
        }

        if ($user->wallet < $amount) {
            $mg = "You Cant Make Purchase Above" . "NGN" . $amount . " from your wallet. Your wallet balance is NGN $user->wallet. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";
           return response()->json($mg, Response:: HTTP_BAD_REQUEST);

        }
        if ($request->amount < 0) {

            $mg = "error transaction";
            return response()->json($mg, Response:: HTTP_BAD_REQUEST);


        }
        $bo = bo::where('refid', $request->refid)->first();
        if (isset($bo)) {
            $mg = "duplicate transaction";
            return response()->json($mg, Response:: HTTP_CONFLICT);


        } else {
            $user = User::find($request->user()->id);


            $gt = $user->wallet - $product->tamount;


            $user->wallet = $gt;
            $user->save();

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://pay.sammighty.com.ng/api/buydatacard",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "apikey: sk-ui8pjndeJA3ATMNIhgHw", //replace this with your authorization_token
                    "cache-control: no-cache"
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            $data = json_decode($response, true);

            if ($data['success'] == '1') {
                $success = 1;

                $po = $amount - $product->amount;

                $bo = bo::create([
                    'username' => $user->username,
                    'plan' => $product->network . '|' . $product->plan,
                    'amount' => $product->tamount,
                    'server_res' => $response,
                    'result' => $success,
                    'phone' => 'any',
                    'refid' => $request->refid,
                    'fbalance'=>$user->wallet,
                    'balance'=>$gt,
                    'token'=>$data['pin'],
                ]);

                $profit = profit::create([
                    'username' => $user->username,
                    'plan' => $product->network . '|' . $product->plan,
                    'amount' => $po,
                ]);

                $name = $product->plan;
                $am = "$product->plan  was successful pin:".$data['pin'];
                $ph = ' Dial *460*6*1# to load the pin';



                return response()->json([
                    'status' => 'success',
                    'message' => $am.' '.$ph,
                    'id'=>$bo['id'],
                ]);

            } else {
                $success = 0;
                $zo = $user->wallet + $request->amount;
                $user->wallet = $zo;
                $user->save();

                $name = $product->plan;
                $am = "NGN $request->amount Was Refunded To Your Wallet";
                $ph = ", Transaction fail";
                return response()->json([
                    'status' => 'fail',
                    'message' => $am.' ' .$ph,
//                            'data' => $responseData // If you want to include additional data
                ]);

            }
        }
    }


}
