<?php header('Content-Type: text/html; charset=ISO-8859-1',true) ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html>
    
<head>    
<?php require("../pcvginc/pcvgTAGMETA01.inc") ?>   
<?php require("../pcvginc/pcvgTAGTITLELINK01.inc") ?>
<script language="JavaScript" type="text/JavaScript" src="../pcenajax/pcenajaxbib1.js">
</script>
<script language="JavaScript" type="text/JavaScript" src="../pjsgeral/jsgeral01AA.js">
</script>
<script language="JavaScript" type="text/JavaScript" src="../pcenjs/jscen01.js">
</script>
<script language="JavaScript" type="text/JavaScript" src="../pcenjs/js001_acessarAA.js">
</script>
</head>

<body onload="f001_IniciarTela();" bgcolor="#E6EAE9" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php require("../pcvginc/pcvgCABEC02.inc") ?>
<center><b class="texto-azul">CVG<i>web</i>  - Tela de Acesso - Data de Hoje: <font color='#FF0000'><?php print_r(date("d/m/Y")); ?></font></b></center>
    
<?php require ("pcvgacessar-tela.inc") ?>
<p>
<?php require ("../pcvginc/pcvgRODAPE01.inc") ?>
  
</html>
