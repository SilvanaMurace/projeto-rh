function showUserData(str) {
  // texto a mostrar enquanto a consulta à base de dados é executada
  document.getElementById("ds_endereco").innerHTML="a carregar...";
  if (str=="") {
    // se não um id a procurar limpamos o texto do país
    document.getElementById("ds_endereco").innerHTML="";
    return;
  }
  // testamos a compatibilidade do objecto XMLHttpRequest consoante o browser
  // e iniciamos o objecto XMLHttpRequest
  if (window.XMLHttpRequest) {
    // compatibilidade com IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // compatibilidade com for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  // quando temos dados devolvidos pelo objecto XMLHttpRequest
  // mostramos esse texto no elemento html txtPais
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("ds_endereco").value=xmlhttp.responseText;
    }
  }
  // invocamos o pedido ao nosso ficheiro getuserdata.php usando método GET
  // passando no parametro o id do utilizador escolhido na lista.

  xmlhttp.open("GET","busca_end.php?param="+str,true);
  xmlhttp.send();
}