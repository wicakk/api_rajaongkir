<?php

namespace App\Controllers;

class Main extends BaseController
{
    public $api_key = "a8945a801e19d0cc79c50eebf617c260";
    
    public function index(): string
    {
        // menampilkan data kota dari raja ongkir 
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ".$this->api_key,
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        // echo "cURL Error #:" . $err;
        $data['kota'] = array('error' =>true);
        $data['hasil'] = array('error' =>true);
        } else {
        // echo $response;
        $data['kota'] = json_decode($response);
        $data['hasil'] = json_decode($response);
        }

        // print_r($data['kota']);
        return view('home', $data);
    }

    // cek ongkir
    public function cek(){
        $asal_kota = $this->request->getPost('asal');
        $tujuan_kota = $this->request->getPost('tujuan');
        $berat = $this->request->getPost('berat');
            
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=".$asal_kota."&destination=".$tujuan_kota."&weight=".$berat."&courier=jne",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: ".$this->api_key,
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $data['hasil'] = array('error' =>true);
        // echo "cURL Error #:" . $err;
        } else {
            $data['hasil'] = json_decode($response);
        // echo $response;
        }
        // print_r($data['hasil']);
        return view('hasil',$data);
    }
}
