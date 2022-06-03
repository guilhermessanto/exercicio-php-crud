function pegarNota(){
    let nota1 = document.getElementById('primeira').value;
    let nota2 = document.getElementById('segunda').value;
    nota1 = parseFloat(nota1);
    nota2 = parseFloat(nota2);

    let resultado = ((nota1 + nota2)/2).toFixed(1);

    document.getElementById('media').value = resultado;
    situacaoNota = verSituacao(resultado);
   document.getElementById('situacao').value = novoResultado;
      
}

function verSituacao(resultado){
    if(resultado >= 7){
       novoResultado = "Aprovado";
    }else{
        novoResultado = "Reprovado";
    }
    return novoResultado;
}


