<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KhaltiController extends Controller
{
    public function verify(Request $request)
    {
        $args = http_build_query(array(
            'token' => $request->token,
            'amount'  => 1000
        ));

        $url = "https://khalti.com/api/v2/payment/verify/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $headers = ['Authorization: Key ////////////////////////'];
        $secretKey = env('KHALTI_SECRET_KEY');
        $headers = [
            'Authorization: Key ' . $secretKey,
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status_code == 200) {
            return response()->json([
                'success' => 1,
                'redirectto' => '/successpage',
            ]);
        } else {
            return response()->json([
                'message' => 'Something Went Wrong',
            ]);
        }
    }
}
