<?php
    include_once('consulta.php');
   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumindo API</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <select name="api" id="api">
            <option value="viacep">Via CEP</option>
            <option value="postmon">Postmon</option>
            <option value="cepaberto">CEP aberto</option>
        </select>
        <p>Digite o CEP para encontrar o endereço.</p>
        <input type="text" placeholder="Digite um cep..." name="cep" value="<?php echo $address->cep ?? ''?>">  
        <input type="submit">
        <input type="text" placeholder="rua" name="rua" value="<?php echo $address->logradouro ?? ''?>">
        <input type="text" placeholder="bairro" name="bairro" value="<?php echo $address->bairro ?? ''?>">
        <input type="text" placeholder="cidade" name="cidade" value="<?php echo $address->localidade ?? $address->cidade ?? ''?>">
        <input type="text" placeholder="estado" name="estado" value="<?php echo $address->uf ?? $address->estado ?? ''?>">
    </form>
</body>
</html>