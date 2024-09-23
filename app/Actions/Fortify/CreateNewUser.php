<?php

namespace App\Actions\Fortify;

use App\Mail\Emailotp;
use App\Models\refer;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'numeric', 'digits:11'],
            'address' => ['required',  'min:11'],
            'gender' => ['required', 'string'],
            'dob' => ['required'],
            'username' => ['required',  'min:6', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            if ($input['refer'] != "1") {
                $refe = refer::create([
                    'username' => $input['refer'],
                    'newuserid' => $input['username'],
                    'amount' => 100,
                ]);
            }
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.paylony.com/api/v1/create_account',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
    "firstname": "'.$input['name'].'",
        "lastname": "'.$input['username'].'",
        "address": "'.$input['address'].'",
        "gender": "'.$input['gender'].'",
        "email": "'.$input['email'].'",
        "phone": "'.$input['number'].'",
        "dob": "'.$input['dob'].'",
        "provider": "safeheaven"
}',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer '.env('PAYLONY')
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $data = json_decode($response, true);
            if ($data['success']=="true"){
                $account = $data["data"]["account_name"];
                $number = $data["data"]["account_number"];
                $bank = $data["data"]["provider"];
                $ref= $data['data']['reference'];

            }else{
                $account = "1";
                $number = "1";
                $bank=null;
                $ref=null;

            }

            $receiver=$input ['email'];
            $admin= 'info@bytebase.com.ng';
            Mail::to($receiver)->send(new Emailotp($input));
            Mail::to($admin)->send(new Emailotp($input));
            return tap(User::create([
                'name' => $input['name'],
                'username'=>$input['username'],
                'phone'=>$input['number'],
                'email' => $input['email'],
                'account_number'=>$number,
                'account_name'=>$account,
                'bank'=>$bank,
                'ref'=>$ref,
                'address'=>$input['address'],
                'dob'=>$input['dob'],
                'gender'=>$input['gender'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
