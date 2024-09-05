<?php

namespace App\Http\Controllers;

use App\Console\encription;
use App\Models\bill_payment;
use App\Models\bo;
use App\Models\data;
use App\Models\easy;
use App\Models\Jamb;
use App\Models\Nabteb;
use App\Models\neco;
use App\Models\samm;
use App\Models\server;
use App\Models\User;
use App\Models\waec;
use App\Models\wallet;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EducationController
{

public function indexw()
{
    $waec=samm::where('network', 'WAEC')->first();
    $wa=waec::where('username', Auth::user()->username)->get();
return view('waec', compact('waec', 'wa'));

}
public function indexne()
{
    $nabteb=samm::where('network', 'Nabteb')->first();
    $wa=Nabteb::where('username', Auth::user()->username)->get();
return view('nabteb', compact('nabteb', 'wa'));

}
public function indexjamb()
{
    $jamb=samm::where('network', 'jamb')->first();
    $wa=Jamb::where('username', Auth::user()->username)->get();
return view('jamb', compact('jamb', 'wa'));

}
public function indexde()
{
    $jamb=samm::where('network', 'de')->first();
    $wa=Jamb::where('username', Auth::user()->username)->get();
return view('de', compact('jamb', 'wa'));

}
public function indexn()
{
    $neco=easy::where('network', 'NECO')->first();
    $ne=neco::where('username', Auth::user()->username)->get();

    return view('neco', compact('neco', 'ne'));

}
public function waec(Request $request)
{
$request->validate([
    'value'=>'required',
    'amount'=>'required',
]);
    $user = User::find($request->user()->id);
    $serve = server::where('status', '1')->first();
    $product=samm::where('network', 'WAEC')->first();

    if ($user->apikey == '') {
        $amount = $product->tamount ;
    } elseif ($user != '') {
        $amount = $product->ramount ;
    }

    if ($user->wallet < $amount) {
        $mg = "You Cant Make Purchase Above" . "NGN" . $amount . " from your wallet. Your wallet balance is NGN $user->wallet. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";

       return response()->json($mg, Response::HTTP_BAD_REQUEST );

    }
    if ($request->amount < 0) {

        $mg = "error transaction";
        return response()->json($mg, Response::HTTP_BAD_REQUEST );


    }
    if ($request->amount < 500) {

        $mg = "Your amount must be at least 500";
        return response()->json($mg, Response::HTTP_BAD_REQUEST );


    }
    $bo = bo::where('refid', $request->id)->first();
    if (isset($bo)) {
        $mg="Duplicate Transaction";
        return response()->json($mg, Response::HTTP_CONFLICT);


    } else {

        $user = User::find($request->user()->id);
//                $bt = data::where("id", $request->productid)->first();


        $gt = $user->wallet - $amount;


        $user->wallet = $gt;
        $user->save();
        $bo = bo::create([
            'username' => $user->username,
            'plan' => $product->network ,
            'amount' => $request->amount,
            'server_res' => 'ur fault',
            'result' => 1,
            'phone' => 'no',
            'refid' => $request->id,
            'discountamoun'=>0,
            'fbalance'=>$user->wallet,
            'balance'=>$gt,
        ]);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pay.sammighty.com.ng/api/waec",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array(
                'value' =>1,
                'refid'=>$request->id,
            ),
            CURLOPT_HTTPHEADER => array(
                "apikey: sk-ui8pjndeJA3ATMNIhgHw", //replace this with your authorization_token
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
//        echo $response;
        $data = json_decode($response, true);
//        return $data;

        if ($data['success']=="1") {
            $ref=$data['reference_no'];
            $token=$data['pin'];
//return $token1;

                $insert=waec::create([
                    'username'=>$user->username,
                    'seria'=>'serial_number',
                    'pin'=>$token,
                    'ref'=>$ref,
                ]);

            $mg='Waec Checker Successful Generated, kindly check your pin';
            return response()->json([
                'status' => 'success',
                'message' =>$mg,
                'id'=>$bo['id'],
            ]);

        }else{

            Alert::error('Fail', $response);
            return redirect('waec')->with('error', $response);
        }
//return $response;
    }

}
public function neco(Request $request)
{
    $request->validate([
        'value'=>'required',
        'amount'=>'required',
    ]);
    $user = User::find($request->user()->id);
    $serve = server::where('status', '1')->first();
    $product=samm::where('network', 'NECO')->first();


        $amount = $product->tamount ;


    if ($user->wallet < $amount) {
        $mg = "You Cant Make Purchase Above" . "NGN" . $amount . " from your wallet. Your wallet balance is NGN $user->wallet. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";

        return response()->json($mg, Response::HTTP_BAD_REQUEST );


    }
//    if ($request->amount < 0) {
//
//        $mg = "error transaction";
//        return response()->json($mg, Response::HTTP_BAD_REQUEST );
//
//
//    }
    $bo = bo::where('refid', $request->id)->first();
    if (isset($bo)) {
        $mg = "duplicate transaction";
        return response()->json($mg, Response::HTTP_CONFLICT );


    } else {

        $user = User::find($request->user()->id);

        $gt = $user->wallet - $amount;


        $user->wallet = $gt;
        $user->save();
        $bo = bo::create([
            'username' => $user->username,
            'plan' => $product->network ,
            'amount' => $amount,
            'server_res' => 'ur fault',
            'result' => 1,
            'phone' => 'no',
            'refid' => $request->id,
            'discountamoun'=>0,
            'fbalance'=>$user->wallet,
            'balance'=>$gt,
        ]);


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pay.sammighty.com.ng/api/neco",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array(
                'refid'=>$request->id,
                'value' =>1,
            ),
            CURLOPT_HTTPHEADER => array(
                "apikey: sk-ui8pjndeJA3ATMNIhgHw", //replace this with your authorization_token
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        if ($data['success']=="1") {
            $ref=$data['reference_no'];
            $token=$data['pin'];
                $insert=neco::create([
                    'username'=>$user->username,
                    'pin'=>$token,
                    'ref'=>$ref,
                ]);

            $mg='Neco Checker Successful Generated, kindly check your pin';
            return response()->json([
                'status' => 'success',
                'message' => $mg,
                'id'=>$bo['id'],
            ]);

        }else{

            return response()->json([
                'status' => 'fail',
                'message' => $response,
                'id'=>$bo['id'],
            ]);
        }
//        return $response;
    }
}
public function nabteb(Request $request)
{
    $request->validate([
        'value'=>'required',
        'amount'=>'required',
    ]);
    $user = User::find($request->user()->id);
    $serve = server::where('status', '1')->first();
    $product=samm::where('network', 'Nabteb')->first();

    if ($user->apikey == '') {
        $amount = $product->tamount *$request->value;
    } elseif ($user != '') {
        $amount = $product->ramount *$request->value;
    }

    if ($user->wallet < $amount) {
        $mg = "You Cant Make Purchase Above" . "NGN" . $amount . " from your wallet. Your wallet balance is NGN $user->wallet. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";

        return response()->json($mg, Response::HTTP_BAD_REQUEST );


    }
    if ($request->amount < 0) {

        $mg = "error transaction";
        return response()->json($mg, Response::HTTP_BAD_REQUEST );


    }
    $bo = bo::where('refid', $request->id)->first();
    if (isset($bo)) {
        $mg = "duplicate transaction";
        return response()->json($mg, Response::HTTP_CONFLICT );


    } else {

        $user = User::find($request->user()->id);
//                $bt = data::where("id", $request->productid)->first();


        $gt = $user->wallet - $amount;


        $user->wallet = $gt;
        $user->save();
        $bo = bo::create([
            'username' => $user->username,
            'plan' => $product->network ,
            'amount' => $amount,
            'server_res' => 'ur fault',
            'result' => 1,
            'phone' => 'no',
            'refid' => $request->id,
            'discountamoun'=>0,
            'fbalance'=>$user->wallet,
            'balance'=>$gt,
        ]);


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pay.sammighty.com.ng/api/nabteb",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array(
                'value' =>$request->value,
                'refid' =>$request->refid,
            ),
            CURLOPT_HTTPHEADER => array(
                "apikey: sk-ui8pjndeJA3ATMNIhgHw", //replace this with your authorization_token
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        if ($data['success']=="1") {
            $ref=$data['reference_no'];
            $token=$data['pin'];
                $insert=Nabteb::create([
                    'username'=>$user->username,
                    'pin'=>$token,
                    'ref'=>$ref,
                ]);

            $mg='Nabteb Checker Successful Generated, kindly check your pin';
            return response()->json([
                'status' => 'success',
                'message' => $mg,
                'id'=>$bo['id'],
            ]);

        }else{

            return response()->json([
                'status' => 'fail',
                'message' => $response,
                'id'=>$bo['id'],
            ]);
        }
//        return $response;
    }
}
public function Jamb(Request $request)
{
    $request->validate([
        'number'=>'required',
        'name'=>'required',
        'number1'=>'required',
        'refid'=>'required',
        'code'=>'required',
    ]);
    $user = User::find($request->user()->id);
    $serve = server::where('status', '1')->first();
    $product=samm::where('network', 'jamb')->first();

    if ($user->apikey == '') {
        $amount = $product->tamount ;
    } elseif ($user != '') {
        $amount = $product->ramount;
    }

    if ($user->wallet < $amount) {
        $mg = "You Cant Make Purchase Above" . "NGN" . $amount . " from your wallet. Your wallet balance is NGN $user->wallet. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";

        return response()->json($mg, Response::HTTP_BAD_REQUEST );


    }
    if ($request->amount < 0) {

        $mg = "error transaction";
        return response()->json($mg, Response::HTTP_BAD_REQUEST );


    }
    $bo = bo::where('refid', $request->refid)->first();
    if (isset($bo)) {
        $mg = "duplicate transaction";
        return response()->json($mg, Response::HTTP_CONFLICT );


    } else {

        $user = User::find($request->user()->id);
//                $bt = data::where("id", $request->productid)->first();


        $gt = $user->wallet - $amount;


        $user->wallet = $gt;
        $user->save();
        $bo = bo::create([
            'username' => $user->username,
            'plan' => $product->network ,
            'amount' => $amount,
            'server_res' => 'ur fault',
            'result' => 1,
            'phone' => 'no',
            'refid' => $request->id,
            'discountamoun'=>0,
            'fbalance'=>$user->wallet,
            'balance'=>$gt,
        ]);


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pay.sammighty.com.ng/api/jamb",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array(
                'number' =>$request->number,
                'refid' =>$request->refid,
                'name'=>$request->name,
                'code'=>$request->code,
            ),
            CURLOPT_HTTPHEADER => array(
                "apikey: sk-ui8pjndeJA3ATMNIhgHw", //replace this with your authorization_token
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        if ($data['success']==1) {
            $token=$data['pin'];
            $insert=Jamb::create([
                'username'=>$user->username,
                'serial'=>"serial",
                'pin'=>$token. ' '.$request->name,
                'response'=>"Check back",
            ]);

            $mg='Jamb Pin Successful Generated, kindly check your pin';
            return response()->json([
                'status' => 'success',
                'message' => $mg,
                'id'=>$bo['id'],
            ]);

        }else{

            return response()->json([
                'status' => 'fail',
                'message' => $response,
                'id'=>$bo['id'],
            ]);
        }
//        return $response;
    }
}
public function verifyJamb($request)
{
//    $user = User::find($request->user()->id);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pay.sammighty.com.ng/api/verifyid",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array(
                'profileid' =>$request,
                'code'=>'utme',
            ),
            CURLOPT_HTTPHEADER => array(
                "apikey: sk-ui8pjndeJA3ATMNIhgHw", //replace this with your authorization_token
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
            return response()->json([$data['message']]);

    }
public function verifyde($request)
{
//    $user = User::find($request->user()->id);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pay.sammighty.com.ng/api/verifyid",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array(
                'profileid' =>$request,
                'code'=>'de',
            ),
            CURLOPT_HTTPHEADER => array(
                "apikey: sk-ui8pjndeJA3ATMNIhgHw", //replace this with your authorization_token
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
            return response()->json([$data['message']]);

    }



public function adminneco()
{
    $all=neco::all();
    return view('admin/neco', compact('all'));
}

public function adminwaec()
{
    $all=waec::all();
    return view('admin/waec', compact('all'));
}
public function adminjamb()
{
    $all=Jamb::all();
    return view('admin/jamb', compact('all'));
}

public function waecpdfview($request)
{
    $waec=waec::where('id', $request)->first();

    return view('wpin', compact('waec'));
}
public function necopdfview($request)
{
    $waec=neco::where('id', $request)->first();

    return view('npin', compact('waec'));
}
public function jambpdfview($request)
{
    $jamb=Jamb::where('id', $request)->first();

    return view('npin2', compact('jamb'));
}

public function waecpdfdownload($request)
{
    $waec=waec::where('id', $request)->first();
    $pdf = PDF::loadView('wpin1', compact('waec'));
    return $pdf->download('waecpin.pdf');
}
public function jambpdfdownload($request)
{
    $jamb=Jamb::where('id', $request)->first();
    $pdf = PDF::loadView('jpin', compact('jamb'));
    return $pdf->download('jambpin.pdf');
}
public function necopdfdownload($request)
{
    $waec=neco::where('id', $request)->first();
    $pdf = PDF::loadView('npin1', compact('waec'));
    return $pdf->download('necopin.pdf');
}

}

