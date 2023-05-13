<?php
include 'conexao.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM opcao_voto WHERE id = $id";

    if (mysqli_query($con, $sql)) {
        echo "<h1>Candidato excluído com sucesso.</h1>";
    } else {
        echo "<h1>Erro ao excluir candidato: " . mysqli_error($con) . "</h1>";
    }
} else {
    echo "ID do candidato não especificado.";
}
echo "<h1><a href='index.php'>VOLTAR</a></h1>";
mysqli_close($con);
?>
<form method="get">
    <div class="container">
    <label for="id">ID do candidato a ser deletado:</label></br>
    <input type="text" id="id" name="id" required></br>
    <input type="submit" id="submit" value="Excluir">
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