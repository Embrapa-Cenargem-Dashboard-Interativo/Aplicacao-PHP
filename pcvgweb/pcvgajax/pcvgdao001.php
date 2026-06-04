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
   $i = -1;
   $i++; $vSelectAliasMeuXML[$i]  = "T001.D_IDFUNC     @ vIDFUNC      # IDFUNC"; 
   $i++; $vSelectAliasMeuXML[$i]  = "T001.D_MATRFUNC   @ vMATRFUNC    # MATRFUNC"; 
   $i++; $vSelectAliasMeuXML[$i]  = "T001.D_NOMEFUNC   @ vNOMEFUNC    # NOMEFUNC"; 
   $i++; $vSelectAliasMeuXML[$i]  = "T001.D_EMAILFUNC  @ vEMAILFUNC   # EMAILFUNC"; 
   $i++; $vSelectAliasMeuXML[$i]  = "T001.D_IDCARGO    @ vIDCARGO     # IDCARGO"; 
   $i++; $vSelectAliasMeuXML[$i]  = "T002.D_DESCCARGO  @ vDESCCARGO   # DESCCARGO"; 
   $i++; $vSelectAliasMeuXML[$i]  = "T001.D_TIPOUSR    @ vTIPOUSR     # TIPOUSR"; 
   $i++; $vSelectAliasMeuXML[$i]  = "T001.D_PERFILUSR  @ vPERFILUSR   # PERFILUSR"; 
   $i++; $vSelectAliasMeuXML[$i]  = "T001.D_NICKUSR    @ vNICKUSR     # NICKUSR"; 
   $i++; $vSelectAliasMeuXML[$i]  = "T001.D_SENHAUSR   @ vSENHAUSR    # SENHAUSR"; 
   $i++; $vSelectAliasMeuXML[$i]  = "T001.D_OBSUSR     @ vOBSUSR      # OBSUSR"; 
   $vFrom      = " CVGD001Funcionario T001";
   $vFrom     .= " left join CVGD002Cargo T002     on T002.D_IDCARGO = T001.D_IDCARGO ";
   $vWhere     = " upper(D_NICKUSR) = upper('" . $aNickUsr . "') ";
   $vOrderBy   = "";
   $vSQL       = ""; 
//---> Função DAO para acessar o BD...   
   $vDados = $vObjConn->fGetDados01($vSelectAliasMeuXML, $vFrom, $vWhere, $vOrderBy);  

   
//---> Devolver dados com "formato" MeuXML... 
   echo $vDados;
}

//---------------------------------------------------------------------------------//
//====> fdao001_Listar_Cargo                                                       //
//------------fdao001_Listar-------------------------------------------------------//
function fdao001_Listar_Cargo($aIdCargo, $aCargo) {
   $vDados    = "";
   $vObjConn  = new CDBmysql();
//---
//---> Parâmetros para o SQL...
//===> Formato:  Campo de select  @  alias do campo de select  #  Meu XML   
   $i = -1;
   $i++; $vSelectAliasMeuXML[$i]  = "T002.D_IDCARGO     @ vIDCARGO      # IDCARGO       "; 
   $i++; $vSelectAliasMeuXML[$i]  = "T002.D_DESCCARGO   @ vDESCCARGO    # DESCCARGO     "; 
   $vFrom      = " CVGD002Cargo T002";
   $vWhere     = "";
   
   if ($aIdCargo !== "-1") {
      if ($vWhere !== "") { $vWhere .= " and "; }   
      $vWhere .= " T002.D_IDCARGO = " . $aIdCargo;
   }       
   
   if ($aCargo !== "") {
      if ($vWhere !== "") { $vWhere .= " and "; }   
      $vWhere .= " upper(T002.D_DESCCARGO) like upper('" . $aCargo . "%')";
   }       

   $vOrderBy   = " T002.D_DESCCARGO";
   $vSQL       = ""; 
//---> Função DAO para acessar o BD...   
   $vDados = $vObjConn->fGetDados01($vSelectAliasMeuXML, $vFrom, $vWhere, $vOrderBy);  
//---> Devolver dados com "formato" MeuXML... 
   echo $vDados;
}
