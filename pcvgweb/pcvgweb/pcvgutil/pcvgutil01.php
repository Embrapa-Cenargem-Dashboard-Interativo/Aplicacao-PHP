<?php header('Content-Type: text/html; charset=ISO-8859-1',true) ?>


<?php

//=================================================================================//
// UTIL01 - Funções utilitárias diversas                                           //
//=================================================================================//

//---------------------------------------------------------------------------------//
//====> futil01_PegaValorDoMeuXML                                                  //
//---------------------------------------------------------------------------------//
function futil01_PegaValorDoMeuXML($aTagXML, $aTextoDeBusca) {
    $vMarcaIniTag    = "[[";
    $vMarcaFimTag    = "]]";
    $vTagIni         = "";
    $vTagFim         = "";
    $k1              = -1;
    $k2              = -1;
    $vConteudo       = "";

   
//---> Monta o marcador Tag...
    $vTagIni = $vMarcaIniTag  . $aTagXML . $vMarcaFimTag;
    $vTagFim = $vMarcaIniTag  . "/" . $aTagXML . $vMarcaFimTag;
    
//---> Procurar os Tags inicio e fim no Texto de busca...
    $k1 = strpos($aTextoDeBusca,$vTagIni);
    $k2 = strpos($aTextoDeBusca, $vTagFim);
    
    if ( ($k1 === false) || ($k2 === false) ) {
       $vConteudo = ""; // não achou o par de tags...
    }
    else {   
       $k1 = $k1 + strlen($vTagIni);
       $k2 = $k2 - $k1;
       $vConteudo =   substr($aTextoDeBusca, $k1, $k2);
    }   
//---
    return ($vConteudo);
}

//---------------------------------------------------------------------------------//
//====> futil01_PegaDescricaoMes                                                   //
//---------------------------------------------------------------------------------//
function futil01_PegaDescricaoMes($aMes) {
    $vMes    = intval($aMes);
    $vDescMes = "";   
    
    if      ($vMes == 1) {
       $vDescMes = "Janeiro";
    }
    else if ($vMes == 2) {
       $vDescMes = "Fevereiro";
    }
    else if ($vMes == 3) {
       $vDescMes = "Março";
    }
    else if ($vMes == 4) {
       $vDescMes = "Abril";
    }
    else if ($vMes == 5) {
       $vDescMes = "Maio";
    }
    else if ($vMes == 6) {
       $vDescMes = "Junho";
    }
    else if ($vMes == 7) {
       $vDescMes = "Julho";
    }
    else if ($vMes == 8) {
       $vDescMes = "Agosto";
    }
    else if ($vMes == 9) {
       $vDescMes = "Setembro";
    }
    else if ($vMes == 10) {
       $vDescMes = "Outubro";
    }
    else if ($vMes == 11) {
       $vDescMes = "Novembro";
    }
    else if ($vMes == 12) {
       $vDescMes = "Dezembro";
    }
//---
    return ($vDescMes);
}

//---------------------------------------------------------------------------------//
//====> futil01_DataAAAAMMDDparaDD_MM_AAAA                                         //
//---------------------------------------------------------------------------------//
function futil01_DataAAAAMMDDparaDD_MM_AAAA($aData) {
   $vData       = $aData;
   $vLen        = 0;
   $vDia        = '';
   $vMes        = '';
   $vAno        = '';

   $vLen = strlen($vData);
   if ($vLen == 8) {
      $vDia  = substr($vData, 6, 2);
      $vMes  = substr($vData, 4, 2);
      $vAno  = substr($vData, 0, 4);
      $vData = $vDia . '/' . $vMes . '/' . $vAno;
   }
   else {
      $vData = ""; 
   }
//---> Return..
   return ($vData);
    
}

//---------------------------------------------------------------------------------//
//====> futil01_FormataMatriculaEmbrapa                                            //
//---------------------------------------------------------------------------------//
function futil01_FormataMatriculaEmbrapa($aMatric, $aZeroEsq) {
   $vOK     = false;
   $vMatric = "";
   $vLen    = -1;
//---
   if ($aMatric == null) {
      $vLen = 0; 
   }
   else {
      $vLen = strlen($aMatric); 
   }
//---
   $iCont = 0;
   for ($k = $vLen-1; $k >= 0; $k--) {
       $iCont++;
       if ($iCont == 4) {
          $vMatric = $vMatric . ".";
          $iCont = 0;
       }
       $vMatric = $vMatric . substr($aMatric,$k,1);
   }
//---
   
   if ($aZeroEsq == "S") {
      for ($k = 6; $k > $vLen; $k--) {
        $vMatric = $vMatric . "0";
      }
   }
//---
   $vAux = "";
   $vLen = strlen($vMatric);
   for ($k = $vLen-1; $k >= 0; $k--) {
      $vAux = $vAux . substr($vMatric,$k,1);
   }
   $vMatric = $vAux;    
//---
   return $vMatric;
}

//---------------------------------------------------------------------------------//
//====> futil01_DecodificarSenha                                                   //
//---------------------------------------------------------------------------------//
function futil01_DecodificarSenha($aSenha) {

   $vSenha = strtoupper ($aSenha);   // caracteres sempre maiusculos...
   $k      = strlen($vSenha);
//---> Diminui o código ASCII em 1...
   $vSenhaAux = "";
   for ($i = 0; $i < $k; $i++) {
       $vChar     = substr($vSenha,$i,1);
       $vAscChar  = ord($vChar);
       $vAscChar--;
       $vSenhaAux = $vSenhaAux . chr($vAscChar);
   }
//---> A senha tem qtde. par ou ímpar de caracteres ?
   $i = $k / 2;
   if (($k % 2) == 0) {
//------> qtde. PAR então a senha ficaria assim decodificada...
      $vSenhaAux = substr($vSenhaAux,$i,$i) . substr($vSenhaAux,0,$i);
   }
   else {
//------> qtde. IMPAR então a senha ficaria assim decodificada...
      $vSenhaAux = substr($vSenhaAux,$i+1,$i) . substr($vSenhaAux,$i,1) . substr($vSenhaAux,0,$i);     
   }
   $vSenha = $vSenhaAux;  
   
//---
   return $vSenha;       
    
}


//---------------------------------------------------------------------------------//
//====> futil01_Decodifica_Para_ISO8859_1                                          //
//---------------------------------------------------------------------------------//
function futil01_Decodifica_Para_ISO8859_1($aTexto) {

    $vTexto   = $aTexto;
    $i        = -1;
    $k        = -1;
    $vAsc     = "";
//--->  o índice do vetor é seu número em decimal...
    for ($k = 0; $k <= 255; $k++) {
        $vCharAsc[$k] = " ";   // inicialmente todos são branco 
    }
//---
    $vCharAsc[33]  = "!";
    $vCharAsc[34]  = "\"";
    $vCharAsc[35]  = "#";
    $vCharAsc[36]  = "$";
    $vCharAsc[37]  = "%";
    $vCharAsc[38]  = "&";
    $vCharAsc[39]  = "'";
    $vCharAsc[43]  = "+";
    $vCharAsc[64]  = "@";
    $vCharAsc[126] = "~";
    $vCharAsc[128] = "Ç";
    $vCharAsc[135] = "ç";
    $vCharAsc[192] = "À";
    $vCharAsc[193] = "Á";
    $vCharAsc[194] = "Â";
    $vCharAsc[195] = "Ã";
    $vCharAsc[196] = "Ä";
    $vCharAsc[200] = "È";
    $vCharAsc[201] = "É";
    $vCharAsc[202] = "Ê";
    $vCharAsc[203] = "Ë";
    $vCharAsc[204] = "Ì";
    $vCharAsc[205] = "Í";
    $vCharAsc[206] = "Î";
    $vCharAsc[207] = "Ï";
    $vCharAsc[210] = "Ò";
    $vCharAsc[211] = "Ó";
    $vCharAsc[212] = "Ô";
    $vCharAsc[213] = "Õ";
    $vCharAsc[214] = "Ö";
    $vCharAsc[217] = "Ù";
    $vCharAsc[218] = "Ú";
    $vCharAsc[219] = "Û";
    $vCharAsc[220] = "Ü";
    $vCharAsc[224] = "à";
    $vCharAsc[225] = "á";
    $vCharAsc[226] = "â";
    $vCharAsc[227] = "ã";
    $vCharAsc[228] = "ä";
    $vCharAsc[232] = "è";
    $vCharAsc[233] = "é";
    $vCharAsc[234] = "ê";
    $vCharAsc[235] = "ë";
    $vCharAsc[236] = "ì";
    $vCharAsc[237] = "í";
    $vCharAsc[238] = "î";
    $vCharAsc[239] = "ï";
    $vCharAsc[242] = "ò";
    $vCharAsc[243] = "ó";
    $vCharAsc[244] = "ô";
    $vCharAsc[245] = "õ";
    $vCharAsc[246] = "ö";
    $vCharAsc[249] = "ù";
    $vCharAsc[250] = "ú";
    $vCharAsc[251] = "û";
    $vCharAsc[252] = "ü";    

//---    
    $vAscIni = "[[asc(";
    $vAscFim = ")]]";
    $vLenIni = strlen($vAscIni);
    $vLenFim = strlen($vAscFim);
    $i1      = strpos($vTexto, $vAscIni); 
    $i2      = strpos($vTexto, $vAscFim);
    while ( ($i1 !== false) && ($i2 !== false) ) {
        if ($i2 > $i1) {
           $vCodAsc   = substr($vTexto, $i1+$vLenIni, $i2-$i1-$vLenIni);   
           $vLen      = $vLenIni + strlen($vCodAsc) + $vLenFim;
           $vCodAsc   = intval($vCodAsc,10);
           $vLenTexto = strlen($vTexto);
           $vTexto    = substr($vTexto, 0, $i1) . $vCharAsc[$vCodAsc] . substr($vTexto, $i1+$vLen, $vLenTexto-$i1-$vLen);
           $i1        = strpos($vTexto, $vAscIni); // próxima decodificação... 
           $i2        = strpos($vTexto, $vAscFim); // próxima decodificação...           
        }
        else {
           $i1 = false;
           $i2 = false;
        }
    }
//---
    return $vTexto;
    
}

//---------------------------------------------------------------------------------//
//====> futil01_GeraArrayDeDatasEntre2Datas                                        //
//---------------------------------------------------------------------------------//

function futil01_GeraArrayDeDatasEntre2Datas($aStrDateIni,$aStrDateFim) {
    // takes two dates formatted as YYYY-MM-DD and creates an
    // inclusive array of the dates between the from and to dates.

    // could test validity of dates here but I'm already doing
    // that in the main script

    $aryRange=array();

    $iDateFrom = mktime(1,0,0,substr($aStrDateIni,5,2), substr($aStrDateIni,8,2), substr($aStrDateIni,0,4));
    $iDateTo   = mktime(1,0,0,substr($aStrDateFim,5,2), substr($aStrDateFim,8,2), substr($aStrDateFim,0,4));

    if ($iDateTo>=$iDateFrom)
    {
        array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
        while ($iDateFrom<$iDateTo)
        {
            $iDateFrom+=86400; // add 24 hours
            array_push($aryRange,date('Y-m-d',$iDateFrom));
        }
    }
    return $aryRange;
}

?>
