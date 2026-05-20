
/////////////////////////////////////////////////////////////////////////////////////
// Biblioteca de funções básicas para AJAX
// Construída (copiada) com base na biblioteca do GILBERTO HIRAGI e EDSON GONÇALVES
///////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////
////===> Chama a servlet pcenservlet1.php
///////////////////////////////////////////

// Varíaveis Globais 
var gObjetoXML;
var gDados;
var gTexto;
var gErro;


//=================================================================================
// Funções: fCriarObjetoXMLHttpParaIE e fCriarObjetoXMLHttp
//          Para criar objeto XMLHTTP !!!
//=================================================================================

//---> Tenta criar uma instância do objeto XMLHttp para o browser IE...
function fCriarObjetoXMLHttpParaIE() {
   var vVersao =[ "MSXML2.XMLHttp.5.0", 
                  "MSXML2.XMLHttp.4.0",
                  "MSXML2.ServerXMLHTTP.6.0",
                  "MSXML2.XMLHttp.6.0", 
                  "MSXML2.XMLHttp.3.0", 
                  "MSXML2.XMLHttp", 
                  "Microsoft.XMLHttp"
                 ];

/*
 *
12/09/2008 ==> Porquê essa ordem de versões acima ??? Veja...
Minha aplicação ASP para de responder e o site fica inacessível. Nenhuma pagina ASP do site 
responde a requisições. O que fazer? 
Caso sua aplicação parar de responder sem uma causa aparente, verifique se, 
em alguma pagina ASP de sua aplicação, você instancia algum desses componentes 
para fazer requisições HTTP ou chamadas AJAX:
     "Microsoft.XMLHTTP"
     "MSXML2.XMLHTTP"
     "MSXML2.XMLHTTP.3.0"
     "MSXML2.XMLHTTP.6.0"
Caso esteja, recomendamos a utilização do componente abaixo, que possui as mesmas 
funcionalidades e alguns recursos adicionais, alem de ter uma estabilidade muito maior:
      "Msxml2.ServerXMLHTTP.6.0"
Mais informações sobre a utilização deste recurso estão disponíveis na documentação oficial
dos links abaixo:

- Descrição completa das propriedades e métodos deste objeto:
http://msdn2.microsoft.com/en-us/library/ms754586.aspx

- Exemplos de utilização em JScript:
http://msdn2.microsoft.com/en-us/library/ms759169(VS.85).aspx
* 
* 
*/

   for (var i=0; i < vVersao.length; i++) {
      try {
            var vObjetoXML = new ActiveXObject(vVersao[i]);
            return  vObjetoXML;            
          } 
      catch (ex){
          // Apenas caso o objeto não exista na versão de browser do cliente
      }
    }
    return null;  // se não criar nenhuma instância...
}

//-----------------------------------------------------------------------
//---> Tenta criar uma instância do objeto XMLHttp...
function fCriarObjetoXMLHttp() {
    var vObjetoXML = null;
    
    if (window.XMLHttpRequest)
        vObjetoXML = new XMLHttpRequest();
    else if (window.ActiveXObject)
        vObjetoXML = fCriarObjetoXMLHttpParaIE();
    
    return vObjetoXML;
}


//======================== MODELO 2 (08/04/2010)======================================
// Modelo 2 de implementação de servlet com base em Gilberto Hiragi
//
// ==> Neste modelo faz-se uma "gambiarra" para forçar a execução do programa de
//     modo estritamente sequencial: quando meu javascript do lado Cliente chama
//     o servidor (via fProcessaPedido), o lado cliente fica esperando...
//
// Funções usadas: fCenAjax2, fExecutaAjax2 e fProcessaPedido2
//
//====================================================================================

//------------------------------------------------------------------------------------
//---> Distribuidor de funções
function fCvgAjax2(aOpcaoEDados, aProximaFuncao) {
    gDados = "";
    fExecutaAjax2('../pcvgajax/pcvgservlet.php',aOpcaoEDados, aProximaFuncao);
}
//-----------------------------------------------------------------------------------
function fExecutaAjax2(aServletPhp, aOpcaoEDados, aProximaFuncao){
    gObjetoXML = fCriarObjetoXMLHttp();
    if (gObjetoXML == null) {
       return null;
    }
    else {
       gObjetoXML.open("POST", aServletPhp, false);
       gObjetoXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//       gObjetoXML.setRequestHeader('Content-length', aOpcaoEDados.length ); 
       gObjetoXML.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
       gObjetoXML.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
       gObjetoXML.setRequestHeader("Pragma", "no-cache");
       gObjetoXML.send(aOpcaoEDados);
       gObjetoXML.onreadstatechange=fProcessaPedido2(aProximaFuncao);
       return false;
    }
}

//-------------------------------------------------------------------------------------------
//---> Interna: verifica se a comunicação teve sucesso e distribui a execução conforme a "op"
function fProcessaPedido2(aProximaFuncao) {

// readyState = 4 (completo - todos os dados foram recebidos e a conexão está fechada)
// readyState = 1 (carregando - open() foi chamado mas pedido ainda não foi enviado)
// readyState = 0 (não iniciado - objeto XMLHttp foi criado mas open() não foi chamado)
    if (gObjetoXML.readyState == 4) {
        if (gObjetoXML.status == 200) {
           gDados = gObjetoXML.responseText;
           if (aProximaFuncao != "") {
              eval(aProximaFuncao);  // 08/04/2010 ==> Aqui se faz o que seria feito "naturalmente" no javascript cliente
           }   
        }
        else if (gObjetoXML.status == 304) {
            alert("(304 - NOT MODIFIED - Os recursos não foram modificados desde o último pedido: \n" +
                  gObjetoXML.statusText);
        }
        else if (gObjetoXML.status == 401) {
            alert("(401 - UNAUTHORIZED - Proibido acesso ao Servidor 'Ajax': \n" +
                  gObjetoXML.statusText);
        }
        else if (gObjetoXML.status == 403) {
            alert("403 - FORBIDDEN - Proibido acesso ao Servidor 'Ajax': \n" +
                  gObjetoXML.statusText);
        }
        else if (gObjetoXML.status == 404) {
            alert("404 - NOT FOUND - Servidor 'Ajax' não encontrado:\n" +
                  gObjetoXML.statusText);
        }
        else {
            alert("Problema de comunicação com o servidor:\n" +
                  gObjetoXML.statusText + "\n" + gObjetoXML.status);
        }
    }

}


//======================== MODELO 3 (01/03/2012)=======================================
// Modelo 3 de implementação de servlet --> Para fazer "recursão" de função JavaScript
//                                          para mostrar "barra de progresso""
//
// neste modelo a "BARRA DE PROGRESSO" É FEITA em fProcessaPedido3
//
// ==> Neste modelo faz-se uma "gambiarra" para forçar a execução do programa de
//     modo estritamente sequencial: quando meu javascript do lado Cliente chama
//     o servidor (via fProcessaPedido), o lado cliente fica esperando...
//
// Funções usadas: fCenAjax3, fExecutaAjax3 e fProcessaPedido3
//
//=====================================================================================

//------------------------------------------------------------------------------------
//---> Distribuidor de funções
function fCenAjax3(aOpcaoEDados, aCampoHiddenBarraProgresso, aDivApresentacao) {
    gDados = "";
    fExecutaAjax3('../pcenajax/pcenservlet.php',aOpcaoEDados, aCampoHiddenBarraProgresso, aDivApresentacao);
}
//-----------------------------------------------------------------------------------
function fExecutaAjax3(aServletPhp, aOpcaoEDados, aCampoHiddenBarraProgresso, aDivApresentacao) {
    gObjetoXML = fCriarObjetoXMLHttp();
    if (gObjetoXML == null) {
       return null;
    }
    else {
       gObjetoXML.open("POST", aServletPhp, false);
       gObjetoXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//       gObjetoXML.setRequestHeader('Content-length', aOpcaoEDados.length ); 
       gObjetoXML.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
       gObjetoXML.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
       gObjetoXML.setRequestHeader("Pragma", "no-cache");
       gObjetoXML.send(aOpcaoEDados);
       gObjetoXML.onreadstatechange=fProcessaPedido3(aCampoHiddenBarraProgresso, aDivApresentacao);
       return false;
    }
}

//-------------------------------------------------------------------------------------------
//---> Interna: verifica se a comunicação teve sucesso e distribui a execução conforme a "op"
function fProcessaPedido3(aCampoHiddenBarraProgresso, aDivApresentacao) {

// readyState = 4 (completo - todos os dados foram recebidos e a conexão está fechada)
// readyState = 1 (carregando - open() foi chamado mas pedido ainda não foi enviado)
// readyState = 0 (não iniciado - objeto XMLHttp foi criado mas open() não foi chamado)
    if (gObjetoXML.readyState == 4) {
        if (gObjetoXML.status == 200) {
           gDados = gObjetoXML.responseText;           
           document.getElementById(aCampoHiddenBarraProgresso).value = gDados;
           document.getElementById(aDivApresentacao).innerHTML = gDados;           
        }
        else if (gObjetoXML.status == 304) {
            alert("(304 - NOT MODIFIED - Os recursos não foram modificados desde o último pedido: \n" +
                  gObjetoXML.statusText);
        }
        else if (gObjetoXML.status == 401) {
            alert("(401 - UNAUTHORIZED - Proibido acesso ao Servidor 'Ajax': \n" +
                  gObjetoXML.statusText);
        }
        else if (gObjetoXML.status == 403) {
            alert("403 - FORBIDDEN - Proibido acesso ao Servidor 'Ajax': \n" +
                  gObjetoXML.statusText);
        }
        else if (gObjetoXML.status == 404) {
            alert("404 - NOT FOUND - Servidor 'Ajax' não encontrado:\n" +
                  gObjetoXML.statusText);
        }
        else {
            alert("Problema de comunicação com o servidor:\n" +
                  gObjetoXML.statusText + "\n" + gObjetoXML.status);
        }
    }

}






