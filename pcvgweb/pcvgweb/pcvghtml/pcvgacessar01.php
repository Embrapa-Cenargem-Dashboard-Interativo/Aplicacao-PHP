<?php header('Content-Type: text/html; charset=ISO-8859-1',true) ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<?php

//---> Opção de entrada nesta página...
$vGet           = filter_input_array(INPUT_GET, FILTER_DEFAULT); // segurança contra injection 24/06/2020
$vOpcao         = $vGet['op'];
$vTipo_lido_get = $vGet['tipo'];

if ($vOpcao == "inicio") {
   session_start();     // tem que estar "ligada" para destruir
   session_destroy(); 
   $_SESSION = array(); // Clears the $_SESSION variable
}

include('../pcvghtml/pcvgObjSessao.php'); 
session_start();
if ( (isset($_SESSION['gObjSessaoUsr'])) && ($vOpcao !== "inicio") ) {
//---> Chegou na página através de Retornar ao menu ?    
   $vNickUsr           = $_SESSION['gObjSessaoUsr']->fGetNickUsr(); 
   $vNomePessoa        = $_SESSION['gObjSessaoUsr']->fGetNomePessoa();
   $vPerfilUsr         = $_SESSION['gObjSessaoUsr']->fGetPerfilUsr();
   $vIdPessoa          = $_SESSION['gObjSessaoUsr']->fGetIdPessoa();
   $vEmail1Usr         = $_SESSION['gObjSessaoUsr']->fGetEmail1Usr();
}  
else {
//---> Chegou na página através da digitação usr/senha ?    
   $vPost              = filter_input_array(INPUT_POST, FILTER_DEFAULT); // segurança contra injection 24/06/2020
   $vNickUsr           = $vPost['txtNickUsr'];
   $vNomePessoa        = $vPost['txtNomePessoa'];
   $vPerfilUsr         = $vPost['txtPerfilUsr'];
   $vIdPessoa          = $vPost['txtIdPessoa'];
   $vEmail1Usr         = $vPost['txtEmail1Usr'];
}

//---> crítica de autenticação da primeira página... 
if ( ($vIdPessoa != -1)  && ($vNickUsr != "") && 
     ($vNomePessoa != "") && ($vPerfilUsr != "") )  {
//---> instantiate a new instance of the class 
   $_SESSION['gObjSessaoUsr']= new CObjSessao;
//---> Preenche os valores do usuário...    
   $_SESSION['gObjSessaoUsr']->fSetNickUsr($vNickUsr);
   $_SESSION['gObjSessaoUsr']->fSetNomePessoa($vNomePessoa);
   $_SESSION['gObjSessaoUsr']->fSetPerfilUsr($vPerfilUsr);
   $_SESSION['gObjSessaoUsr']->fSetIdPessoa($vIdPessoa);
   $_SESSION['gObjSessaoUsr']->fSetEmail1Usr($vEmail1Usr);
   $vDataHoje         = date('d/m/Y', time());
   $vDataHojeAAAAMMDD = substr($vDataHoje,6,4) . substr($vDataHoje,3,2) . substr($vDataHoje,0,2);  
   $_SESSION['gObjSessaoUsr']->fSetDataHoje($vDataHoje);
   $_SESSION['gObjSessaoUsr']->fSetDataHojeAAAAMMDD($vDataHojeAAAAMMDD);
    
?>
   <html>
     <?php  
         if ($vTipoTela == 1) {
            require("../pceninc/pcenCABEC06.inc"); // para funcionário da Embrapa
         }
         else {
            require("../pceninc/pcenCABEC09.inc");  // para colaboradores...
         }
     
//------> Título da sessão...   
         $vAux  = "<center><b class='texto-azul'>";
         $vAux .= "Acessar ";
         $vAux .= " - Usuário: <font color='#FF0000'>"  . $_SESSION['gObjSessaoUsr']->fGetNickUsr() . "</font>";
         $vAux .= " - Nome Completo: <font color='#FF0000'>" . $_SESSION['gObjSessaoUsr']->fGetNomePessoa() . "</font>";
         $vAux .= " - Data de Hoje: <font color='#FF0000'>"  . $_SESSION['gObjSessaoUsr']->fGetDataHoje() . "</font>";
         $vAux .= "</b></center><p>";           
         echo $vAux;
      ?>   
       
    <?php require ("../pcvginc/pcvgRODAPE01.inc") ?>  
   </html>
<?php
}
else {
   session_destroy(); 
   require ("../pcvginc/pcvgvaparahome.inc") ;
}   
?>

