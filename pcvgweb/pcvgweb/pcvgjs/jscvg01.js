//--------------------------------------------------------------
function fcvg01_Aguarde(aDivAguarde) {
    var vDiv   = document.getElementById(aDivAguarde);
    var vTexto = "";
    vTexto  = "<Table noborder align='center'>";
    vTexto += "<TR>";
    vTexto += "<TD>";
    vTexto += "<img src='../pcvgimg/elefante.gif' border=0>";
    vTexto += "</TD>";
    vTexto += "</TR>";
    vTexto += "<TR>";
    vTexto += "<TD class='texto2'>";
    vTexto += "<b>Aguarde...</b>";
    vTexto += "</TD>";
    vTexto += "</TR>";
    vTexto += "</Table>";
//---
    vDiv.innerHTML = vTexto;
}
