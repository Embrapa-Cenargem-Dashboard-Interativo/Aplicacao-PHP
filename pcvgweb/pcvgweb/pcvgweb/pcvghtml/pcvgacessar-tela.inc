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
                                    <td><input type=text name='txtNickUsr' id='txtNickUsr' value="" onfocus="this.select();"></td>
                                </tr>
                                <tr>
                                    <td>Senha:</td>
                                    <TD><input type=password name='txtSenha' id='txtSenha' value="" onfocus="this.select();"></TD>
                                </tr>
                            </table>
                    </TD></TR>

                    <TR><TD align="center">
                        <A href='javascript: f001_ValidarUsuario("../pcvghtml/pcvgacessar01.php")'><img src='../pcvgimg/ok3.bmp' border=0></A>
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
               <A class="texto" href='pcenajuda01.php'><img src="../pcvgimg/duvida2.jpg" border=0> Ajuda 01 - Acessar o sistema</A>                
            </TD>    
        </TR>
    </Table>
    <p>        
        
    <input type='hidden' name='txtMsg'              id='txtMsg'               value=''>
    <input type='hidden' name='txtNickUsr'          id='txtNickUsr'           value=''>
    <input type='hidden' name='txtNomePessoa'       id='txtNomePessoa'        value=''>
    <input type='hidden' name='txtPerfilUsr'        id='txtPerfilUsr'         value=''>
    <input type='hidden' name='txtIdPessoa'         id='txtIdPessoa'          value=''>
    <input type='hidden' name='txtEmail1Usr'        id='txtEmail1Usr'         value=''>
    </form>
    <p>

</div>

<div id='divAjuda' style="display:none; position:relative; background-color:#eeeeee;">
</div>

<div id='divAguarde' style="display:none; position:relative; background-color:#eeeeee;">
</div>

<div id='divMsg' style="display:none; position:relative; background-color:#eeeeee;">
</div>

