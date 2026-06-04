<?php header('Content-Type: text/html; charset=ISO-8859-1',true) ?>


<?php

  class CDBmysql {
      
    private $mUrlDatabase  = "localhost:3306";
    private $mDatabase     = "dbcvg";
//    private $mUsuario      = "usr_sgpcen";
//    private $mSenha        = "sgpcen";
    private $mUsuario      = "root";
    private $mSenha        = "abcdef";
    private $mConn         = NULL;
    private $mMsgErro      = '';
  
//     private $mUrlDatabase  = "localhost";
//     private $mDatabase     = "sgpcen";
//     private $mUsuario      = "root";
//     private $mSenha        = "palha";
//     private $mConn         = NULL;
//     private $mMsgConn      = '';
    
     function fGetUrlDatabase() { return $this->mUrlDatabase; }
     function fGetDatabase()    { return $this->mDatabase; } 
     function fGetUsuario()     { return $this->mUsuario; } 
     function fGetSenha()       { return $this->mSenha; }          
 
//======================================================================//     
// Função padrão para conexão com BD...
//======================================================================//     
     function fConexaoComBD() {
        $vOK = "S";

// 07/02/2018 ---> Verificar se tem a extensão para acesso ao MYSQL...        
        $vDados = "";

        if (!extension_loaded('mysqli')) {
           $vOK = "N";  
           $vAux    = "Extensão mysqli não carregada (verifique php.ini) ";          
           $vDados .= "[[VALIDACAO]]false[[/VALIDACAO]]"; 
           $vDados .= "[[MSGCONN]]" . $vAux . "[[/MSGCONN]]";           
        } 
        
        if (!function_exists('mysqli_init')) {
           $vOK = "N";  
           $vAux    = "Função mysqli_init não encontrada ";          
           $vDados .= "[[VALIDACAO]]false[[/VALIDACAO]]"; 
           $vDados .= "[[MSGCONN]]" . $vAux . "[[/MSGCONN]]";
        }
         
        if ($vOK === "S") {
           $vConn = new mysqli($this->mUrlDatabase, $this->mUsuario, $this->mSenha, $this->mDatabase);          
           if ($vConn->connect_error) {
              $vOK = "N";  
              $vAux    = " Não conseguiu conexão com MYSQL !!! ";          
              $vDados .= "[[VALIDACAO]]false[[/VALIDACAO]]"; 
              $vDados .= "[[MSGCONN]]" . $vAux . "[[/MSGCONN]]";
            }
        }   
        
        if ($vOK === "S") {
           $this->mConn = $vConn;
           $vDB = mysqli_select_db($this->mConn, $this->mDatabase);
           if($vDB === FALSE) {
              $this->mMsgConn = "Não conseguiu acessar o database: " . mysqli_error();
              $vOK     = "N";
              $vDados  = "[[VALIDACAO]]false[[/VALIDACAO]]"; 
              $vDados .= "[[MSGCONN]]" . $this->mMsgConn . "[[/MSGCONN]]";
           }
           else {
//====> 07/05/2014 ====>Para acentuar corretamente... Ao fazer conexão especificar charset...               
              mysqli_query($vConn, 'SET character_set_connection=latin1');
              mysqli_query($vConn, 'SET character_set_client=latin1');
              mysqli_query($vConn, 'SET character_set_results=latin1');
              $vAux    = "OK !!! Conseguiu conexão com o MYSQL e o database ";          
              $vDados  = "[[VALIDACAO]]true[[/VALIDACAO]]"; 
              $vDados .= "[[MSGCONN]]" . $vAux . "[[/MSGCONN]]";
              $vOK     = "S";
            }
        }   
//---
        return $vDados;
     }
  

//======================================================================//     
// Opção 01 de função para pegar dados montando SQL...
//======================================================================//     
     function fGetDados01($aSelectAliasMeuXML, $aFrom, $aWhere, $aOrderBy) {
 
        $vDados      = "";                
        $vResultConn = $this->fConexaoComBD(); 
        $vMsgConn    = "";
        $vSql        = "";
        
        $vOK = futil01_PegaValorDoMeuXML("VALIDACAO", $vResultConn);
        if ($vOK === "true") {
           $vOK = "S"; 
        } else {
           $vOK = "N";             
        }       
        $vMsgConn = futil01_PegaValorDoMeuXML("MSGCONN", $vResultConn);
        $vMsgConn = "[[MSGCONN]]" . $vMsgConn . "[[/MSGCONN]]";        
        
//---> Se OK = "S", então formatar dados com MeuXML...
        if ($vOK === "S") {
            $vDados .= "[[VALIDACAO]]true[[/VALIDACAO]]";             
            $vSql = " select ";
            $vTotCampos = count($aSelectAliasMeuXML);
            for ($k = 0; $k < $vTotCampos; $k++) {
                if ($k > 0) {
                   $vSql .= ", "; 
                }
                $kToken1 = strpos($aSelectAliasMeuXML[$k], "@");
                $kToken2 = strpos($aSelectAliasMeuXML[$k], "#");
                $vCampo  = ltrim(rtrim(substr($aSelectAliasMeuXML[$k],0,$kToken1 - 1)));
                $vAlias  = ltrim(rtrim(substr($aSelectAliasMeuXML[$k],$kToken1+1,$kToken2 - $kToken1 - 1)));
                $vSql .= $vCampo . " " . $vAlias;                 
            }            
            
            $vSql  .= " from " . $aFrom;
            if ($aWhere != "") {
               $vSql .= " where " . $aWhere;                
            }
            if ($aOrderBy != "") {
               $vSql .= " order by " . $aOrderBy;                
            }
            $vResult = mysqli_query($this->mConn, $vSql);
            $vTotReg = mysqli_num_rows($vResult);            
            $vDados .= "[[TOTREG]]" . $vTotReg . "[[/TOTREG]]";
            mysqli_close($this->mConn);                
            $k = 1;
            for ($k = 0; $k < $vTotReg; $k++) {
                $vRow    = mysqli_fetch_row($vResult);
                $vDados .= "[[REG " . strval($k + 1) . "]]";
                $vTotCampos = count($aSelectAliasMeuXML);
                for ($m = 0; $m < $vTotCampos; $m++) {
                    if ($k > 0) {
                       $vSql .= ", "; 
                    }
                    $kToken1  = strpos($aSelectAliasMeuXML[$m], "@");
                    $kToken2  = strpos($aSelectAliasMeuXML[$m], "#");
                    $vCampo   = ltrim(rtrim(substr($aSelectAliasMeuXML[$m],0,$kToken1 - 1)));
                    $vAlias   = ltrim(rtrim(substr($aSelectAliasMeuXML[$m],$kToken1+1,$kToken2 - $kToken1 - 1)));
                    $vMeuXML  = ltrim(rtrim(substr($aSelectAliasMeuXML[$m],$kToken2+1,strlen($aSelectAliasMeuXML[$m])- $kToken2 - 1)));
///                    $vValor   = mysqli_result($vResult,$k,$vAlias);
                    $vValor   = $vRow[$m];
                    $vDados  .= "[[" . $vMeuXML . "]]". $vValor . "[[/" . $vMeuXML . "]]";                
                }                            
                $vDados .= "[[/REG " . strval($k + 1) . "]]";
            }                             
        }                                
//---                                     
        return $vSql . $vDados . $vMsgConn;                                                                     
                                                                     
     }



  } // end-class 