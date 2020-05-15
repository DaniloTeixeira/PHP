<?php 

function getAddress () {

    if (isset($_POST['cep'])){
        $cep = $_POST['cep'];

        $cep = filterCep ($cep);
        
        if (isCep ($cep)) {
            $response = getAdressViaCep($cep);
            $address = (object) [
                'cep' => $response->cep,
                'logradouro' => $response->logradouro,
                'bairro' => $response->bairro,
                'localidade' => $response->cidade,
                'uf' => $response->estado,
            ];
        } else {
            $address = addressEmpty();
            $address->cep = 'CEP inválido';
        }
    } else {
            $address = addressEmpty();
    }
    
    return $address;
}

function addressEmpty () {
    return (object) [
        'cep' => '',
        'logradouro' => '',
        'bairro' => '',
        'cidade' => '',
        'uf' => ''
    ];
}

function filterCep (String $cep):String {
    return preg_replace('/[^0-9]/','',$cep);
}

function isCep (String $cep):bool {
    return preg_match('/^[0-9]{5}-?[0-9]{3}$/',$cep);
}

function getAdressViaCep (String $cep) {
    $url = "https://api.postmon.com.br/v1/cep/{$cep}";
    return json_decode(file_get_contents($url));
}

// refatorando o código
// expressoes regulares