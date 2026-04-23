<?php header('Content-Type: text/html; charset=ISO-8859-1',true) ?>

<?php require("../pcvgutil/pcvgutil01.php") ?>
<?php require("../pcvgdb/pcvgdb_mysql.php") ?>

<?php

//=================================================================================//
// DAO001 - Rotinas de acesso a dados                                              //
//=================================================================================//

//---------------------------------------------------------------------------------//
//====> fdao000 (pegar Data/Hora do Sistema)                                       //
//---------------------------------------------------------------------------------//
function fdao000_Pegar_Data_Hora_Do_Sistema() {
    $vDataRelat  = date("d/m/Y");
    $vHoraRelat  = date("H:i");
//---
    $vDados  = "";
    $vDados .= "[[DATASISTEMA]]" . $vDataRelat . "[[/DATASISTEMA]]";
    $vDados .= "[[HORASISTEMA]]" . $vHoraRelat . "[[/HORASISTEMA]]";
    
   echo $vDados;
   
}

//---------------------------------------------------------------------------------//
//====> fdao000 (acesso ao banco usado no sistema)                                 //
//---------------------------------------------------------------------------------//
function fdao000_Usuario_Existe($aNickUsr, $aSenha) {
   $vDados    = "";
   $vObjConn  = new CDBmysql();

//---> Parâmetros para o SQL...
//===> Formato:  Campo de select  @  alias do campo de select  #  Meu XML   
   $vSelectAliasMeuXML[0]  = "T000b.D_TIPOUSR    @ vTIPOUSR    # TIPOUSR"; 
   $vSelectAliasMeuXML[1]  = "T000b.D_PERFILUSR  @ vPERFILUSR  # PERFILUSR"; 
   $vSelectAliasMeuXML[2]  = "T000b.D_NICKUSR    @ vNICKUSR    # D_NICKUSR"; 
   $vSelectAliasMeuXML[3]  = "T000b.D_SENHAUSR   @ vSENHAUSR   # SENHAUSR"; 
   $vSelectAliasMeuXML[4]  = "T000b.D_OBSUSR     @ vOBSUSR     # OBSUSR"; 
   $vFrom      = " CVGD000bUsuarioCVG T000b";
   $vWhere     = " upper(D_NICKUSR) = upper('" . $aNickUsr . "') ";
   $vOrderBy   = "";
   $vSQL       = ""; 
//---> Função DAO para acessar o BD...   
   $vDados = $vObjConn->fGetDados01($vSelectAliasMeuXML, $vFrom, $vWhere, $vOrderBy);  

   
//---> Devolver dados com "formato" MeuXML... 
   echo $vDados;
}

