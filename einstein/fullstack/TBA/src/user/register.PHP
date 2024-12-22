<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifique se as chaves estão definidas no array $_POST
    $nomeDoTime = isset($_POST['nomedoTime']) ? $_POST['nomedoTime'] : '';
    $topo = isset($_POST['topo']) ? $_POST['topo'] : '';
    $eloTop = isset($_POST['eloTop']) ? $_POST['eloTop'] : '';
    $jg = isset($_POST['jg']) ? $_POST['jg'] : '';
    $eloJg = isset($_POST['eloJg']) ? $_POST['eloJg'] : '';
    $mid = isset($_POST['mid']) ? $_POST['mid'] : '';
    $eloMid = isset($_POST['eloMid']) ? $_POST['eloMid'] : '';
    $adc = isset($_POST['adc']) ? $_POST['adc'] : '';
    $eloAdc = isset($_POST['eloAdc']) ? $_POST['eloAdc'] : '';
    $sup = isset($_POST['sup']) ? $_POST['sup'] : '';
    $eloSup = isset($_POST['eloSup']) ? $_POST['eloSup'] : '';

    // Certifique-se de que todos os campos obrigatórios foram preenchidos
    if ($nomeDoTime && $topo && $eloTop && $jg && $eloJg && $mid && $eloMid && $adc && $eloAdc && $sup && $eloSup) {
        // Inserção no banco de dados
        $query = "INSERT INTO teams (nome_time, topo, elo_top, jungle, elo_jungle, mid, elo_mid, adc, elo_adc, suporte, elo_suporte) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssssss", $nomeDoTime, $topo, $eloTop, $jg, $eloJg, $mid, $eloMid, $adc, $eloAdc, $sup, $eloSup);
        
        if ($stmt->execute()) {
            echo "Time registrado com sucesso.";
        } else {
            echo "Erro ao registrar o time: " . $stmt->error;
        }
    } else {
        echo "Por favor, preencha todos os campos obrigatórios.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Registro de Time</title>
    <link rel="stylesheet" href="./register.CSS">
</head>
<body>
    <div class="container">
        <h1>Registrar Time</h1>
        <form method="post" action="">
            <label for="nomedoTime">Nome do Time</label>
            <input type="text" id="nomedoTime" name="nomedoTime" required>

            <label for="topo">Toplane</label>
            <input type="text" id="topo" name="topo" class="rota" required>

            <label for="eloTop">Elo Toplane</label>
            <select name="eloTop" id="eloTop" required>
                <option value="semranque">Unranked</option>
                <option value="ferro">Ferro</option>
                <option value="bronze">Bronze</option>
                <option value="prata">Prata</option>
                <option value="ouro">Ouro</option>
                <option value="platina">Platina</option>
                <option value="esmeralda">Esmeralda</option>
                <option value="diamante">Diamante</option>
                <option value="mestre">Mestre</option>
                <option value="graomestre">Grão-Mestre</option>
                <option value="desafiante">Desafiante</option>
            </select>

            <label for="jg">Jungle</label>
            <input type="text" id="jg" name="jg" class="rota" required>

            <label for="eloJg">Elo Jungle</label>
            <select name="eloJg" id="eloJg" required>
                <option value="semranque">Unranked</option>
                <option value="ferro">Ferro</option>
                <option value="bronze">Bronze</option>
                <option value="prata">Prata</option>
                <option value="ouro">Ouro</option>
                <option value="platina">Platina</option>
                <option value="esmeralda">Esmeralda</option>
                <option value="diamante">Diamante</option>
                <option value="mestre">Mestre</option>
                <option value="graomestre">Grão-Mestre</option>
                <option value="desafiante">Desafiante</option>
            </select>

            <label for="mid">Midlane</label>
            <input type="text" id="mid" name="mid" class="rota" required>

            <label for="eloMid">Elo Midlane</label>
            <select name="eloMid" id="eloMid" required>
                <option value="semranque">Unranked</option>
                <option value="ferro">Ferro</option>
                <option value="bronze">Bronze</option>
                <option value="prata">Prata</option>
                <option value="ouro">Ouro</option>
                <option value="platina">Platina</option>
                <option value="esmeralda">Esmeralda</option>
                <option value="diamante">Diamante</option>
                <option value="mestre">Mestre</option>
                <option value="graomestre">Grão-Mestre</option>
                <option value="desafiante">Desafiante</option>
            </select>

            <label for="adc">ADC</label>
            <input type="text" id="adc" name="adc" class="rota" required>

            <label for="eloAdc">Elo ADC</label>
            <select name="eloAdc" id="eloAdc" required>
                <option value="semranque">Unranked</option>
                <option value="ferro">Ferro</option>
                <option value="bronze">Bronze</option>
                <option value="prata">Prata</option>
                <option value="ouro">Ouro</option>
                <option value="platina">Platina</option>
                <option value="esmeralda">Esmeralda</option>
                <option value="diamante">Diamante</option>
                <option value="mestre">Mestre</option>
                <option value="graomestre">Grão-Mestre</option>
                <option value="desafiante">Desafiante</option>
            </select>

            <label for="sup">Suporte</label>
            <input type="text" id="sup" name="sup" class="rota" required>

            <label for="eloSup">Elo Suporte</label>
            <select name="eloSup" id="eloSup" required>
                <option value="semranque">Unranked</option>
                <option value="ferro">Ferro</option>
                <option value="bronze">Bronze</option>
                <option value="prata">Prata</option>
                <option value="ouro">Ouro</option>
                <option value="platina">Platina</option>
                <option value="esmeralda">Esmeralda</option>
                <option value="diamante">Diamante</option>
                <option value="mestre">Mestre</option>
                <option value="graomestre">Grão-Mestre</option>
                <option value="desafiante">Desafiante</option>
            </select>

            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
