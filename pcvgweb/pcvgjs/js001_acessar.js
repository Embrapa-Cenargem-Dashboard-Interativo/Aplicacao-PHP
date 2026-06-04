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

     var vOK = "S";
     var vCampo, vTemAspas, vTxt, vMsg;

   vTxt = "";  
//---> Criticar o nickname..
   vCampo = document.getElementById('txtNickUsr').value;
   if (vCampo === '') {
       vMsg = 'Nickname não informado';
       vTxt += "<LI><img src='../pcvgimg/subitem01.gif' border=0> " + vMsg + "</LI>";
       vOK = "N";
   }
   else {
       vTemAspas = fg_TemAspasSimplesOuDupla(vCampo);
       if (vTemAspas === 'S') {
           vMsg = 'Nickname possui aspa simples e/ou dupla';
           vTxt += "<LI><img src='../pcvgimg/subitem01.gif' border=0> " + vMsg + "</LI>";
           vOK = "N";
       }
   }

//---> Criticar a senha..
   vCampo = document.getElementById('txtSenha').value;
   if (vCampo === '') {
       vMsg = 'Senha não informada';
       vTxt += "<LI><img src='../pcvgimg/subitem01.gif' border=0> " + vMsg + "</LI>";
       vOK = "N";
   }
   else {
       vTemAspas = fg_TemAspasSimplesOuDupla(vCampo);
       if (vTemAspas === 'S') {
           vMsg = 'Senha possui aspa simples e/ou dupla';
           vTxt += "<LI><img src='../pcvgimg/subitem01.gif' border=0> " + vMsg + "</LI>";
           vOK = "N";
       }
   }

//----
   if (vOK === "S") {
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

//--------------------------------------------------------------
function f001_UsuarioExiste(aProximaPagina) {
   var vNickUsr          = fg_ProcessaCampoDeTexto('txtNickUsr');
   var vSenha            = fg_ProcessaCampoDeTexto('txtSenha');
   var vOpcaoEDados      = "";
   var vCamposFormulario = "";
   var vAux              = "";

//------> Servlet Ajax... ("request")... 
   vCamposFormulario += "&nickusr="     + vNickUsr;
   vCamposFormulario += "&senha="       + vSenha;
   vOpcaoEDados = "opcao=000-usuario" + vCamposFormulario;
   fcvg01_Aguarde('divAguarde');
   f001_MostrarDiv('divAguarde');
   vAux = 'f001_UsuarioExiste_A("' + aProximaPagina  + '")';
   fCvgAjax2(vOpcaoEDados,vAux);
   
}

//--------------------------------------------------------------
function f001_UsuarioExiste_A(aProximaPagina) {

//---> Resultado... ("response")
   var vAux;
   var vMsg        = "";
   var vTexto      = "";   
   var vValidacao  = ""
   var vTotReg     = -1;
   var vNickUsr    = fg_ProcessaCampoDeTexto('txtNickUsr');

//---> Resultado ("response") ... Tem registro para mostrar ?
   vValidacao = fg_PegaValorDoMeuXML("VALIDACAO", gDados);

//---
    if (vValidacao === "true") {       
      vTotReg = fg_PegaValorDoMeuXML("TOTREG", gDados);
      if (vTotReg <= 0) {      
          vMsg = "Usuário " + "<b><font color='#FF0000'>" + vNickUsr + "</font></b>"  + " não cadastrado";
          vTexto += "<LI><img src='../pcvgimg/subitem01.gif' border=0> " + vMsg + "</LI>";
          f001_MensagensCliente(vTexto);
      } 
      else {     
          f001_UsuarioExiste_B(aProximaPagina);
      }
    }   
    else {       
       f001_MensagensServidor();
    }

}

//--------------------------------------------------------------
function f001_UsuarioExiste_B(aProximaPagina) {

    var vNickUsr, vSenhaLida, vSenhaDigitada, vMsg, vTexto;
    
    vMsg           = "";
    vTexto         = "";   
    vSenhaLida     = fg_PegaValorDoMeuXML("SENHAUSR", gDados);
    vSenhaDigitada = fg_ProcessaCampoDeTexto('txtSenha');
    vNickUsr       = fg_ProcessaCampoDeTexto('txtNickUsr');


    if (vSenhaDigitada !== vSenhaLida) {
      vMsg = "Senha do usuário " + "<b><font color='#FF0000'>" + vNickUsr + "</font></b>"  + " incorreta";
      vTexto += "<LI><img src='../pcvgimg/subitem01.gif' border=0> " + vMsg + "</LI>";
      f001_MensagensCliente(vTexto);
   } 
   else {
      f001_QualPaginaMostrar(aProximaPagina); 
   }

   
}

//--------------------------------------------------------------
function f001_QualPaginaMostrar(aProximaPagina) {

// 21/05/2026 - Guigo, esta função  f001_QualPaginaMostrar era para filtrar página dependendo do usuário
//             ( no caso, funcionário ou colaborador) ... mas nesse seu sistema vamos simplificar e
//             vamos ir direto para página de funcionários...

/*   var vNickUsr  = "";

   vNickUsr = fg_PegaValorDoMeuXML("NICKUSR", gDados);

   if (vNickUsr.substring(0,2) === "e_") {
        f001_ApresentarMenu(aProximaPagina, 'tipo2'); // tela para colaboradores... 
   }
   else {
        f001_ApresentarMenu(aProximaPagina, 'tipo1'); // tela para funcionários... 
   }                 
 */    

   f001_ApresentarMenu(aProximaPagina, 'tipo1'); 

}

//--------------------------------------------------------------
function f001_ApresentarMenu(aProximaPagina, aInterface) {

   var vNickUsr          = "";
   var vTipoUsr          = "";
   var vNomeUsr          = "";
   var vPerfilUsr        = "";
   var vIdPessoa         = "";
   var vEmail            = "";

//------
   vIdPessoa = fg_PegaValorDoMeuXML("IDFUNC", gDados);
//------
   vNickUsr = fg_PegaValorDoMeuXML("NICKUSR", gDados);
//------
   vTipoUsr = fg_PegaValorDoMeuXML("TIPOUSR", gDados);
//------
   vNomeUsr = fg_PegaValorDoMeuXML("NOMEFUNC", gDados);
   if ( (vNomeUsr === "") && (vTipoUsr === "SU") ) { vNomeUsr = "Superusuário"; }
//------
   vPerfilUsr = fg_PegaValorDoMeuXML("PERFILUSR", gDados);
//------
   vEmail = fg_PegaValorDoMeuXML("EMAILFUNC", gDados);
//---
   document.getElementById("txtIdPessoa").value         = vIdPessoa;
   document.getElementById("txtNickUsr").value          = vNickUsr;
   document.getElementById("txtNomePessoa").value       = vNomeUsr;
   document.getElementById("txtPerfilUsr").value        = vPerfilUsr;
   document.getElementById("txtEmail1Usr").value        = vEmail;

//---> OK... usuário com permissão para acessar...
// 
/////////////////////////////////////////////////////////////////////////
   if (aInterface === 'tipo1') {

      document.fmacessar.action = aProximaPagina + "?op=inicio&tipo=1";
   }
   else {
      document.fmacessar.action = aProximaPagina + "?op=inicio&tipo=2";       
   }
   document.getElementById("fmacessar").submit();                                  
//////////////////////////////////////////////////////////////////////////
}

//--------------------------------------------------------------
function f001_VoltaParaTelaEntrada() {
   f001_MostrarDiv('divTelaDados');
}


