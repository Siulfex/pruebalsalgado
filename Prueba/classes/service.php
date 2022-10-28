<?php 
// @autor: Luis Salgado 28/10/2022 
//Este archivo se encarga de conectarse a la api, obtener los datos necesarios para el login y retornar los datos solicitados
    $action = $_POST['Accion'];
    if($action == "Obtener"){
        //Se obtiene el token del usaurio para realizar el login mediante curl
        $urlToken = "https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php?operation=getchallenge&username=prueba"; 
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $urlToken,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        //se convierte la respuesta a json para extraer el dato necesario.
        $data = json_decode($response,true);
        curl_close($curl);
        $token = $data['result']['token'];

        //Se realiza el login para obtener el session id
        $urlLogin = "https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php";
        $curl = curl_init();
        $tokenmd5 = md5($token.'3DlKwKDMqPsiiK0B');
        curl_setopt_array($curl, array(
        CURLOPT_URL => $urlLogin,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'operation=login&username=prueba&accessKey='.$tokenmd5,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
        ),
        ));

        $response = curl_exec($curl);
        //se convierte la respuesta a json para extraer el dato necesario.
        $data = json_decode($response,true);
        curl_close($curl);
        $session = $data['result']['sessionName'];

        //Se traen los datos de los contactos y se retornan
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php?operation=query&sessionName='.$session.'&query=select%20*%20from%20Contacts;',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        $data = json_decode($response,true);
        curl_close($curl);
        //Retorno los datos
        echo $response;
    }
?>