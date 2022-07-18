<script type="text/javascript">

function showUserData(str,campo) {

  // texto a mostrar enquanto a consulta à base de dados é executada
  document.getElementById(campo).innerHTML="a carregar...";
  if (str=="") {
    // se não um id a procurar limpamos o campo
    document.getElementById(campo).innerHTML="";
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
  // mostramos esse texto no elemento html 
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById(campo).value=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET",str,true);
  xmlhttp.send();
}
</script>  