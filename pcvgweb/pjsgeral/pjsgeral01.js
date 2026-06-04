//--------------------------------------------------------------------------------
function fg_PegaValorDoMeuXML(aTagXML, aTextoDeBusca) {
    var vMarcaIniTag    = "[[";
    var vMarcaFimTag    = "]]";
    var vTagIni         = "";
    var vTagFim         = "";
    var k1              = -1;
    var k2              = -1;
    var vConteudo       = "";

//---> Monta o marcador Tag...
    vTagIni = vMarcaIniTag       + aTagXML + vMarcaFimTag;
    vTagFim = vMarcaIniTag + "/" + aTagXML + vMarcaFimTag;
//---> Procurar os Tags inicio e fim no Texto de busca...
    k1 = aTextoDeBusca.indexOf(vTagIni);
    k2 = aTextoDeBusca.indexOf(vTagFim);
    if ((k1 >= 0) && (k2 >= 0)) {
       k1 += vTagIni.length;
       vConteudo = aTextoDeBusca.substring(k1,k2);
    }
    else {
       vConteudo = ""; // não achou o par de tags...
    }
//---
    return  vConteudo;
}

//--------------------------------------------------------------------------------
function fg_TemAspasSimplesOuDupla( aTexto ) {
    var vCharAtu       = "";
    var vTemAspas      = "N";
    var k = -1;
    k = 0;
    while (k < (aTexto.length)) {
        vCharAtu = aTexto.charAt(k);
        if ( (vCharAtu !== "'") && (vCharAtu !== '"') ) {
        }
        else {
           vTemAspas = "S";
           k         = aTexto.length + 1; // estourar o loop
        }
        k++;
    }
//---
    return  vTemAspas;

}

//--------------------------------------------------------------
function fg_ProcessaCampoDeTexto(aCampoTexto) {
   var vTexto = document.getElementById(aCampoTexto).value;

   vTexto = fg_EspacoUmEntrePalavras(vTexto);
   vTexto = fg_ProcessaAspaSimples(vTexto);
   vTexto = fg_ConverteParaCodigoAsc(vTexto);

   return vTexto;
}

//--------------------------------------------------------------------------------
function fg_EspacoUmEntrePalavras( aTexto ) {
    var vTexto         = "";
    var vCharAtu       = "";
    var vCharAnt       = "";
    var vTextoEspacoUm = "";
    var k = -1;
    vTexto = fg_TrimLeft(aTexto);
    vTexto = fg_TrimRight(vTexto);
    k = 0;
    while (k < (vTexto.length)) {
        vCharAtu = vTexto.charAt(k);
        if ( (vCharAtu !== " ") || (vCharAnt !== " ") ) {
           vTextoEspacoUm += vCharAtu;
        }
        vCharAnt = vCharAtu;
        k++;
    }
//---
    return  vTextoEspacoUm;
}

//--------------------------------------------------------------------------------
function fg_ProcessaAspaSimples( aTexto ) {
    var vTexto         =  "";
    var vCharAtu       = "";
    var k;
    k = 0;
    while (k < (aTexto.length)) {
        vCharAtu = aTexto.charAt(k);
        if (vCharAtu !== "'") {
           vTexto += vCharAtu;
        }
        else {
           vTexto += "`";
        }
        k++;
    }
//---
    return  vTexto;
}

//--------------------------------------------------------------------------------
function fg_TrimLeft( str ) {
   var resultStr = "";
   var i = len = 0;
// Return immediately if an invalid value was passed in
   if (str+"" === "undefined" || str === null)
      return null;
// Make sure the argument is a string
   str += "";
   if (str.length === 0)
      resultStr = "";
   else {
// Loop through string starting at the beginning as long as there
// are spaces.
// len = str.length - 1;
      len = str.length;
      while ((i <= len) && (str.charAt(i) === " "))
          i++;
// When the loop is done, we're sitting at the first non-space char,
// so return that char plus the remaining chars of the string.
      resultStr = str.substring(i, len);
   }
   return resultStr;
}

//--------------------------------------------------------------------------------
function fg_TrimRight( str ) {
   var resultStr = "";
   var i = 0;
// Return immediately if an invalid value was passed in
   if (str+"" === "undefined" || str === null)
      return null;
// Make sure the argument is a string
   str += "";
   if (str.length === 0)
      resultStr = "";
   else {
// Loop through string starting at the end as long as there
// are spaces.
      i = str.length - 1;
      while ((i >= 0) && (str.charAt(i) === " "))
          i--;
// When the loop is done, we're sitting at the last non-space char,
// so return that char plus all previous chars of the string.
      resultStr = str.substring(0, i + 1);
   }
   return resultStr;
}

//--------------------------------------------------------------------------------
function fg_ConverteParaCodigoAsc( aTexto ) {
    var vTexto         =  "";
    var vCharAtu       = "";
    var k = -1;
    k = 0;
    while (k < (aTexto.length)) {
        vCharAtu = aTexto.charAt(k);
//---
        if (vCharAtu.charCodeAt(0) === 8220) {
           vCharAtu = "\"";   // Trocar abre aspas maluco do Word pelas aspas normais...
        }        
        if (vCharAtu.charCodeAt(0) === 8221) {
           vCharAtu = "\"";   // Trocar fecha aspas maluco do Word pelas aspas normais...
        }        
//---        
        if (vCharAtu === "%") {
           vTexto += "[[asc(37)]]";
        }
        else if (vCharAtu === "&") {
           vTexto += "[[asc(38)]]";
        }
        else if (vCharAtu === "+") {
           vTexto += "[[asc(43)]]";
        }
        else {
           vTexto += vCharAtu;
        }
        k++;
    }
//---
    return  vTexto;
}

//--------------------------------------------------------------------------------
function fg_CodAscParaCaracter( aTexto ) {


    var vTexto     = aTexto;
    var vCodAsc  = new Array();
    var vCharAsc = new Array();
    var i, k;
    var vAsc;
//---
    vCodAsc[0] = 37; vCharAsc[0] = "%";
    vCodAsc[1] = 38; vCharAsc[1] = "&";
    vCodAsc[2] = 43; vCharAsc[2] = "+";
//---
    for (k = 0; k < 3; k++) {
        vAsc = "[[asc(" + vCodAsc[k] + ")]]";
        i = vTexto.indexOf(vAsc);
        while (i >= 0) {
            vTexto = vTexto.substring(0, i) + vCharAsc[k] + vTexto.substring(i+vAsc.length, vTexto.length);
            i = vTexto.indexOf(vAsc);
        }
    }
//---
    return vTexto;
}


