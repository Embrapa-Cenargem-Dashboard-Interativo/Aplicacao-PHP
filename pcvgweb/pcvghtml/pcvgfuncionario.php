<?php header('Content-Type: text/html; charset=ISO-8859-1',true) ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<?php
//---> include the class file
include('../pcvghtml/pcvgObjSessao.php'); 
session_start();
if (isset($_SESSION['gObjSessaoUsr'])) {
   $vNickUsr           = $_SESSION['gObjSessaoUsr']->fGetNickUsr(); 
   $vNomePessoa        = $_SESSION['gObjSessaoUsr']->fGetNomePessoa();
   $vPerfilUsr         = $_SESSION['gObjSessaoUsr']->fGetPerfilUsr();
   $vIdPessoa          = $_SESSION['gObjSessaoUsr']->fGetIdPessoa();
   $vEmail1Usr         = $_SESSION['gObjSessaoUsr']->fGetEmail1Usr();
}  
else {
   $vNickUsr           = "";
   $vNomePessoa        = "";
   $vPerfilUsr         = "";       
   $vIdPessoa          = -1;
   $vEmail1Usr         = "";
}

//---> crítica de autenticação da primeira página... 
if ( ($vIdPessoa != -1)  && ($vNickUsr != "") && 
     ($vNomePessoa != "") && ($vPerfilUsr != "") )  {    
?>
   <html>       
     <head>    
     <?php require("../pcvginc/pcvgTAGMETA01.inc") ?>
     <?php require("../pcvginc/pcvgTAGTITLELINK01.inc") ?>

     <link rel="stylesheet" type="text/css" media="screen,projection" href="../pcvgcss/css_pcvgmenu01.css" />
     <link rel="stylesheet" type="text/css" media="screen,projection" href="../pcvgcss/geral.css">

     <script language="JavaScript" type="text/JavaScript" src="../pcvgajax/pcvgajaxbib1.js">
     </script>
     <script language="JavaScript" type="text/JavaScript" src="../pjsgeral/pjsgeral01.js">
     </script>
     <script language="JavaScript" type="text/JavaScript" src="../pcvgjs/jscvg01.js">
     </script>
     <script language="JavaScript" type="text/JavaScript" src="../pcvgjs/js002_funcionarioH.js">      
     </script>         

     <?php
       //----------------------------------------------------------------------//
       // Script com valores do usuário da sessão... para uso em Javascript... //
       //----------------------------------------------------------------------//
       $vAux  = "<script>";
       $vAux .= "gIdUsr = "             . $_SESSION['gObjSessaoUsr']->fGetIdPessoa()         . ";";   
       $vAux .= "gNickUsr = '"          . $_SESSION['gObjSessaoUsr']->fGetNickUsr()          . "';";
       $vAux .= "gNomeUsr = '"          . $_SESSION['gObjSessaoUsr']->fGetNomePessoa()       . "';";
       $vAux .= "gPerfilUsr = '"        . $_SESSION['gObjSessaoUsr']->fGetPerfilUsr()        . "';";
       $vAux .= "gEmail1Usr = '"        . $_SESSION['gObjSessaoUsr']->fGetEmail1Usr()        . "';";
       $vAux .= "gDataHoje = '"         . $_SESSION['gObjSessaoUsr']->fGetDataHoje()         . "';";
       $vAux .= "gDataHojeAAAAMMDD = '" . $_SESSION['gObjSessaoUsr']->fGetDataHojeAAAAMMDD() . "';";
       $vAux .= "</script>";
       echo($vAux); 
     ?>        
     </head>       
     <body onload="f002_IniciarTela();" bgcolor="#E6EAE9" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
     <?php require("../pcvginc/pcvgCABEC05.inc") ?>
     <?php  
//------> Título da sessão...   
         $vAux  = "<center><b class='texto-azul'>";
         $vAux .= "Funcionário";
         $vAux .= " - Usuário: <font color='#FF0000'>"  . $_SESSION['gObjSessaoUsr']->fGetNickUsr() . "</font>";
         $vAux .= " - Nome Completo: <font color='#FF0000'>" . $_SESSION['gObjSessaoUsr']->fGetNomePessoa() . "</font>";
         $vAux .= " - Data de Hoje: <font color='#FF0000'>"  . $_SESSION['gObjSessaoUsr']->fGetDataHoje() . "</font>";
         $vAux .= "</b></center><p>";           
         echo $vAux;
     ?>   
     <?php require ("pcvgfuncionario-tela.inc") ?>
     <p>         
     <?php require ("../pcvginc/pcvgRODAPE01.inc") ?>
   </html>
<?php
}
else {
   session_destroy(); 
   require ("../pcvginc/pcvgvaparahome.inc") ;
}   
?>

