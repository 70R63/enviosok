<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuracion para LTDs
    |--------------------------------------------------------------------------
    |
    | LTD.ID valor para decalro en la tabla ltd
    |
    |
    |
    |El valor servicio es el Id delcaro en la tabla servicios
    |en caso de poner un valor mal el tipo de servicio puede causar una guia con valores distintos
    |1) = Terrestre, 2) Siguientes dia, 3) dos dias, los valores debran ajustarse para cada LTD
    |
    |
    */

    'estafeta'      => env('WSDL_ESTAFETA', 'Laravel'),
    'estafeta_tracking' => env('WSDL_ESTAFETA_TRACKING_DEV', 'tracking'),
    'fedex' => [
        'id'            => "1"
        ,'nombre'=>"FEDEX"
        ,'base_uri'     => env('FEDEX_BASEURI')
        ,'client_id'    => env('FEDEX_CLIENT_ID')
        ,'client_secret'=> env('FEDEX_CLIENT_SECRET')
        ,'servicio' => [
            '1'     => 'FEDEX_EXPRESS_SAVER'
            ,'2'    => 'STANDARD_OVERNIGHT'
            ,'3'    => 'STANDARD_OVERNIGHT'
        ]
        ,'cred'     => [
            'accountNumber' => env('FEDEX_ACCOUNTNUMBER')
        ]
        ,'rastreoEstatus' => [
            'IN'    => '1'
            ,'HL'     => '2'
            ,'PU'     => '2'
            ,'SE'     => '2'
            ,'IT'    => '3'
            ,'DY'    => '3'
            ,'DL'    => '4'
        ]   
    ]
    ,'estafeta' =>[
        'id'    => "2"
        ,'nombre'=>"ESTAFETA"
        ,'base_uri'  =>  env('ESTAFETA_BASEURI')
        ,'token_uri'    =>  env('ESTAFETA_TOKEN_URI')
        ,'api_key'  =>  env('ESTAFETA_APIKEY')
        ,'secret'   => env('ESTAFETA_SECRET')
        ,'servicio' => [
            '1'     => '70'
            ,'2'    => '60'
            ,'3'    => 'D0'
        ]
        ,'cred'     => [
            'suscriberId' => env('ESTAFETA_SUSCRIBERID')
            ,'customerNumber' => env('ESTAFETA_CUSTOMERNUMBER')
            ,'salesOrganization'=>env('ESTAFETA_SALESORGANIZATION')
        ]
        ,'rastreoEstatus' => [
            'ON_TRANSIT' => '3'
            ,'DELIVERED'=> '4'
        ]
        ,'rastreo' => [
            'suscriberId' => env('ESTAFETA_SUSCRIBERID_TRACKING')
            ,'login'=>env('ESTAFETA_LOGIN_TRACKING')
            ,'pswd'=>env('ESTAFETA_PSWD_TRACKING')
            ,'api_key'  =>  env('ESTAFETA_APIKEY_TRACKING') 
            ,'secret'   => env('ESTAFETA_SECRET_TRACKING')
            ,'base_uri'  =>  env('ESTAFETA_BASEURI_TRACKING')
            ,'servicio'  =>  env('ESTAFETA_SERVICIO_TRACKING')
        ]
    ]
    ,'redpack' =>[
        'id'    => "3"
        ,'nombre'=>"REDPACK"
        ,'base_uri_token'  =>  env('REDPACK_BASEURI_TOKEN')
        ,'client_id'  =>  env('REDPACK_CLIENT_ID')
        ,'client_secret'   => env('REDPACK_CLIENT_SECRET')
        ,'user'  =>  env('REDPACK_USER')
        ,'pass'   => env('REDPACK_PASS')
        ,'uri_documentation' => env('REDPACK_URI_DOCUMENTATION')
        ,'idClient' => env(REDPACK_IDCLIENT)
        ,'servicio' => [
            '1'     => '2'
            ,'2'    => '1'
            ,'3'    => '1'
        ]
        ,'rastreoEstatus' => [
            'ON_TRANSIT' => '3'
            ,'DELIVERED'=> '4'
        ]
        ,'rastreo' => [
            'suscriberId' => env('ESTAFETA_SUSCRIBERID_TRACKING')
            ,'login'=>env('ESTAFETA_LOGIN_TRACKING')
            ,'pswd'=>env('ESTAFETA_PSWD_TRACKING')
            ,'api_key'  =>  env('ESTAFETA_APIKEY_TRACKING') 
            ,'secret'   => env('ESTAFETA_SECRET_TRACKING')
            ,'base_uri'  =>  env('ESTAFETA_BASEURI_TRACKING')
            ,'servicio'  =>  env('ESTAFETA_SERVICIO_TRACKING')
        ]
    ]
    ,'dhl' =>[
        'id'    => "4"
        ,'nombre'=>"DHL"
        ,'base_uri'  =>  env('ESTAFETA_BASEURI')
        ,'token_uri'    =>  env('ESTAFETA_TOKEN_URI')
        ,'api_key'  =>  env('ESTAFETA_APIKEY')
        ,'secret'   => env('ESTAFETA_SECRET')
        ,'servicio' => [
            '1'     => '70'
            ,'2'    => '60'
            ,'3'    => 'D0'
        ]
        ,'cred'     => [
            'suscriberId' => env('ESTAFETA_SUSCRIBERID')
            ,'customerNumber' => env('ESTAFETA_CUSTOMERNUMBER')
            ,'salesOrganization'=>env('ESTAFETA_SALESORGANIZATION')
        ]
        ,'rastreoEstatus' => [
            'ON_TRANSIT' => '3'
            ,'DELIVERED'=> '4'
        ]
        ,'rastreo' => [
            'suscriberId' => env('ESTAFETA_SUSCRIBERID_TRACKING')
            ,'login'=>env('ESTAFETA_LOGIN_TRACKING')
            ,'pswd'=>env('ESTAFETA_PSWD_TRACKING')
            ,'api_key'  =>  env('ESTAFETA_APIKEY_TRACKING') 
            ,'secret'   => env('ESTAFETA_SECRET_TRACKING')
            ,'base_uri'  =>  env('ESTAFETA_BASEURI_TRACKING')
            ,'servicio'  =>  env('ESTAFETA_SERVICIO_TRACKING')
        ]
    ]

];