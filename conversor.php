<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requestData = file_get_contents('php://input');
    $postData = json_decode($requestData, true);

    if (isset($postData["anosluz"])) {
        $anosluz = $postData["anosluz"];
        
        if ($anosluz >= 1) {
            $quilometros = $anosluz * 9.461 * pow(10, 12);
            $response = ["result" => $quilometros];
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $mensagem = "invalido";
            $response = ["result" => $mensagem];
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    } elseif (isset($postData["km"])) {
        $quilometros = $postData["km"];
        
        if ($quilometros >= 1) {
            
            $anosluz = $quilometros / (9.461 * pow(10, 12));

            $response = ["result" => $anosluz];
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $mensagem = "invalido";
            $response = ["result" => $mensagem];
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    } else {
        header("HTTP/1.0 400 Bad Request");
        echo "Campo 'anosluz' ou 'km' não encontrado nos dados da solicitação.";
    }
} else {
    header("HTTP/1.0 400 Bad Request");
    echo "Solicitação inválida";
}
?>
