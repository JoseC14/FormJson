<?php
//conecta com o banco
//usar PDO, mysqli é antigo e pode entrar em desuso
// $mysqli = new mysqli('localhost', 'root', '', 'json_test');
// if ($mysqli->connect_errno  != 0) {
//     echo $mysqli->connect_error;
// }

include_once("Class/Conexao.php");
include_once("Class/Crud.php");
//convertendo os dados do form para json
if (isset($_POST['submit'])) {

    $new_message = array(

        "desc" => $_POST['desc'],
        "client" => $_POST['client'],
        "cpf" => $_POST['cpf']
    );

    if (filesize("Result_json/messages.json") == 0) {

        $first_record = array($new_message);

        $data_to_save = $first_record;
    } else {

        $old_records = json_decode(file_get_contents("Result_json/messages.json"), JSON_OBJECT_AS_ARRAY);

        array_push($old_records, $new_message);

        $data_to_save = $old_records;
    }

    if (!file_put_contents("Result_json/messages.json", json_encode($data_to_save, JSON_PRETTY_PRINT), LOCK_EX)) {

        $success = "Dados inseridos com sucesso!";
    } else {

        $error = "Erro encontrado, tente novamente!!";
    }

    
    $obj = new Crud($conn);

    foreach($data_to_save as $data){
        $obj->setDados($data['desc'],$data['client'],$data['cpf']);
        $obj->insertDados();
    }
    

    
    //inserindo o json no banco
    // $stmt = $mysqli->prepare(
    //     "INSERT INTO teste (descricao, cliente, cpf) 
    //  VALUES (?,?,?)"
    // );
    // $stmt->bind_param("sss", $descricao, $cliente, $cpf);

    // $inserted_rows = 0;
    // foreach ($data_to_save as $data) {
    //     $descricao = $data["desc"];
    //     $cliente = $data["client"];
    //     $cpf = $data["cpf"];

    //     $stmt->execute();
    //     $inserted_rows++;
    // }

    /*if (count($data_to_save) == $inserted_rows) {
    echo "<div class=\"json\">Dados inseridos com sucesso</div>";
    }else{
    echo "<div class=\"json\">error</div>";
    }*/

   
//     mysqli_query($mysqli,"SELECT * FROM teste");
// ;
//     // update dos dados json no banco
//     $sql = "update teste set
//     descricao = '" . $descricao . "', cliente = '" . $cliente . "',cpf = '" . $cpf . "'
//     where cpf = " . $cpf;

//     if (mysqli_query($mysqli, $sql)) {
//         $msg = "Atualizado com sucesso!";
//     } else {
//         $msg = "Erro ao atualizar!";
//     }
//     mysqli_close($mysqli);


    //excluindo os dados do arquivo json para não sobescrever os dados no banco
    if (isset($_POST['submit'])) {

        $cpf = $_POST['cpf'];

        if (empty($cpf)) return;

        $posts = json_decode(file_get_contents('Result_json/messages.json'));

        foreach ($posts as $key => $post) {
            if ($post->cpf == $cpf) {
                unset($posts[$key]);
            }
            $save = json_encode($posts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            file_put_contents('Result_json/messages.json', $save);
        }
    }
}

//funciona, porém ele sobreescreve os dados anteriores, obs: é igual o de cima, só que o código é menor kkkkkkkk :(
//percorrendo os dados do json;
/*foreach ((array)$data_to_save as $data) {
 
    $query = "INSERT INTO teste (descricao, cliente, cpf) VALUES ('".$data['desc']."', '".$data['client']."', '".$data['cpf']."')";

    mysqli_query($mysqli, $query);
}*/


//deve funcionar, porém eu não tenho a menor ideia de como boba fazer isso funciona kkkkkjk
//Inserindo o json no banco

/*$json= json_encode($data_to_save);

$curl = curl_init();

curl_setopt_array($curl,[
    CURLOPT_URL=>"http://localhost/WebServiceInfo/Result_json/messages.json",
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $json,
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_POST=>true,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json', 
        'Content-Length: '.strlen($json)
    ],
    CURLOPT_HEADER=>true,
    CURLOPT_RETURNTRANSFER=> true
    ]);
try {
   $response = curl_exec($curl);
   $consulta = "INSERT INTO teste (descricao,cliente,cpf) VALUES ('$response');";
} catch (Exception $e) {
    echo $e;
}*/


