<?php

namespace App\Http\Controllers;

class PayUService
{
    public function makePSEPayment($data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://" . env('APP_PAYU_MODE') . ".payulatam.com/payments-api/4.0/service.cgi",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "language": "es",
                "command": "SUBMIT_TRANSACTION",
                "merchant": {
                    "apiKey": '. env('APP_PAYU_KEY') .',
                    "apiLogin": ' . env('APP_PAYU_LOGIN') . '
                },
                "transaction": {
                    "order": {
                        "accountId": "512321",
                        "referenceCode": "PRODUCT_TEST_2021-06-23T19:59:43.229Z",
                        "description": "Payment test description",
                        "language": "es",
                        "signature": "1d6c33aed575c4974ad5c0be7c6a1c87",
                        "notifyUrl": "http://www.payu.com/notify",
                        "additionalValues": {
                            "TX_VALUE": {
                                "value": 65000,
                                "currency": "COP"
                            },
                            "TX_TAX": {
                                "value": 10378,
                                "currency": "COP"
                            },
                            "TX_TAX_RETURN_BASE": {
                                "value": 54622,
                                "currency": "COP"
                            }
                        },
                        "buyer": {
                            "merchantBuyerId": "1",
                            "fullName": "First name and second buyer name",
                            "emailAddress": "buyer_test@test.com",
                            "contactPhone": "7563126",
                            "dniNumber": "123456789",
                            "shippingAddress": {
                                "street1": "Cr 23 No. 53-50",
                                "street2": "5555487",
                                "city": "Bogotá",
                                "state": "Bogotá D.C.",
                                "country": "CO",
                                "postalCode": "000000",
                                "phone": "7563126"
                            }
                        },
                        "shippingAddress": {
                            "street1": "Cr 23 No. 53-50",
                            "street2": "5555487",
                            "city": "Bogotá",
                            "state": "Bogotá D.C.",
                            "country": "CO",
                            "postalCode": "0000000",
                            "phone": "7563126"
                        }
                    },
                    "payer": {
                        "merchantPayerId": "1",
                        "fullName": "First name and second payer name",
                        "emailAddress": "payer_test@test.com",
                        "contactPhone": "7563126",
                        "dniNumber": "5415668464654",
                        "billingAddress": {
                            "street1": "Cr 23 No. 53-50",
                            "street2": "125544",
                            "city": "Bogotá",
                            "state": "Bogotá D.C.",
                            "country": "CO",
                            "postalCode": "000000",
                            "phone": "7563126"
                        }
                    },
                    "extraParameters": {
                        "RESPONSE_URL": "http://www.payu.com/response",
                        "PSE_REFERENCE1": "127.0.0.1",
                        "FINANCIAL_INSTITUTION_CODE": "1022",
                        "USER_TYPE": "N",
                        "PSE_REFERENCE2": "CC",
                        "PSE_REFERENCE3": "123456789"
                    },
                    "type": "AUTHORIZATION_AND_CAPTURE",
                    "paymentMethod": "PSE",
                    "paymentCountry": "CO",
                    "deviceSessionId": "vghs6tvkcle931686k1900o6e1",
                    "ipAddress": "127.0.0.1",
                    "cookie": "pt1t38347bs6jc9ruv2ecpv7o2",
                    "userAgent": "Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0"
                },
                "test": false
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
