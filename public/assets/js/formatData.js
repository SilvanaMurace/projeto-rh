function validaDat(campo,valor) {
	var date=valor;
	var ardt=new Array;
	var ExpReg=new RegExp("(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/[12][0-9]{3}");
	ardt=date.split("/");
	erro=false;

 	if ( date.search(ExpReg)==-1){
		erro = true;
		}
	else if (((ardt[1]==4)||(ardt[1]==6)||(ardt[1]==9)||(ardt[1]==11))&&(ardt[0]>30))
		erro = true;
	else if ( ardt[1]==2) {
		if ((ardt[0]>28)&&((ardt[2]%4)!=0))
			erro = true;
		if ((ardt[0]>29)&&((ardt[2]%4)==0))
			erro = true;
	}
	if (erro) {
		alert(valor + " não é uma data válida!!!");
		campo.focus();
		campo.value = "";
		return false;
	}
	return true;
}

function FormataData(Campo, teclapres)
{
 var tecla = teclapres.keyCode;
 var vr = new String(Campo.value);
 vr = vr.replace("/", "");
 vr = vr.replace("/", "");
 tam = vr.length + 1;

 if (tecla != 9 && tecla != 8)
 {
 if (tam > 2 && tam < 5)
 Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, tam);
 if (tam >= 5 && tam <=10)
 Campo.value = vr.substr(0,2) + '/' + vr.substr(2,2) + '/' + vr.substr(4,4);

 }
}

function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
     documento.value += texto.substring(0,1);
  }
}


function validaCPF(reg)
  {
    var numeros, digitos, soma, i, resultado, digitos_iguais;
    var cpfatu = reg.value;
    var cpf = new String(reg.value);

    cpf = cpf.replace(/[.]/g,"");
    cpf = cpf.replace(/-/g,"");

    reg.value = "";
    digitos_iguais = 1;
    if (cpf.length < 11)
          return false;
    for (i = 0; i < cpf.length - 1; i++)
          if (cpf.charAt(i) != cpf.charAt(i + 1))
                {
                digitos_iguais = 0;
                break;
                }
    if (!digitos_iguais)
          {
          numeros = cpf.substring(0,9);
          digitos = cpf.substring(9);
         soma = 0;
          for (i = 10; i > 1; i--)
                soma += numeros.charAt(10 - i) * i;
          resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
          if (resultado != digitos.charAt(0))
                return false;
          numeros = cpf.substring(0,10);
          soma = 0;
          for (i = 11; i > 1; i--)
                soma += numeros.charAt(11 - i) * i;
          resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
          if (resultado != digitos.charAt(1))
                return false;
          reg.value = cpfatu;
          return true;
          }
    else
        return false;
  }


