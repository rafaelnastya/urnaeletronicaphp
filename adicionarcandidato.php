<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcao_voto = $_POST["opcao_voto"];
    $total_votos = 0;

    $sql = "INSERT INTO opcao_voto (opcao, total_votos) VALUES ('$opcao_voto', $total_votos)";

    if (mysqli_query($con, $sql)) 
    {
        echo "<h1>Novo candidato adicionado.</h1>";
    } 
    else 
    {
        echo "<h1>Erro ao adicionar novo candidato.: " . mysqli_error($con) . "</h1>";
    }
}
?>

<form method="post">
    <div class="container">
    <label for="opcao_voto">Nome do novo candidato:</label></br>
    <input type="text" id="text" name="opcao_voto" required></br>
    <input type="submit" id="submit" value="Adicionar">
</div>
</form>

<style>
#submit{width: 100px; height: 50px;}
#submit:hover{border-radius: 10px; cursor: pointer; background-color: gray;}
.container{text-align: center; justify-content: center; flex-direction: row; align-items: center;}
#text{font-family: 'Trocchi', serif; width: 200px; height: 30px; font-size: 25px;}
p{position: end;}
h1{text-align: center; color: #7c795d; font-family: 'Trocchi', serif; font-size: 45px; font-weight: normal;}
a{position: absolute; bottom: 0;}
</style>

<?php
mysqli_close($con);
echo "<h1><a href='index.php'>VOLTAR</a></h1>";
?>