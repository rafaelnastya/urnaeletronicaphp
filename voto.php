<html>
<head>
    <title>URNA ELETRÔNICA</title>
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>
</head>
<body>

    <div id="urna"> 
        <button onclick="adicionarNumero(1)">1</button>
        <button onclick="adicionarNumero(2)">2</button>
        <button onclick="adicionarNumero(3)">3</button></br>
        <button onclick="adicionarNumero(4)">4</button>
        <button onclick="adicionarNumero(5)">5</button>
        <button onclick="adicionarNumero(6)">6</button></br>
        <button onclick="adicionarNumero(7)">7</button>
        <button onclick="adicionarNumero(8)">8</button>
        <button onclick="adicionarNumero(9)">9</button></br>
        <button onclick="adicionarNumero(0)">0</button></br></br>
        <button id="wh" onclick="votoBranco()">BRANCO</button>
        <button id="cr" onclick="limparCaixaTexto()">CORRIGE</button>
    </div>
    <style>
        h1{text-align: center; color: #7c795d; font-family: 'Trocchi', serif; font-size: 45px; font-weight: normal;}
        a{ font-size: 30px; position: relative;}
        table {position: relative; border-collapse: collapse; margin: auto; right: 710px;}
        #cn{background-color: #008000; color: black; font-size: 15px; width: 100px; height: 80px; padding-top: 10px; position: absolute; left: 695px; bottom: 400px; } 
        #opcao_voto{position: fixed; width: 500px; height: 350px; font-size: 50px; text-align: center; bottom: 400px; right: 600px;}
    </style>
</body>
</html>

<?php
include 'conexao.php';

//inserir +1 voto
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $opcao_voto = $_POST["opcao_voto"];
        
            $sql = "UPDATE opcao_voto SET total_votos = total_votos + 1 WHERE id = $opcao_voto";
        
            if (mysqli_query($con, $sql)) 
            {
                echo "<h1>Voto registrado com sucesso!</h1>";
            } 
            else 
            {
                echo "Erro ao registrar voto:" . mysqli_error($con);
            }
        }
//ao clicar, executar a ação acima ^
        $sql = "SELECT * FROM opcao_voto";
        $resultado = mysqli_query($con, $sql);
        
        if (mysqli_num_rows($resultado) > 0) 
        {
            echo "<form method='post'>";
            echo "<input type='text' id='opcao_voto' name='opcao_voto' maxlength='2' readonly>";
            echo "<br><br><input type='submit' id='cn' value='CONFIRMA'>";
            echo "</form>";
        } 
        else 
        {
            echo "Nenhuma opção de voto encontrada.";
        }
//mostrar candidatos
        $sql = "SELECT * FROM opcao_voto";
        $resultado = mysqli_query($con, $sql);

if (mysqli_num_rows($resultado) > 0) 
{
    echo "<table><tr><th>ID</th><th>Candidato</th><th>Total de Votos</th></tr>";
    while($row = mysqli_fetch_assoc($resultado)) 
    {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["opcao"] . "</td><td>" . $row["total_votos"] . "</td></tr>";
    }
    echo "</table>";
} 
else 
{
    echo "Nenhuma opção de voto encontrada.";
}

echo "<a href='adicionarcandidato.php'>Adicionar Candidatos</a></br>";
echo "<a href='excluircandidato.php'>Apagar candidato</a>";

    mysqli_close($con);
?>