<?php header('Content-Type: text/html; charset=ISO-8859-1',true) ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<SCRIPT language="JavaScript">
//----
pic01over = new Image;
pic01over.src="../pcvgimg/cvgtela01.png";
pic01out = new Image;
pic01out.src="../pcvgimg/cvgtela02.png";

function hover(picName) {
  imagename=picName.substring(0,5);
  document[imagename].src=eval(picName+".src");
}    
//---
</SCRIPT>    

<html>
<?php require("../pcvginc/pcvgCABEC01.inc") ?>

<?php 
//---> include the class file
    include('../pcenhtml/pcenObjSessao.php'); 

    if(session_id()){
       if (session_status() == 2) {  // 0 = PHP_SESSION_DISABLED  1 = PHP_SESSION_NONE  2 = PHP_SESSION_ACTIVE
          session_destroy(); 
       }   
    }
//------> 26/07/2016  = destruir SEMPRE que vier para a página inicial...    
   session_start();     // tem que estar "ligada" para destruir
   session_destroy(); 
   $_SESSION = array(); // Clears the $_SESSION variable

?>           

<br>
<Table noborder align="center" width='100%'>
<TR>
<TD width="40%">
   <table noborder> 
      <tr><td> 
        <A class="texto" HREF='pcenajuda01.php'><img src="../pcvgimg/duvida2.jpg" border=0> Ajuda 01 - Acessar o sistema</A>
      </td></tr>
<!--      <tr><td> 
        <A class="texto" HREF='pcenajuda12.php'><img src="../pcenimg/duvida2.jpg" border=0> Ajuda 12 - Consultar disponibilidade de auditório/sala</A>
      </td></tr>
      <tr><td> 
        <A class="texto" HREF='pcenajuda13.php'><img src="../pcenimg/duvida2.jpg" border=0> Ajuda 13 - Fazer um novo agendamento de auditório/sala</A>
      </td></tr>
      <tr><td> 
        <A class="texto" HREF='pcenajuda14.php'><img src="../pcenimg/duvida2.jpg" border=0> Ajuda 14 - Listar meus agendamentos</A>
      </td></tr>
      <tr><td> 
        <A class="texto" HREF='pcenajuda15.php'><img src="../pcenimg/duvida2.jpg" border=0> Ajuda 15 - Imprimir protocolo de agendamento</A>
      </td></tr>
      <tr><td> 
        <A class="texto" HREF='pcenajuda16.php'><img src="../pcenimg/duvida2.jpg" border=0> Ajuda 16 - Alterar meus agendamentos</A>
      </td></tr>
      <tr><td> 
        <A class="texto" HREF='pcenajuda17.php'><img src="../pcenimg/duvida2.jpg" border=0> Ajuda 17 - Excluir data/hora de meus agendamentos</A>
      </td></tr>
      <tr><td> 
        <A class="texto" HREF='pcenajuda02.php'><img src="../pcenimg/duvida2.jpg" border=0> Ajuda 02 - Esqueceu senha e/ou conta (<i>nickname</i>) ?</A>
      </td></tr>
      <tr><td> 
        <A class="texto" HREF='pcenajuda10.php'><img src="../pcenimg/duvida2.jpg" border=0> Ajuda 10 - Indicar MEUS pares avaliadores</A>
      </td></tr>
      <tr><td> 
        <A class="texto" HREF='pcenajuda11.php'><img src="../pcenimg/duvida2.jpg" border=0> Ajuda 11 - Indicar pares avaliadores de meus supervisionados</A>
      </td></tr>    
      <tr><td> 
        <A class="texto" HREF='pcenajuda05.php'><img src="../pcenimg/duvida2.jpg" border=0> Ajuda 05 - Elaborar Protocolo de Entrega de Folha de Ponto</A>
      </td></tr>
      <tr><td> 
        <A class="texto" HREF='pcenajuda06.php'><img src="../pcenimg/duvida2.jpg" border=0> Ajuda 06 - Imprimir Protocolo de Entrega de Folha de Ponto</A>
      </td></tr>
      <tr><td> 
        <A class="texto" HREF='pcenajuda07.php'><img src="../pcenimg/duvida2.jpg" border=0> Ajuda 07 - Ver <i>status</i> de entrega das minhas Folhas de Ponto</A>           </td></tr>
      <tr><td> 
<!--        <A class="texto" HREF='pcenajuda08.php'><img src="../pcenimg/duvida2.jpg" border=0> Ajuda 08 - Empregado - marcação de férias</A>
      </td></tr>
      <tr><td> 
        <A class="texto" HREF='pcenajuda09.php'><img src="../pcenimg/duvida2.jpg" border=0> Ajuda 09 - Supervisor - férias de meus supervisionados</A>   
      </td></tr>   -->
   </table>   
</TD>
<TD align='center' width="40%">
   <img src="../pcvgimg/cvgtela01.png" name="pic01" border=1>
</TD>
<TD width="20%">
</TD>
</TR>
</Table>
<p>

<?php require ("../pcvginc/pcvgRODAPE01.inc") ?>
  
</html>
