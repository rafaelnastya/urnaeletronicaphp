function adicionarNumero(num) 
{
    var numeros = document.getElementById("opcao_voto");
        if (numeros.value.length < 2) {
          numeros.value += num;
        }
}
function limparCaixaTexto() 
{
    document.getElementById("opcao_voto").value = "";
}

function votoBranco()
{
    var delet = document.getElementById("opcao_voto").value = "";
    alert("Obrigado por votar.", delet);
}