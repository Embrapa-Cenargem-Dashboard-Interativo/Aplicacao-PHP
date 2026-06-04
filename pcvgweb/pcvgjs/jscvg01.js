//--------------------------------------------------------------
function fcvg01_Aguarde(aDivAguarde) {
    var vDiv   = document.getElementById(aDivAguarde);
    var vTxt = "";
    vTxt  = "<Table noborder align='center'>";
    vTxt += "<TR>";
    vTxt += "<TD>";
    vTxt += "<img src='../pcvgimg/elefante.gif' border=0>";
    vTxt += "</TD>";
    vTxt += "</TR>";
    vTxt += "<TR>";
    vTxt += "<TD class='texto2'>";
    vTxt += "<b>Aguarde...</b>";
    vTxt += "</TD>";
    vTxt += "</TR>";
    vTxt += "</Table>";
//---
    vDiv.innerHTML = vTxt;
}

//--------------------------------------------------------------
function fcvg01_MensagensCliente(aTexto, aDivDeMensagem, aFuncaoMostrarDiv, aFuncaoDeVolta, aDivDeVolta) {
   var vDiv   = document.getElementById(aDivDeMensagem);
   var vTxt = "";
   var vAux;

//--- Tabela da mensagem...
   vTxt  = "<Table class='tipo06' align='center'>";
   vTxt += "<TR>";
   vTxt += "<TD>";
   vTxt += "<UL type='disc'>";
   vTxt += "<LI><img src='../pcvgimg/atencao01.bmp' border=0 >";
   vTxt += "<b><font color='#0000FF'>" + "Mensagens" + "</font></b></LI>";
   vTxt += "<p>";
   vTxt += "<UL type='disc'>";
//--- mensagens...
   vTxt += aTexto;
//--- final da mensagem...
   vTxt += "<p>";
   vTxt += "</TD>";
   vTxt += "</TR>";
   if (aFuncaoDeVolta != "") {
      vTxt += "<TR>";
      vTxt += "<TD align='center'>";
      vTxt += "<A href='javascript:";
      vTxt += aFuncaoDeVolta + "(\"" + aDivDeVolta + "\")"  + "'> <img src='../pcvgimg/ok1.bmp' border=0></A>"
      vTxt += "</TD>";
      vTxt += "</TR>";
   }   
   vTxt += "</Table>";
//---
   vDiv.innerHTML = vTxt;
   vAux =  aFuncaoMostrarDiv + "(\"" + aDivDeMensagem + "\")";
   eval(vAux);  // acionar função fxxx_MostrarDiv
}

//--------------------------------------------------------------
function fcvg01_MensagensCliente_2(aTexto, aDivDeMensagem, aFuncaoMostrarDiv) {
   var vDiv   = document.getElementById(aDivDeMensagem);
   var vTxt = "";
   var vAux;

//--- Tabela da mensagem...
   vTxt  = "<Table class='tipo06' align='center'>";
   vTxt += "<TR>";
   vTxt += "<TD>";
   vTxt += "<UL type='disc'>";
   vTxt += "<LI><img src='../pcvgimg/atencao01.bmp' border=0 >";
   vTxt += "<b><font color='#0000FF'>" + "Mensagens" + "</font></b></LI>";
   vTxt += "<p>";
   vTxt += "<UL type='disc'>";
//--- mensagens...
   vTxt += aTexto;
//--- final da mensagem...
   vTxt += "<p>";
   vTxt += "</TD>";
   vTxt += "</TR>";
   vTxt += "<TR>";
   vTxt += "<TD align='center'>";
   vTxt += "<A href=\"../pcvghtml/pcvgmenuopcoes.php?op=continua&tipo=1\" target='_self' >";
   vTxt += "> <img src='../pcvgimg/ok1.bmp' border=0></A>";
   vTxt += "</TD>";
   vTxt += "</TR>";
  
   vTxt += "</Table>";
//---
   vDiv.innerHTML = vTxt;
   vAux =  aFuncaoMostrarDiv + "(\"" + aDivDeMensagem + "\")";
   eval(vAux);  // acionar função fxxx_MostrarDiv
}

//--------------------------------------------------------------
function fcvg01_FormataMatriculaEmbrapa(aMatric, aZeroEsq) {
   var vOK     = false;
   var vMatric = "";
   var k, iCont, vAux;
   var vLen    = -1;
//---
   if (aMatric == null) {
      vLen = 0; 
   }
   else {
      vLen = aMatric.length; 
   }
//---
   iCont = 0;
   for (k = vLen-1; k >= 0; k--) {
       iCont++;
       if (iCont == 4) {
          vMatric = vMatric + ".";
          iCont = 0;
       }
       vMatric = vMatric + aMatric.substring(k,k+1);
   }
//---
   if (aZeroEsq == "S") {
      for (k = 6; k > vLen; k--) {
        vMatric = vMatric + "0";
      }
   }
//---
   vAux = "";
   vLen = vMatric.length;
   for (k = vLen-1; k >= 0; k--) {
      vAux = vAux + vMatric.substring(k,k+1);
   }
   vMatric = vAux;
//---
   return vMatric;
}
