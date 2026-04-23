//--------------------------------------------------------------
function f001_MostrarDiv(aDiv) {

//---> esconder todos os DIV´s
   document.getElementById('divTelaDados').style.display      = 'none';
   document.getElementById('divAjuda').style.display          = 'none';
   document.getElementById('divAguarde').style.display        = 'none';
   document.getElementById('divMsg').style.display            = 'none';
//---> mostrar o DIV desejado...
   document.getElementById(aDiv).style.display = 'block';
}

//--------------------------------------------------------------
function f001_IniciarTela() {
    var vNickUsr = document.getElementById('txtNickUsr');
    
    vNickUsr.focus();
}

//--------------------------------------------------------------
function f001_VoltaParaTelaEntrada() {
   f001_MostrarDiv('divTelaDados');
}

//--------------------------------------------------------------

function f001_ValidarUsuario(aProximaPagina) {

    /// fazer esta rotina ... ver se nick e senha estão em branco e ver se tem aspadupla ou simples...
    // o aspa dupla é uma function que fica em jsgeral01.js

     var vOK = true;
     var vCampo;
     var vTemAspas;
     var vTxt            = "";
     var vMsg;

//---> Criticar o nickname..
   vCampo = document.getElementById('txtNickUsr').value;
   if (vCampo === '') {
       vMsg = 'Nickname não informado';
       vTxt += "<LI><img src='../pcvgimg/subitem01.gif' border=0> " + vMsg + "</LI>";
       vOK = false;
   }
   else {
       vTemAspas = fg_TemAspasSimplesOuDupla(vCampo);
       if (vTemAspas === 'S') {
           vMsg = 'Nickname possui aspa simples e/ou dupla';
           vTxt += "<LI><img src='../pcvgimg/subitem01.gif' border=0> " + vMsg + "</LI>";
           vOK = false;
       }
   }



//----
   if (vOK === true) {
//------> Existe o usuário ??
      f001_UsuarioExiste(aProximaPagina);
   }
   else {
      f001_MensagensCliente(vTxt);
   }

} // end-function f001_ValidarUsuario

//--------------------------------------------------------------
function f001_MensagensCliente(aTexto) {
   var vDiv   = document.getElementById('divMsg');
   var vTxt = "";

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
   vTxt += "<A href='javascript: f001_VoltaParaTelaEntrada()'> <img src='../pcvgimg/ok3.bmp' border=0></A>"
   vTxt += "</TD>";
   vTxt += "</TR>";
   vTxt += "</Table>";
//---
   vDiv.innerHTML = vTxt;
   f001_MostrarDiv('divMsg');

} //end-function f001_MensagensCliente

