<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutStoreRequest;
use App\Models\ShopingCar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index(ShopingCar $cart)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "language": "es",
            "command": "GET_BANKS_LIST",
            "merchant": {
                "apiLogin": "pRRXKOl8ikMmt9u",
                "apiKey": "4Vj8eK4rloUd272L48hsrarnUA"
            },
            "test": false,
            "bankListInformation": {
                "paymentMethod": "PSE",
                "paymentCountry": "CO"
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Accept: application/json'
        ),
        ));

        // $response = curl_exec($curl);

        // curl_close($curl);

        // Log::debug($response);

        // $jsonBanks = json_decode($response);
        $jsonBanks = json_decode('{"code":"SUCCESS","error":null,"banks":[{"id":"d1fc096f-f8a8-4cee-9280-42e6f9d71600","description":"A continuación seleccione su banco","pseCode":"0"},{"id":"89c1fcb8-d2bf-4396-814d-0232732fe0e7","description":"BAN.CO","pseCode":"1552"},{"id":"4d5afefd-e020-4b8e-b83f-6d479f191bb5","description":"BANCAMIA","pseCode":"1059"},{"id":"2300c701-b5c4-47ca-9b9e-f16a5d4cb579","description":"BANCO AGRARIO","pseCode":"1040"},{"id":"a14c0390-d003-44f7-8b56-e05f67fe60f0","description":"BANCO AGRARIO DESARROLLO","pseCode":"1081"},{"id":"76cad4cd-618c-4a34-9371-efe07d2946ac","description":"BANCO AGRARIO QA DEFECTOS","pseCode":"1080"},{"id":"15567280-d559-4394-9ec5-2bc214aa04d7","description":"BANCO CAJA SOCIAL","pseCode":"10322"},{"id":"14d341ff-be20-4dce-88c9-e227846ee804","description":"BANCO CAJA SOCIAL DESARROLLO","pseCode":"1032"},{"id":"8572e8e3-a002-47f9-996e-de6289348970","description":"BANCO COMERCIAL AVVILLAS S.A.","pseCode":"1052"},{"id":"9612c3fd-9015-4b01-ad84-b1d0641e4702","description":"BANCO COOMEVA S.A. - BANCOOMEVA","pseCode":"1061"},{"id":"3f57ebe3-83f6-4b5a-8096-3d43a175b0ff","description":"BANCO COOPERATIVO COOPCENTRAL","pseCode":"1066"},{"id":"ff58491f-79a1-4204-b245-b4c01576668d","description":"BANCO CREDIFINANCIERA","pseCode":"1058"},{"id":"e0330b2a-1a60-4421-beca-67eb0012725b","description":"BANCO DAVIVIENDA","pseCode":"1051"},{"id":"df48f716-652e-4fec-918e-c507aa64ff3c","description":"BANCO DAVIVIENDA Desarrollo","pseCode":"10512"},{"id":"b22e0639-2832-42c2-8312-852e4ff17145","description":"BANCO DE BOGOTA","pseCode":"1039"},{"id":"2f825700-46ed-420b-bbe1-3948d2329ef4","description":"BANCO DE BOGOTA DESARROLLO 2013","pseCode":"1001"},{"id":"10da5b95-3b9c-4200-a7e5-23092b41f46f","description":"BANCO DE OCCIDENTE","pseCode":"1023"},{"id":"2ad0ca7c-8f70-4507-96aa-e99882467e84","description":"BANCO FALABELLA","pseCode":"1062"},{"id":"0224733d-3b17-4d82-9dd6-9d04e3b65ca1","description":"BANCO FINANDINA S.A BIC","pseCode":"1063"},{"id":"ad05cb07-e9e6-4cc7-92eb-d8ae8fc528f1","description":"BANCO GNB COLOMBIA (ANTES HSBC)","pseCode":"1010"},{"id":"a5cca812-7f91-4d20-8fb6-3beed2f3ee4e","description":"BANCO GNB SUDAMERIS","pseCode":"1012"},{"id":"ed816dff-7ccb-4cd5-94f0-32ba169af6cd","description":"BANCO PICHINCHA S.A.","pseCode":"1060"},{"id":"43f87b0d-ab2b-4fc5-a2c0-b14f37547152","description":"BANCO POPULAR","pseCode":"1002"},{"id":"be5e6782-5e8f-4c67-a41c-5c1f1badc420","description":"BANCO PRODUCTOS POR SEPARADO","pseCode":"1203"},{"id":"26ffa5b4-cc60-4582-94aa-afbb63c15400","description":"Banco PSE","pseCode":"1101"},{"id":"5c3ba705-87bd-4d40-a428-8617c037a8ad","description":"BANCO SANTANDER COLOMBIA","pseCode":"1065"},{"id":"9a739f45-2eea-4351-9f27-cf282d5b7ea0","description":"BANCO SERFINANZA","pseCode":"1069"},{"id":"008fec60-7014-49e7-bb20-b14abc1dc992","description":"BANCO TEQUENDAMA","pseCode":"1035"},{"id":"2fc059de-3e53-437a-9b94-06690eac6dfd","description":"Banco union Colombia Credito","pseCode":"1004"},{"id":"2f3f6061-a245-4e50-af26-c06476e4a823","description":"BANCO UNION COLOMBIANO","pseCode":"1022"},{"id":"cb512d39-f90b-4199-b1a7-1125d490d31c","description":"BANCO UNION COLOMBIANO FD2","pseCode":"1005"},{"id":"5a8c9c96-25cb-4711-8ac2-38a7115a7aaf","description":"Banco Web Service ACH WSE 3.0","pseCode":"1055"},{"id":"01e3a368-ae7a-4857-8b0b-ad71fbae7d74","description":"BANCOLOMBIA DATAPOWER","pseCode":"10072"},{"id":"748d99be-e6fe-400a-a2c7-a6a8bb384194","description":"BANCOLOMBIA DESARROLLO","pseCode":"10071"},{"id":"8be11f6e-8123-4ca7-a463-71a151d5f05d","description":"BANCOLOMBIA QA","pseCode":"1007"},{"id":"52bba002-e387-4dac-bdbd-db6366d97700","description":"BANKA","pseCode":"1077"},{"id":"fe3e0257-1f7d-4a75-8943-51fdad928878","description":"BBVA COLOMBIA S.A.","pseCode":"1013"},{"id":"d576c560-5129-440f-9c0c-72d4024e24cb","description":"BBVA DESARROLLO","pseCode":"1513"},{"id":"40ee2bdf-165f-45f7-95cf-0ff90f338532","description":"CITIBANK COLOMBIA S.A.","pseCode":"1009"},{"id":"85562a55-f2f2-4596-82f3-781db2422e05","description":"COLTEFINANCIERA","pseCode":"1370"},{"id":"346edc6d-25c2-4930-8eb4-bfc422ecb283","description":"CONFIAR COOPERATIVA FINANCIERA","pseCode":"1292"},{"id":"9c7dbcee-5255-453c-a2e8-404a40733766","description":"COOFINEP COOPERATIVA FINANCIERA","pseCode":"1291"},{"id":"a9e62a5a-4eb3-4668-9be9-35361dd9afc6","description":"COOPERATIVA FINANCIERA COTRAFA","pseCode":"1289"},{"id":"5114d179-09bc-4510-9602-175a8494a5d0","description":"COOPERATIVA FINANCIERA DE ANTIOQUIA","pseCode":"1283"},{"id":"16b69ff5-3030-47eb-8443-db3b94279083","description":"CREDIFIANCIERA","pseCode":"1558"},{"id":"415b5b4e-f85f-459f-8b56-fd2f1312666f","description":"DALE","pseCode":"1097"},{"id":"52226255-19ae-4796-a5b9-c450bc73ddaa","description":"DAVIPLATA","pseCode":"1551"},{"id":"f5aa3405-a3cc-493d-aa92-540152d89e59","description":"GIROS Y FINANZAS COMPAÑIA DE FINANCIAMIENTO S.A","pseCode":"1303"},{"id":"5a6cb025-3a42-48d1-a156-f94daff5edd2","description":"IRIS","pseCode":"1637"},{"id":"1426f757-79ca-4ecf-bc65-f3481df22382","description":"ITAU","pseCode":"1006"},{"id":"668dc9d2-803a-4a84-9daf-fcf6afd1cee8","description":"LULO BANK","pseCode":"1070"},{"id":"6c495bd6-3fad-41fb-aba0-bfae3d629e7c","description":"MOVII S.A","pseCode":"1801"},{"id":"3db04137-d674-49ce-85a6-5a1c19c2adaf","description":"NEQUI CERTIFICACION","pseCode":"1508"},{"id":"c11f0fc1-a6ca-4408-95c2-2754dcc029b5","description":"prueba restriccion","pseCode":"9988"},{"id":"f4736446-47c4-4465-a19b-35e7bdedd5ab","description":"Prueba Steve","pseCode":"121212"},{"id":"c53fbfc7-9bc6-43a6-a45b-03b4deb5e8c4","description":"RAPPIPAY","pseCode":"1811"},{"id":"97606b6a-de88-45e6-a9bb-a75d75c100b1","description":"RAPPIPAY - DAVIVIENDA","pseCode":"1151"},{"id":"4e1d7855-efe5-4ee1-8a98-58cd1748aee3","description":"SANTANDER CONSUMER COLOMBIA","pseCode":"1991"},{"id":"bf5da781-b0ac-48b9-840e-12db3bdce1ff","description":"SCOTIABANK COLPATRIA DESARROLLO","pseCode":"1019"},{"id":"d3af6088-356b-457d-baa2-aeeae0ee356b","description":"SCOTIABANK COLPATRIA UAT","pseCode":"1078"},{"id":"823a1777-2b81-4e5a-85f9-2a87734acca9","description":"SEIVY GM FINANCIAL","pseCode":"1305"}]}');

        $cart->load('details');

        return view('checkout.index', ['shoppingCart' => $cart, 'banks' => $jsonBanks->banks]);
    }

    public function store(CheckoutStoreRequest $request)
    {
        return $request->all();
    }
}
