<?php

namespace App\Http\Services;

use App\Models\ShopingCar;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;

class PayUService
{
    public function makePSEPayment(ShopingCar $cart, $extraData)
    {
        $user = auth()->user();

        $user->load('billingAddress');

        $cart->load('details.product');

        $total = 0;

        foreach ($cart->details as $detail) {
            $total += $detail->product->price;
        }

        $formattotal = number_format($total, 0, '.', ',');

        Log::debug('CART TOTAL: ' . $formattotal);
        $curl = curl_init();

        // Formato: md5 -> ApiKey~merchantId~referenceCode~tx_value~currency
        $signature = env('APP_PAYU_KEY') . '~' . env('APP_PAYU_ACCOUNTID') . '~' . $cart->folio . '~' . $total . '~' . 'COP';
        Log::debug($signature);
        $signature = md5($signature);

        Log::debug($signature);

        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
        $body = '{
            "language": "es",
            "command": "SUBMIT_TRANSACTION",
            "merchant": {
                "apiKey": "' . env('APP_PAYU_KEY') . '",
                "apiLogin": "' . env('APP_PAYU_LOGIN') . '"
            },
            "transaction": {
                "order": {
                "accountId": "' . env('APP_PAYU_ACCOUNTID') . '",
                "referenceCode": "'. $cart->folio . '",
                "description": "Payment '. $cart->folio . ' description",
                "language": "es",
                "signature": "' . $signature . '",
                "notifyUrl": "http://www.payu.com/notify",
                "additionalValues": {
                    "TX_VALUE": {
                        "value": ' . $total . ',
                        "currency": "COP"
                    },
                    "TX_TAX": {
                        "value": ' . $total * 0.16 . ',
                        "currency": "COP"
                    },
                    "TX_TAX_RETURN_BASE": {
                        "value": ' . $total * 0.84 . ',
                        "currency": "COP"
                    }
                },
                "buyer": {
                    "merchantBuyerId": "'.$user->id.'",
                    "fullName": "'.$user->name.'",
                    "emailAddress": "'.$user->email.'",
                    "contactPhone": "'.$user->phone.'",
                    "dniNumber": "'.$extraData['document_number'].'",
                    "shippingAddress": {
                        "street1": "'. $extraData['street'] . '",
                        "street2": "'. $extraData['second_street'] . '",
                        "city": "'. $extraData['city'] . '",
                        "state": "'. $extraData['state'] . '",
                        "country": "'. $extraData['country'] . '",
                        "postalCode": "'. $extraData['postal_code'] . '",
                        "phone": "'. $extraData['phone'] . '"
                    }
                },
                "shippingAddress": {
                    "street1": "'.$user->billingAddress->street .'",
                    "street2": "'.$user->billingAddress->second_street.'",
                    "city": "'.$user->billingAddress->city.'",
                    "state": "'.$user->billingAddress->state.'",
                    "country": "'.$user->billingAddress->country.'",
                    "postalCode": "'.$user->billingAddress->postal_code.'",
                    "phone": "'.$user->billingAddress->phone.'"
                }
            },
            "payer": {
                "merchantPayerId": "' . $user->id . '",
                "fullName": "' . $user->name . '",
                "emailAddress": "' . $user->email . '",
                "contactPhone": "' . $user->phone . '",
                "dniNumber": "' . $extraData['document_number'] . '",
                "billingAddress": {
                    "street1": "' . $user->billingAddress->street . '",
                    "street2": "' . $user->billingAddress->second_street . '",
                    "city": "' . $user->billingAddress->city . '",
                    "state": "' . $user->billingAddress->state . '",
                    "country": "' . $user->billingAddress->country . '",
                    "postalCode": "' . $user->billingAddress->postal_code . '",
                    "phone": "' . $user->billingAddress->phone . '"
                }
            },
            "extraParameters": {
                "RESPONSE_URL": "' . env('APP_URL') . '/payu/response' . '",
                "PSE_REFERENCE1": "' . $extraData['ip'] . '",
                "FINANCIAL_INSTITUTION_CODE": "' . $extraData['bank_code'] . '",
                "USER_TYPE": "' . $extraData['person_type'] . '",
                "PSE_REFERENCE2": "' . $extraData['identification_type'] . '",
                "PSE_REFERENCE3": "' . $extraData['document_number'] . '"
            },
            "type": "AUTHORIZATION_AND_CAPTURE",
            "paymentMethod": "PSE",
            "paymentCountry": "CO",
            "deviceSessionId": "' . $extraData['deviceSessionId'] . '",
            "ipAddress": "' . $extraData['ip'] . '",
            "cookie": "' . $extraData['cookie'] . '",
            "userAgent": "' . $extraData['user_agent'] . '"
            },
            "test": true
        }';
        Log::debug($body);
        $request = new Request('POST', 'https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi', $headers, $body);
        $res = $client->sendAsync($request)->wait();

        Log::debug('Respuesta PAYU');
        Log::debug($res->getBody());

        return $res->getBody();
    }
}
