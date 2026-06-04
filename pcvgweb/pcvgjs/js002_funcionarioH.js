//--------------------------------------------------------------
function f002_IniciarTela() {
   var vPerfil = gPerfilUsr;
   var k, kFunc, vTxt;
   
   k = vPerfil.indexOf("/SU/");
    if (k === -1) {
      k = vPerfil.indexOf("/FUNCIONARIO-I/"); 
   }
   if (k === -1) {
      k = vPerfil.indexOf("/FUNCIONARIO-A/"); 
   }
   if (k === -1) {
      k = vPerfil.indexOf("/FUNCIONARIO-E/"); 
   }
   kFunc = vPerfil.indexOf("/FUNCIONARIO/"); 

//---> gIdUsr > 0 é um funcionário e k = -1 diz que não é "super-usuario" ou com permissão para incluir/alterar/excluir...
   if ( (gIdUsr > 0) && (k === -1) && (kFunc !==  -1) ) {
      f002_SelectReg(gIdUsr);
   }
   else {
      if (k === -1) {  
         vTxt = "<LI><img src='../pcvgimg/subitem01.gif' border=0> " + "Usuário sem permissão para esta funcionalidade" + "</LI>";
         fcvg01_MensagensCliente_2(vTxt,'divMsg','f002_MostrarDiv');      
      }
      else {
          f002_MostrarDiv('divMenu'); 
      }      
   }
   
}

//--------------------------------------------------------------
function f002_MostrarDiv(aDiv) {
//---> esconder todos os DIV´s
   document.getElementById('divMenu').style.display             = 'none';
   document.getElementById('divTelaDados').style.display        = 'none';
   document.getElementById('divSelectReg').style.display        = 'none';
   document.getElementById('divSelectReg1Func').style.display   = 'none';
   document.getElementById('divListaEntidade').style.display    = 'none';
   document.getElementById('divMsg').style.display              = 'none';
   document.getElementById('divAguarde').style.display          = 'none';
//---> mostrar o DIV desejado...
   document.getElementById(aDiv).style.display = 'block';
   
}

//--------------------------------------------------------------
function f002_IrParaMenuOpcoes() {
   document.fmacessar.action = "pcvgmenuopcoes"  + "?op=continua&tipo=1";
}

//--------------------------------------------------------------
function f002_VoltaParaTelaMenu() {
   f002_MostrarDiv('divMenu');
}

//--------------------------------------------------------------
function f002_CancelarInclusao() {
    f002_MostrarDiv('divMenu');
}

//--------------------------------------------------------------
function f002_CancelarAlteracao() {
    f002_MostrarDiv('divSelectReg');
}
//--------------------------------------------------------------
function f002_CancelarAlteracao1Func() {
    f002_MostrarDiv('divSelectReg1Func');
}

//--------------------------------------------------------------
function f002_CancelarExclusao() {
    f002_MostrarDiv('divSelectReg');
}

//--------------------------------------------------------------
function f002_FinalizarConsulta() {
    f002_MostrarDiv('divSelectReg');
}
//--------------------------------------------------------------
function f002_FinalizarConsulta1Func() {
    f002_MostrarDiv('divSelectReg1Func');
}
//--------------------------------------------------------------
function f002_RegIncluir() {
    f002_MontarTelaInclusao();
    f002_MostrarDiv('divTelaDados');
}
//--------------------------------------------------------------
function f002_MontarTelaInclusao() {
    f002_MontarMenuTelaInclusao('INCLUSAO');
    f002_MontarCamposTelaIncAltExcCons('-1', '-1', 'INCLUSAO');

}

//--------------------------------------------------------------
function f002_MontarMenuTelaInclusao(aTipoInclusao) {
    var vDiv = document.getElementById('divMenuTelaDados');
    var vTxt = "";

    vTxt  = "<Table noborder align='center'>";
    vTxt += "<TR>";
    if (aTipoInclusao === 'INCLUSAO') {
       vTxt += "<TD width='50%' align='center'><A href='javascript: f002_EfetivarInclusao()'>";
    }
    else {
       vTxt += "<TD width='50%' align='center'><A href='javascript: f002_EfetivarInclusaoPessoaNaoFuncAinda()'>";        
    }
    vTxt += "<img src='../pcvgimg/incluir3.bmp' align=left border=0></A>";
    vTxt += "</TD>";
    vTxt += "<TD width='5%'></TD>";
    vTxt += "<TD width='50%' align='center'><A href='javascript: f002_CancelarInclusao()'>";
    vTxt += "<img src='../pcvgimg/cancelar1.bmp' align=left border=0></A>";
    vTxt += "</TD>";
    vTxt += "</TR>";
    vTxt += "</Table>";
//---
    vDiv.innerHTML = vTxt;
}

//--------------------------------------------------------------
function f002_MontarCamposTelaIncAltExcCons(aId, aMatric, aOperacao) {
    var vOpcaoEDados                  = "";
    var vCamposFormulario             = "";
    var vAux;

//---
    if (aOperacao === 'INCLUSAO') {
       f002_MontarCamposTelaIncAltExcCons_A(aId, aMatric, aOperacao);
    }
    else if (aOperacao === 'INCLUSAO-NAO-FUNC-AINDA') {
          vCamposFormulario  = "";
          vCamposFormulario += "&idpessoa="    + aId;
          vCamposFormulario += "&nomepessoa="  + "";
          vCamposFormulario += "&matric="      + aMatric;
          vOpcaoEDados = "opcao=001a-listar-pessoa-nao-func-ainda" + vCamposFormulario;
          fcvg01_Aguarde('divAguarde');
          f002_MostrarDiv('divAguarde');
          vAux = aId + "," + "'" + aMatric + "'" + "," + "'" + aOperacao + "'";
          vAux = "f002_MontarCamposTelaIncAltExcCons_A(" + vAux + ")";
          fcvgAjax2(vOpcaoEDados,vAux);
    }
    else {
       if ( (aOperacao === 'ALTERACAO') || (aOperacao === 'EXCLUSAO') || (aOperacao === 'CONSULTA') ) {           
          vCamposFormulario  = "";
          vCamposFormulario += "&idpessoa="    + aId;
          vCamposFormulario += "&nomepessoa="  + "";
          vCamposFormulario += "&matric="      + aMatric;
          vOpcaoEDados = "opcao=001-listar-funcionario" + vCamposFormulario;
          fcvg01_Aguarde('divAguarde');
          f002_MostrarDiv('divAguarde');
          vAux = aId + "," + "'" + aMatric + "'" + "," + "'" + aOperacao + "'";
          vAux = "f002_MontarCamposTelaIncAltExcCons_A(" + vAux + ")";
          fcvgAjax2(vOpcaoEDados,vAux);
       }
    }
}

//--------------------------------------------------------------
function f002_MontarCamposTelaIncAltExcCons_A(aId, aMatric, aOperacao) {
    
    var vDados            = "";
    var vRegistro         = "";
    var k                 = -1;
    var kIndPerfil        = -1;
    var kIndPerfil2       = -1;
    var vAux              = "";
    var vAux2             = "";
    var vValidacao        = "";
    var vDiv              = "";
    var vTxt            = "";
    var vIdPessoa         = aId;
    var vNomePessoa, vMatric, vEmail1, vObs, vIdCargo, vCargo, vNickUsr, vSenha, vConfSenha;
    var vAux, vDados, vValidacao, vRegistro;

    vNomePessoa           = "";
    vMatric               = "";
    vCargo                = "";
    vEmail1               = "";
    vNickUsr              = "";
    vSenha                = "";
    vConfSenha            = "";
    vObs                  = "";

//---> Alterar, Excluir ou Consultar ?
    if (aOperacao !==  'INCLUSAO') {
       vDados = gDados;  // Texto resultado do RESPONSE
       vValidacao = fg_PegaValorDoMeuXML("VALIDACAO", vDados);
       if (vValidacao === "true") {
          vAux = "REG 1";
          vRegistro     = fg_PegaValorDoMeuXML(vAux, vDados);
          vAux = fg_PegaValorDoMeuXML("IDPESSOA", vRegistro);
          if (vAux === "null") { vAux = "-1"; }  vIdPessoa = vAux;
          vAux = fg_PegaValorDoMeuXML("NOMEPESSOA", vRegistro);
          if (vAux === "null") { vAux = ""; }    vNomePessoa = vAux;
          vAux = fg_PegaValorDoMeuXML("IDCARGO", vRegistro);
          if ( (vAux === "null") || (vAux === "") ) { vAux = "-1"; }  vIdCargo = vAux;
          vAux = fg_PegaValorDoMeuXML("CARGO", vRegistro);
          if (vAux === "null") { vAux = ""; }    vCargo = vAux;
          vAux = fg_PegaValorDoMeuXML("EMAIL1", vRegistro);
          if (vAux === "null") { vAux = ""; }    vEmail1 = vAux;
          vAux = fg_PegaValorDoMeuXML("MATRIC", vRegistro);
          if (vAux === "null") { vAux = ""; }    vMatric = vAux;
          vAux = fg_PegaValorDoMeuXML("NICKUSR", vRegistro);
          if (vAux === "null") { vAux = ""; }  vNickUsr = vAux;
          vAux = fg_PegaValorDoMeuXML("SENHA", vRegistro);
 //         if (vAux === "null") { vAux = ""; }  vSenha = vAux;
 //         if (vSenha !==  "") {
 //            vSenha = fg_DecodificarSenha(vSenha);              
 //         }
          vConfSenha = vSenha;
        }
    }

//---> Preenche a tela com os dados atuais...
//---
    vDiv   = document.getElementById('divNomeFunc');
    if ( (aOperacao === 'INCLUSAO') || (aOperacao === 'ALTERACAO') || (aOperacao === 'INCLUSAO-NAO-FUNC-AINDA') ) {
       kIndPerfil  = gPerfilUsr.indexOf("/SU/");
       kIndPerfil2 = gPerfilUsr.indexOf("/FUNCIONARIO-A/");
       if ( (kIndPerfil === -1) && (kIndPerfil2 === -1) ) {
          vTxt  = "<font color='#0000FF'><b>" + vNomePessoa + "</b></font>";
          vTxt += "<input type=hidden id=txtNomePessoa value='" + vNomePessoa + "' maxlength=70 size=70>";
       }
       else {
          vTxt = "<input type=text id=txtNomePessoa value='" + vNomePessoa + "' maxlength=70 size=70 onfocus=\"this.select();\">";
       }
    }
    else {
       vTxt = "<font color='#0000FF'><b>" + vNomePessoa + "</b></font>";       
    }
    vDiv.innerHTML = vTxt;
//---
    vDiv   = document.getElementById('divEmail1');
    if ( (aOperacao === 'INCLUSAO') || (aOperacao === 'ALTERACAO') || (aOperacao === 'INCLUSAO-NAO-FUNC-AINDA') ) {
       vTxt = "<input type=text id=txtEmail1 value='" + vEmail1 + "' maxlength=50 size=60 onfocus=\"this.select();\">";
    }
    else {
       vTxt = "<font color='#0000FF'><b>" + vEmail1 + "</b></font>";
    }
    vDiv.innerHTML = vTxt;
//---
    vDiv   = document.getElementById('divObs');
    if ( (aOperacao === 'INCLUSAO') || (aOperacao === 'ALTERACAO') || (aOperacao === 'INCLUSAO-NAO-FUNC-AINDA') ) {
       vTxt = "<input type=text id=txtObs value='" + vObs + "' maxlength=100 size=100 onfocus=\"this.select();\">";
    }
    else {
       vTxt = "<font color='#0000FF'><b>" + vEmail1 + "</b></font>";
    }
    vDiv.innerHTML = vTxt;
//---
    vDiv   = document.getElementById('divNomeFunc2');
    if ( (aOperacao === 'INCLUSAO') || (aOperacao === 'ALTERACAO') || (aOperacao === 'INCLUSAO-NAO-FUNC-AINDA') ) {
       vTxt = "<font color='#0000FF'><b>" + vNomePessoa + "</b></font>";
    }
    else {
       vTxt = "<font color='#0000FF'><b>" + vNomePessoa + "</b></font>";
    }
    vDiv.innerHTML = vTxt;
//---
    vDiv   = document.getElementById('divMatric');
    if ( (aOperacao === 'INCLUSAO') || (aOperacao === 'ALTERACAO') || (aOperacao === 'INCLUSAO-NAO-FUNC-AINDA') ) {
       kIndPerfil  = gPerfilUsr.indexOf("/SU/");
       kIndPerfil2 = gPerfilUsr.indexOf("/FUNCIONARIO-A/");
       if ( (kIndPerfil === -1) && (kIndPerfil2 === -1) ) {
          vAux    = fcvg01_FormataMatriculaEmbrapa(vMatric,'N');         
          vTxt  = "<font color='#0000FF'><b>" + vAux + "</b></font>";
          vTxt += "<input type=hidden id=txtMatric value='" + vMatric + "' maxlength=6 size=6>";
       }
       else {
          vTxt  = "<input type=text id=txtMatric value='" + vMatric + "' maxlength=6 size=6 onfocus=\"this.select();\">";
       }
    }
    else {
       vAux   = fcvg01_FormataMatriculaEmbrapa(vMatric,'N');
       vTxt = "<font color='#0000FF'><b>" + vAux + "</b></font>";
    }
    vDiv.innerHTML = vTxt;
//---
    vDiv   = document.getElementById('divCargo');
    if ( (aOperacao === 'INCLUSAO') || (aOperacao === 'ALTERACAO') || (aOperacao === 'INCLUSAO-NAO-FUNC-AINDA') ) {
       kIndPerfil  = gPerfilUsr.indexOf("/SU/");
       kIndPerfil2 = gPerfilUsr.indexOf("/FUNCIONARIO-A/");
       if ( (kIndPerfil === -1) && (kIndPerfil2 === -1) ) {
          vTxt  = "<font color='#0000FF'><b>" + vCargo + "</b></font>";
          vTxt += "<input type=hidden id=txtCargo value='" + vCargo + "' maxlength=30 size=30>";
       }
       else {
          vTxt  = "<A href=\"javascript: f002_BotaoCargo()\"> <img src=\"../pcvgimg/listavalores5.bmp\" border=0></A> ";
          vTxt += "<A href=\"javascript: f002_ZerarCargo()\"> <img src=\"../pcvgimg/borracha1.bmp\" border=0></A> ";
          vTxt += "<input type=text id=txtCargo value='" + vCargo + "' maxlength=30 size=30 onfocus=\"this.blur();\">";
       }
    }
    else {
       vTxt = "<font color='#0000FF'><b>" + vCargo + "</b></font>";
    }
    vDiv.innerHTML = vTxt;
   
    
//---
    vDiv   = document.getElementById('divNickname');
    if ( (aOperacao === 'INCLUSAO') || (aOperacao === 'ALTERACAO') || (aOperacao === 'INCLUSAO-NAO-FUNC-AINDA') ) {
       vTxt  = "<input type=text id=txtNickNameSgpweb value='" + vNickUsr + "' maxlength=15 size=15 onfocus=\"this.select();\">";
    }
    else {
       vTxt = "<font color='#0000FF'><b>" + vNickUsr + "</b></font>";
    }
    vDiv.innerHTML = vTxt;
//---
    vDiv   = document.getElementById('divSenha');
    if ( (aOperacao === 'INCLUSAO') || (aOperacao === 'ALTERACAO') || (aOperacao === 'INCLUSAO-NAO-FUNC-AINDA') ) {
       vTxt  = "<input type=password id=txtSenha value='" + vSenha + "' maxlength=15 size=15 onfocus=\"this.select();\">";
    }
    else {
       vTxt = "<font color='#0000FF'><b>" + "***************" + "</b></font> ";
    }
    vDiv.innerHTML = vTxt;

//---
    vDiv   = document.getElementById('divConfSenha');
    if ( (aOperacao === 'INCLUSAO') || (aOperacao === 'ALTERACAO') || (aOperacao === 'INCLUSAO-NAO-FUNC-AINDA') ) {
       vTxt  = "<input type=password id=txtConfSenha value='" + vConfSenha + "' maxlength=15 size=15 onfocus=\"this.select();\">";
    }
    else {
       vTxt = "<font color='#0000FF'><b>" + "***************" + "</b></font> ";
    }
    vDiv.innerHTML = vTxt;

//---
    vDiv   = document.getElementById('divPerfilUsr');
    if ( (aOperacao === 'INCLUSAO') || (aOperacao === 'ALTERACAO') || (aOperacao === 'INCLUSAO-NAO-FUNC-AINDA') ) {
       vTxt  = "<input type='checkbox' id='opSuperUsuario' name ='opSuperUsuario' value='/SU/' ";       
       vTxt += " onclick='f002_LigarOuDesligarOpcoes(\"opSuperUsuario\")'> ";
       vTxt += " <A class='hiperlink-1' href='javascript: ";
       vTxt += " f002_ClicouCheckBox(\"opSuperUsuario\"); ";
       vTxt += " f002_LigarOuDesligarOpcoes(\"opSuperUsuario\")";
       vTxt += "'>Superusuário</A><br>";      
       
       vTxt += "<input type='checkbox' id='opFuncionario_I' name ='opFuncionario_I' value='/FUNCIONARIO-I/' ";       
       vTxt += " onclick='f002_LigarOuDesligarOpcoes(\"opFuncionario_I\")'> ";       
       vTxt += " <A class='hiperlink-1' href='javascript: f002_ClicouCheckBox(\"opFuncionario_I\")'>Funcionário - Incluir</A><br>";      
 
       vTxt += "<input type='checkbox' id='opFuncionario_A' name ='opFuncionario_A' value='/FUNCIONARIO-A/' ";       
       vTxt += " onclick='f002_LigarOuDesligarOpcoes(\"opFuncionario_A\")'> ";       
       vTxt += " <A class='hiperlink-1' href='javascript: f002_ClicouCheckBox(\"opFuncionario_A\")'>Funcionário - Alterar</A><br>";      

       vTxt += "<input type='checkbox' id='opFuncionario_E' name ='opFuncionario_E' value='/FUNCIONARIO-E/' ";       
       vTxt += " onclick='f002_LigarOuDesligarOpcoes(\"opFuncionario_E\")'> ";       
       vTxt += " <A class='hiperlink-1' href='javascript: f002_ClicouCheckBox(\"opFuncionario_E\")'>Funcionário - Excluir</A><br>";      
    }
    else {
       vTxt = "???????? FAZER DEPOIS" + "</b></font> ";
    }
    vDiv.innerHTML = vTxt;
    
//---

    vDiv   = document.getElementById('divID');
    if (aOperacao === 'INCLUSAO') {
       vTxt = "<input type='hidden' id='txtOPERACAO' value='INCLUSAO-MASTER-DETAIL'>";
    }
    else if (aOperacao === 'INCLUSAO') {
       vTxt = "<input type='hidden' id='txtOPERACAO' value='ALTERACAO-MASTER-DETAIL'>";
    }
    else {
       vTxt = "<input type='hidden' id='txtOPERACAO' value=''>";
    }
    vTxt += "<input type='hidden' id='txtID'                       value='" + aId +  "'>";
    vTxt += "<input type='hidden' id='txtIdPessoa'                 value='" + aId +  "'>";
    vTxt += "<input type='hidden' id='txtIdCargo'                  value='" + vIdCargo + "'> ";
    vDiv.innerHTML = vTxt;
//============================================================
//----> Após preparar tela Master e DIV´s para Telas detail...
//============================================================
//---> Pegar Detalhes de Função da pessoa física...
/////    if (aOperacao === 'ALTERACAO') {
/////       fPegarDetalhesFuncaoPessoa(aId,'MOSTRAR-OPCAO');
/////    }

//---> Mostrar tela...
    f002_SubMenuClicado(1);
 
    f002_MostrarDiv('divTelaDados');
}

//--------------------------------------------------------------
function f002_SubMenuClicado(aNumClicado) {
    f002_CamposDinamicosParaMostrar();    
    f002_RefazerAbas(aNumClicado);
    f002_MostrarAba(aNumClicado);
}

//--------------------------------------------------------------
function f002_CamposDinamicosParaMostrar() {
    var vDiv, vTxt;
    var vNomeFunc = document.getElementById('txtNomePessoa');
    var vMatric   = document.getElementById('txtMatric');
    var vNickName = "";    
//---
    if (vNomeFunc !==  null) {
       vNomeFunc = fg_ProcessaCampoDeTexto('txtNomePessoa'); 
       vDiv   = document.getElementById('divNomeFunc2');
       vTxt = "<font color='#0000FF'><b>" + vNomeFunc + "</b></font>";
       vDiv.innerHTML = vTxt;
    } 
}


//--------------------------------------------------------------
function f002_RefazerAbas(aNumAbaLigada) {
    var vDiv   = document.getElementById('divAbasDeDados');
    var vTxt = "";

    vTxt  = "<HR>";
    vTxt += "<Table noborder>";
    vTxt += "<TR>";
//---
    vTxt += "<TD valign='top'>"
    if (aNumAbaLigada === 1) {
       vTxt += "<img src='../pcvgimg/bt01lig_dadospessoais.png' border=0>";
    }
    else {
       vTxt += "<A href='javascript: f002_SubMenuClicado(1)'>";
       vTxt += "<img src='../pcvgimg/bt01des_dadospessoais.png' border=0>";
       vTxt += "</A>";
    }
    vTxt += "</TD>";
//---
    vTxt += "<TD valign='top'>"
    if (aNumAbaLigada === 2) {
       vTxt += "<img src='../pcvgimg/bt01lig_dadosfuncionais.png' border=0>";
    }
    else {
       vTxt += "<A href='javascript: f002_SubMenuClicado(2)'>";
       vTxt += "<img src='../pcvgimg/bt01des_dadosfuncionais.png' border=0>";
       vTxt += "</A>";
    }
    vTxt += "</TD>";
//---
    vTxt += "</TR>";
    vTxt += "</Table>";
    vTxt += "<HR>";
//---
    vDiv.innerHTML = vTxt;

}

//--------------------------------------------------------------
function f002_MostrarAba(aNumAba) {

    var vDivAba = new Array();
    var i       = 0;
    var vAba    = '';

    vDivAba[1] = 'divDadosPessoais';
    vDivAba[2] = 'divDadosFuncionais';

    var vMaximoDeAbas = 2;

//---> esconder todas abas de dados...
   for (i = 1; i <= vMaximoDeAbas; i++) {
      document.getElementById(vDivAba[i]).style.display = 'none';
   }
//---> mostrar a aba (DIV) desejada...
   document.getElementById(vDivAba[aNumAba]).style.display = 'block';

}

//--------------------------------------------------------------
function f002_LigarOuDesligarOpcoes(aCheckBox) {

   if (aCheckBox === "opSuperUsuario") {   
      if (document.getElementById('opSuperUsuario').checked === true) { 
         document.getElementById('opFuncionario_I').checked = false;
         document.getElementById('opFuncionario_A').checked = false;
         document.getElementById('opFuncionario_E').checked = false;
      }   
   }

}  // end-function f002_LigarOuDesligarOpcoes

//--------------------------------------------------------------
function f002_ClicouCheckBox(aCheckBox) {
    
   var vCondicaoIfStr, vCondicaoIf, vExecutaStr;

   vCondicaoIfStr = "vCondicaoIf = document.getElementById('" + aCheckBox +"').checked === true";
   vCondicaoIf    = eval(vCondicaoIfStr);
   vExecutaStr    = "document.getElementById('" + aCheckBox + "').checked = ";
  if (vCondicaoIf === true) {
      vExecutaStr += "false";
   } else {
     vExecutaStr += "true";
   }
   eval(vExecutaStr);

} // end-function f002_ClicouCheckBox

//--------------------------------------------------------------
function f002_ZerarCargo() {
   document.getElementById('txtIdCargo').value     = -1;
   document.getElementById('txtCargo').value       = "";
}

//--------------------------------------------------------------
function f002_BotaoCargo() {
    var vTxt;
    var vMsg;
    var vCargo  = document.getElementById('txtCargo').value;
    var vOK = true;

//    vTxt = "";
//    if (vCargo === '') {
//       vOK = false;
//       vMsg    = "Digite as letras iniciais do cargo e depois clique no botão para escolhê-lo";
//       vTxt += "<LI><img src='../pcvgimg/subitem01.gif' border=0> " + vMsg + "</LI>";
//    }
//---
    if (vOK === true) {
//---> Montar e mostrar a tela de procura...
      vTxt = f002_janListaEscolhaCargo('f002_BotaoCargo_A()',
                                       'f002_MostrarDiv',
                                       'divAguarde',
                                       'txtCargo',
                                       'f002_CancelarEscolhaDeCargo',
                                       'f002_EscolherCargo');      
    }
    else {
      fcen01_MensagensCliente(vTxt,'divMsg','f002_MostrarDiv','f002_VoltaParaTelaDiv','divTelaDados');
    }
    
}
//--------------------------------------------------------------
function f002_BotaoCargo_A() {
   
    var vDiv , vTxt;

//---> Montar e mostrar a tela de procura...
    vTxt = gTexto;
    if (vTxt.length > 0) {
       vDiv   = document.getElementById('divListaEntidade');
       vDiv.innerHTML = vTxt;
       f002_MostrarDiv('divListaEntidade');

    }
}

//--------------------------------------------------------------
function f002_CancelarEscolhaDeCargo() {
    f002_MostrarDiv('divTelaDados');
}

//--------------------------------------------------------------
function f002_EscolherCargo(aCargo, aIdCargo) {
    document.getElementById('txtIdCargo').value  = aIdCargo;
    document.getElementById('txtCargo').value    = aCargo;
    f002_MostrarDiv('divTelaDados');
}

//--------------------------------------------------------------
function f002_janListaEscolhaCargo(aFuncaoAposGetDados,
                                   aFuncaoDiv,
                                   aDiv,
                                   aCargo,
                                   aFuncCancela,
                                   aFuncEscolhe) {
   var vAux;
   var vOpcaoEDados      = "";
   var vCamposFormulario = "";
   var vCargo            = fg_ProcessaCampoDeTexto(aCargo);

//---> 04/06/2026 - buscar cargo implica em pegar toda a tabela de cargos...
//     ... então vou 'limpar' vCargo para a rotina não fazer where DDESCCRGO no SQL...

   vCargo = "";
//---> Servlet Ajax... ("request")... pegar a entidade
   fcvg01_Aguarde(aDiv);
   vAux = aFuncaoDiv + "('" + aDiv + "')";
   eval(vAux); // Mostar div de aguarde...
   vCamposFormulario  = "";
   vCamposFormulario += "&idcargo="       + "-1";
   vCamposFormulario += "&cargo="         + vCargo;
   vOpcaoEDados = "opcao=001-lista-escolha-cargo"  + vCamposFormulario;
   vAux  = "f002_janListaEscolhaCargo_A(";
   vAux += "'" + aFuncaoAposGetDados  + "',";
   vAux += "'" + aFuncCancela         + "',";
   vAux += "'" + aFuncEscolhe         + "')";
   fCvgAjax2(vOpcaoEDados,vAux);

}

//--------------------------------------------------------------
function f002_janListaEscolhaCargo_A(aFuncaoAposGetDados,
                                     aFuncCancela,
                                     aFuncEscolhe) {

   var vDados            = gDados;
   var vAux              = "";
   var vValidacao        = "";
   var vTxt              = "";
   var vIdCargo          = "";
   var vCargo            = "";
   var vTotReg           = -1;
   var k                 = -1;
   var vRegistro         = "";
   
//---> Resultado ("response") ... Tem registro para mostrar ?
   vValidacao = fg_PegaValorDoMeuXML("VALIDACAO", vDados);
//---
   vTxt  = "<Table noborder align='center'>";
   vTxt += "<TR>";
   vTxt += "<TD align='center'><A href=\"javascript: " + aFuncCancela + "()\">";
   vTxt += "   <img src='../pcvgimg/cancelar5.bmp' align=left border=0></A>";
   vTxt += "</TD>";
   vTxt += "</TR>";
   vTxt += "</Table>";
   vTxt += "<HR>";
   vTxt += "<p>";
   vTxt += "<center>";
   vTxt += "<table class='tipo02'>";
   vTxt += "<TR>";
   vTxt += "<TH align='center'>Cargo</TH>";
   vTxt += "</TR>";
//---
    if (vValidacao === "true") {
       vTotReg    = fg_PegaValorDoMeuXML("TOTREG", vDados);
       for (k = 1; k <= vTotReg; k++) {
          vAux = "REG " + k;
          vRegistro = fg_PegaValorDoMeuXML(vAux, vDados);
          vTxt += "<TR>";
//------> pegar dados...
          vIdCargo       = fg_PegaValorDoMeuXML("IDCARGO", vRegistro);
          vCargo         = fg_PegaValorDoMeuXML("DESCCARGO", vRegistro);          
//------> Montar linha detalhe da tabela...
          vAux    = "<A href=\"javascript: " + aFuncEscolhe + "(";
          vAux   += "'" + vCargo + "'" + ",";
          vAux   += vIdCargo + ")\">" + vCargo + "</A></TD>";
          vTxt += "<TD>" + vAux + "</TD>";
//--->
          vTxt += "</TR>";
       }
    }
    else {
       vTxt += "<TR><TD colspan=1 align='center'><h2>*** Nenhum Registro ***</h2></TD></TR>";
    }
    vTxt += "</table>";
    vTxt += "</center>";
    vTxt += "<p><p>";

//---> Texto montado é armazenado na variável global...
    gTexto = vTxt;
    eval(aFuncaoAposGetDados);

}

//--------------------------------------------------------------
function f002_EfetivarInclusao() {

   f002_CriticaFuncionario('incluir', '-1', 'N');

}

//--------------------------------------------------------------
function f002_CriticaFuncionario(aOperacao, aNumLinhaTable, aSo1Func) {


//---
    if (vOK === false) {
       fcen01_MensagensCliente(vTexto,'divMsg','f002_MostrarDiv','f002_VoltaParaTelaDiv','divTelaDados');
    }
    else {
       f002_JaEstaCadastrado(aOperacao, aNumLinhaTable, aSo1Func);       
    }
//---

}