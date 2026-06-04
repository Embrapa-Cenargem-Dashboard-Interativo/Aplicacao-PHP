<div id='divMenu' style="display:none; position:relative; background-color:#eeeeee;">

      <Table align='Center' border>

         <TR><TD>
             <table border class='tipo03'>
             <tr>
             <td colspan=2 align='center'>
                 <b>Funcionário</b> - Menu de Opções
             </td>
             </tr>
             <tr>
<?PHP
             $vAchou = "S";
             $vPos = strpos($vPerfilUsr,"/FUNCIONARIO-I/");
             if ($vPos === false) {
                $vPos = strpos($vPerfilUsr,"/SU/");
             }
             if ($vPos === false) {
                $vAchou = "N"; 
             }
             if ($vAchou == "S") {
?>
                <td align='center'>
                   <A href="javascript: f002_RegIncluir()"><img src='../pcvgimg/incluir1.bmp'> Incluir</A>
                </td>
<?PHP
             }
             else {
?>
                <td> </td>
<?PHP
             }
             $vPos = strpos($vPerfilUsr,"/FUNCIONARIO-A/");
             if ($vPos === false) {
                $vAchou = "S"; // se for somente alterar e/ou excluir...
             }
             $vPos = strpos($vPerfilUsr,"/FUNCIONARIO-E/");
             if ($vPos === false) {
                $vAchou = "S"; // se for somente alterar e/ou excluir...
             }
             if ($vAchou == "S") {
?>
                <td align='center'>
                   <A href="javascript: f002_SelectReg(-1)"><img src="../pcvgimg/listar1.bmp"> Listar</A>
                </td>
                </tr>
                <tr>
                <td> </td>
                <td>
                   <table noborder>
                   <tr>
                   <td>
                   <font color="#FF0000"><b>Nomes de <b>funcionários</b> a pesquisar<sup>(1)</sup> :</b></font>
                   </td>
                   <td>
                   <input type='text' id='txtNomePessoaLST' value='' maxlength=35 size=35 onfocus="this.select()">
                   </td>
                   </tr>
                   <tr>
                   <td>
                   <font color="#FF0000"><b>Cargo do funcionário: <sup>(1)</sup> :</b></font>
                   </td>
                   <td>
                   <input type='text' id='txtDescCargoLST' value='' maxlength=15 size=15 onfocus="this.select()">
                   </td>
                   </tr>
                   </table>
                </td>
                </tr>
                <tr>
                <td> </td>
                <td><sup>(1)</sup>Digite parte inicial dos nomes ou deixe em branco para selecionar tudo</td>
                </tr>
                </table>
<?PHP
             }
             else {
?>
                <input type='hidden' id='txtNomePessoaLST' value='' maxlength=0 size=0>
                <input type='hidden' id='txtDescCargoLST'  value='' maxlength=0 size=0>
                </tr>
                </table>
<?PHP
             }
?>
         </TD></TR>
      </Table>
      <hr>
      <p>
      <p>
</div>

<div id='divTelaDados' style="display:none; position:relative; background-color:#eeeeee;">

      <div id='divMenuTelaDados' style="display:block; position:relative; background-color:#eeeeee;">
      </div>
      <HR>

      <div id='divAbasDeDados' style="display:block; position:relative; background-color:#eeeeee;">
      </div>

      <div id='divConteudoDasAbas' style="display:block; position:relative; background-color:#eeeeee;">
          <div id='divDadosPessoais' style="display:none; position:relative; background-color:#eeeeee;">
             <Table class='tipo02' align="left" >
                <tr>
                   <th><font color="#000000"><b>Nome Completo do funcionario:</b></font></th>
                   <td><div id='divNomeFunc' style="display:block; position:relative; background-color:#eeeeee;">
                      </div>
                   </td>
                </tr>
                <tr>
                   <th><font color="#000000"><b>e-mail:</b></font></th>
                   <td><div id='divEmail1' style="display:block; position:relative; background-color:#eeeeee;">
                      </div>
                   </td>
                </tr>
                <tr>
                   <th><font color="#000000"><b>Observação:</b></font></th>
                   <td><div id='divObs' style="display:block; position:relative; background-color:#eeeeee;">
                      </div>
                   </td>
                </tr>
             </Table>
          </div>

          <div id='divDadosFuncionais' style="display:none; position:relative; background-color:#eeeeee;">
             <Table class='tipo02' align="left" >
                <tr>
                   <th><font color="#000000"><b>Nome completo do funcionário:</b></font></th>
                   <td><div id='divNomeFunc2' style="display:block; position:relative; background-color:#eeeeee;">
                      </div>
                   </td>
                </tr>
                <tr>
                   <th><font color="#000000"><b>Matrícula:</b></font></th>
                   <td><div id='divMatric' style="display:block; position:relative; background-color:#eeeeee;">
                      </div>
                   </td>
                </tr>
                <tr>
                   <th><font color="#000000"><b>Cargo:</b></font></th>
                   <td><div id='divCargo' style="display:block; position:relative; background-color:#eeeeee;">
                      </div>
                   </td>
                </tr>
                <tr>
                   <th><font color="#000000"><b><i>Nickname</i>:</b></font></th>
                   <td><div id='divNickname' style="display:block; position:relative; background-color:#eeeeee;">
                      </div>
                   </td>
                </tr>
                <tr>
                   <th><font color="#000000"><b>Senha:</b></font></th>
                   <td><div id='divSenha' style="display:block; position:relative; background-color:#eeeeee;">
                      </div>
                   </td>
                </tr>
                <tr>
                   <th><font color="#000000"><b>Confirmação de senha:</b></font></th>
                   <td><div id='divConfSenha' style="display:block; position:relative; background-color:#eeeeee;">
                      </div>
                   </td>
                </tr>
                <tr>
                   <th><font color="#000000"><b>Perfil do usuário:</b></font></th>
                   <td><div id='divPerfilUsr' style="display:block; position:relative; background-color:#eeeeee;">
                      </div>
                   </td>
                </tr>

              </Table>
          </div>
      </div>
      
      <div id='divID' style="display:none; position:relative; background-color:#eeeeee;">
      </div>
      <p>
      <p>
</div>

<div id='divSelectReg' style="display:none; position:relative; background-color:#eeeeee;">
      <Table noborder align='center'>
      <TR>
      <TD align="center"><A href="javascript: f002_RetornarMenu()">
          <img src="../pcvgimg/menuopcoes01.bmp" align=left border=0></A>
      </TD>
      </TR>
      </Table>
      <HR>
      <div id='divSRtabela' style="display:block; position:relative; background-color:#eeeeee;">
      </div>
</div>

<div id='divSelectReg1Func' style="display:none; position:relative; background-color:#eeeeee;">
<!--      <Table noborder align='center'>
      <TR>
      <TD align="center"><A href="javascript: f003_RetornarMenu1Func()">
          <img src="../pcvgimg/menuopcoes01.bmp" align=left border=0></A>
      </TD>
      </TR>
      </Table>    -->
      <HR>
      <div id='divSRtabela1Func' style="display:block; position:relative; background-color:#eeeeee;">
      </div>
</div>

<div id='divListaEntidade' style="display:block; position:relative; background-color:#eeeeee;">
</div>

<div id='divMsg' style="display:none; position:relative; background-color:#eeeeee;">

</div>

<div id='divAguarde' style="display:none; position:relative; background-color:#eeeeee;">

</div>
