<div id='divTelaDados' style="display:block; position:relative; background-color:#eeeeee;">
    <form name="fmacessar" id="fmacessar" method='post' action="">
    <p>    
    <Table align="Center" class="tipo03">
        
        <TR>
        
            <TD>
                <Table align="Center" noborder>
                    <TR><TD>
                            <table noborder align="center"><tr><TD><b>Acesso ao Sistema via conta CVG<i>web</i>:</b></TD></tr></table>
                    </TD></TR>

                    <TR><TD>
                            <table noborder>
                                <tr>
                                    <td>Usuário:</td>
                                    <td><input type=text name=txtNickUsrDigitado2 id=txtNickUsrDigitado2 value="" onfocus="this.select();"></td>
                                </tr>
                                <tr>
                                    <td>Senha:</td>
                                    <TD><input type=password name=txtSenha2 id=txtSenha2 value="" onfocus="this.select();"></TD>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type=hidden name=txtSubsistemaHidden2 id=txtSubsistemaHidden value="SGPCEN"></TD>
                                </tr>
                            </table>
                    </TD></TR>

                    <TR><TD align="center">
                        <A href='javascript: f001_ValidarUsuario2("../pcenhtml/pcenacessar01.php")'><img src='../pcenimg/ok3.bmp' border=0></A>
                    </TD></TR>
                </Table>
            </TD>
            
<!--            <TD>
                <UL type=disc>
                    <LI>Se você é usuário do CEN<i>web</i> e:
                    <UL type=square>
                        <LI>Não está cadastrado
                        <LI>Esqueceu seu nome de usuário e/ou senha
                        <LI>Tem algum problema de uso com o Sistema
                    </UL>
                    <LI>Então entre em contato com alguém abaixo relacionado
                    <UL type=square>
                        <LI>
                        <table noborder>
                            <tr>
                                <td><A href="MAILTO:luis.palhares@embrapa.br"><img src="../pcenimg/mail1.jpg"></A></td>
                                <td><b>Luis Alberto Martins Palhares de Melo</b></td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td><b>0xx(61)3448-47-47</b></td>
                            </tr>
                        </table>
                        </LI>    
                    </UL>
                </UL>
            </TD>                           -->

            <TD>
               <A class="texto" HREF='pcenajuda02.php'><img src="../pcvgimg/duvida2.jpg" border=0> Ajuda 02 - Esqueceu senha e/ou conta (<i>nickname</i>) ?</A>                
            </TD>    

        </TR>
        <TR>
            <TD colspan='5' align='center'>
               <A class="texto" HREF='pcenajuda01.php'><img src="../pcenimg/duvida2.jpg" border=0> Ajuda 01 - Acessar o sistema</A>                
            </TD>    
        </TR>
    </Table>
    <p>        
        
    <input type='hidden' name='txtSubsistema'       id='txtSubsistema'        value='SGPCEN-PHP-MYSQL'>
    <input type='hidden' name='txtBanco'            id='txtBanco'             value='MYSQL'>
    <input type='hidden' name='txtMsg'              id='txtMsg'               value=''>
    <input type='hidden' name='txtNickUsr'          id='txtNickUsr'           value=''>
    <input type='hidden' name='txtNomePessoa'       id='txtNomePessoa'        value=''>
    <input type='hidden' name='txtCpfPessoa'        id='txtCpfPessoa'         value=''>
    <input type='hidden' name='txtFonesUsr'         id='txtFonesUsr'          value=''>
    <input type='hidden' name='txtPerfilUsr'        id='txtPerfilUsr'         value=''>
    <input type='hidden' name='txtIdPessoa'         id='txtIdPessoa'          value=''>
    <input type='hidden' name='txtEmail1Usr'        id='txtEmail1Usr'         value=''>
    <input type='hidden' name='txtEmail2Usr'        id='txtEmail2Usr'         value=''>
    <input type='hidden' name='txtEmailInstitUsr'   id='txtEmailInstitUsr'    value=''>
    <input type='hidden' name='txtRamaisUsr'        id='txtRamaisUsr'         value=''>
    <input type='hidden' name='txtMatricEmbrapaUsr' id='txtMatricEmbrapaUsr'  value=''>
    </form>
    <p>

</div>

<div id='divAjuda' style="display:none; position:relative; background-color:#eeeeee;">
</div>

<div id='divAguarde' style="display:none; position:relative; background-color:#eeeeee;">
</div>

<div id='divMsg' style="display:none; position:relative; background-color:#eeeeee;">
</div>

