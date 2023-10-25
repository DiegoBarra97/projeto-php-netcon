<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Projeto PHP Netcon</title>
  <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<div class="main">
    <div class="anosluz">

        <form action="">

            <label for="">ANOS-LUZ: </label>
            <input id="input_anosluz" type="number" name="input_anosluz" placeholder="Entre com o valor aqui em anos-luz">
            <br>
            <button id="btn_converter_anosluz" onclick="converter_anosluz_km();" type="button">
                Converter
            </button>

            <br>
            <br>
            
            <span id="conversao_anosluz_km">
            Clique em converter para ver o resultado
            </span>

        </form>

    </div>



    <div class="km">

        <form action="">

            <label for="">KM: </label>
            <input id="input_km" type="number" name="input_km" placeholder="Entre com o valor aqui em km">
            <br>
            <button style="text-align:center" id="btn_converter_km"  onclick="converter_km_anosluz();" type="button">
                 Converter
            </button>

            <br>
            <br>

            <span id="conversao_km_anosluz">
                Clique em converter para ver o resultado
            </span>

        </form>
    </div>


</div>

</body>
</html>

<script>
function converter_anosluz_km() {
    const anosluzValue = document.getElementById('input_anosluz').value;
    fetch('conversor.php', {
        method: 'POST',
        body: JSON.stringify({ anosluz: anosluzValue }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erro na solicitação AJAX.');
        }
        return response.json();
    })
    .then(data => {
        if(data.result=="invalido"){
            alert("O valor de Anos Luz deve ser maior ou igual a 1");
        }else{
            document.getElementById('conversao_anosluz_km').textContent = data.result;
        }

    })
    .catch(error => {
        console.error('Ocorreu um erro na chamada AJAX: ', error);
        document.getElementById('conversao_anosluz_km').textContent = response.text();
    });
}

function converter_km_anosluz() {
    const kmValue = document.getElementById('input_km').value;
    fetch('conversor.php', {
        method: 'POST',
        body: JSON.stringify({ km: kmValue }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erro na solicitação AJAX.');
        }
        return response.json();
    })
    .then(data => {
        if(data.result=="invalido"){
            alert("O valor de KM deve ser maior ou igual a 1");
        }else{
            document.getElementById('conversao_anosluz_km').textContent = data.result;
        }
    })
    .catch(error => {
        console.error('Ocorreu um erro na chamada AJAX: ', error);
        document.getElementById('conversao_km_anosluz').textContent = 'Erro na conversão.';
    });
}
</script>

