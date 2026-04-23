<?php header('Content-Type: text/html; charset=ISO-8859-1',true) ?>

<?php require("pcvgdao001.php") ?>

<?php

//====================================//
// Servlet de Dados                   //
//====================================//
$vOpcao = $_POST['opcao'];

if     ($vOpcao == "000-usuario") {
   $vPar01 = $_POST['nickusr'];
   $vPar02 = $_POST['senha'];
   fdao000_Usuario_Existe($vPar01, $vPar02);       
}
else if ($vOpcao == "000-pegar-data-hora-do-sistema") {       
   fdao000_Pegar_Data_Hora_Do_Sistema(); 
}
else if ($vOpcao == "000b-???") {      
}
else if ($vOpcao == "001-listar-funcionario") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['nomepessoa'];
   $vPar04 = $_POST['matric'];   
   fdao001_Listar_Funcionarios($vPar01, $vPar02, $vPar03, $vPar04);       
}
else if ($vOpcao == "001a-listar-pessoa-nao-func-ainda") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['nomepessoa'];
   $vPar04 = $_POST['matric'];   
   fdao001a_Listar_Pessoas_Nao_Func_Ainda($vPar01, $vPar02, $vPar03, $vPar04);       
}
else if ($vOpcao == "002-existe-funcionario") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['nomepessoa'];
   $vPar04 = $_POST['cpfpessoa'];   
   $vPar05 = $_POST['matric'];   
   $vPar06 = $_POST['nickname'];   
   fdao002_Existe_Funcionario($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06);       
}
else if ( ($vOpcao == "003-efetivar-inclusao-funcionario") ||
          ($vOpcao == "004-efetivar-alteracao-funcionario")  ) {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['nomepessoa'];
   $vPar04 = $_POST['cpfpessoa'];   
   $vPar05 = $_POST['datanasc'];   
   $vPar06 = $_POST['diamesnasc'];   
   $vPar07 = $_POST['idpaisres'];
   $vPar08 = $_POST['idestadores'];
   $vPar09 = $_POST['idmunicres'];
   $vPar10 = $_POST['enderecores'];   
   $vPar11 = $_POST['bairrores'];   
   $vPar12 = $_POST['cepres'];   
   $vPar13 = $_POST['fonesres'];
   $vPar14 = $_POST['celulares'];
   $vPar15 = $_POST['fax'];
   $vPar16 = $_POST['email1'];   
   $vPar17 = $_POST['email2'];   
   $vPar18 = $_POST['obspessoa'];   
   $vPar19 = $_POST['dtadmissao'];
   $vPar20 = $_POST['matric'];
   $vPar21 = $_POST['ramais'];
   $vPar22 = $_POST['emailinstit'];
   $vPar23 = $_POST['idunidade'];   
   $vPar24 = $_POST['idcargo'];   
   $vPar25 = $_POST['idorganograma'];   
   $vPar26 = $_POST['idlotacao'];   
   $vPar27 = $_POST['idagrupamento'];
   $vPar28 = $_POST['codafastsirh'];
   $vPar29 = $_POST['dtafasini'];
   $vPar30 = $_POST['dtafasfim'];   
   $vPar31 = $_POST['pontofunc'];   
   $vPar32 = $_POST['temconselho'];   
   $vPar33 = $_POST['numasos'];   
   $vPar34 = $_POST['idsupervfolhaponto'];
   $vPar35 = $_POST['idsupervmarcacaoferias'];
   $vPar36 = $_POST['outorgadospaservgraf'];
   $vPar37 = $_POST['nickusr'];   
   $vPar38 = $_POST['senha'];   
   $vPar39 = $_POST['nickldap'];   
   $vPar40 = $_POST['idusrinc'];
   $vPar41 = $_POST['datainc'];
   $vPar42 = $_POST['idusralt'];
   $vPar43 = $_POST['dataalt'];
   if ($vOpcao == "003-efetivar-inclusao-funcionario") {
      fdao003_Incluir_Funcionario($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
                                  $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                                  $vPar13, $vPar14, $vPar15, $vPar16, $vPar17, $vPar18,
                                  $vPar19, $vPar20, $vPar21, $vPar22, $vPar23, $vPar24,
                                  $vPar25, $vPar26, $vPar27, $vPar28, $vPar29, $vPar30,
                                  $vPar31, $vPar32, $vPar33, $vPar34, $vPar35, $vPar36, 
                                  $vPar37, $vPar38, $vPar39, $vPar40, $vPar41, $vPar42, $vPar43);                  
   }  
   else {
      fdao004_Alterar_Funcionario($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
                                  $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                                  $vPar13, $vPar14, $vPar15, $vPar16, $vPar17, $vPar18,
                                  $vPar19, $vPar20, $vPar21, $vPar22, $vPar23, $vPar24,
                                  $vPar25, $vPar26, $vPar27, $vPar28, $vPar29, $vPar30,
                                  $vPar31, $vPar32, $vPar33, $vPar34, $vPar35, $vPar36, 
                                  $vPar37, $vPar38, $vPar39, $vPar40, $vPar41, $vPar42, $vPar43);                  
   }
   
}
else if ($vOpcao == "005-listar-pessoafisica") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['nomepessoa'];
   $vPar04 = $_POST['filtropessoa'];
   fdao008_Listar_PessoaFisica($vPar01, $vPar02, $vPar03, $vPar04);       
}
else if ($vOpcao == "006-existe-pessoafisica") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['nomepessoa'];
   $vPar04 = $_POST['cpfpessoa'];   
   $vPar05 = $_POST['nickname'];   
   fdao009_Existe_PessoaFisica($vPar01, $vPar02, $vPar03, $vPar04, $vPar05);       
}
else if ( ($vOpcao == "007-efetivar-inclusao-pessoafisica") ||
         ($vOpcao == "008-efetivar-alteracao-pessoafisica")  ) {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['nomepessoa'];
   $vPar04 = $_POST['cpfpessoa'];   
   $vPar05 = $_POST['cartident'];   
   $vPar06 = $_POST['datanasc'];   
   $vPar07 = $_POST['diamesnasc'];   
   $vPar08 = $_POST['idpaisres'];
   $vPar09 = $_POST['idestadores'];
   $vPar10 = $_POST['idmunicres'];
   $vPar11 = $_POST['enderecores'];   
   $vPar12 = $_POST['bairrores'];   
   $vPar13 = $_POST['cepres'];   
   $vPar14 = $_POST['fonesres'];
   $vPar15 = $_POST['celulares'];
   $vPar16 = $_POST['fax'];
   $vPar17 = $_POST['email1'];   
   $vPar18 = $_POST['email2'];   
   $vPar19 = $_POST['obspessoa'];   
   $vPar20 = $_POST['nickusr'];   
   $vPar21 = $_POST['senha'];   
   $vPar22 = $_POST['perfilusr'];   
   $vPar23 = $_POST['nickldap'];   
   $vPar24 = $_POST['idusrinc'];
   $vPar25 = $_POST['datainc'];
   $vPar26 = $_POST['idusralt'];
   $vPar27 = $_POST['dataalt'];
   if ($vOpcao == "007-efetivar-inclusao-pessoafisica") {
      fdao010_Incluir_PessoaFisica($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
                                   $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                                   $vPar13, $vPar14, $vPar15, $vPar16, $vPar17, $vPar18,
                                   $vPar19, $vPar20, $vPar21, $vPar22,
                                   $vPar23, $vPar24, $vPar25, $vPar26, $vPar27);                     
   }  
   else {
      fdao011_Alterar_PessoaFisica($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
                                   $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                                   $vPar13, $vPar14, $vPar15, $vPar16, $vPar17, $vPar18,
                                   $vPar19, $vPar20, $vPar21, $vPar22, 
                                   $vPar23, $vPar24, $vPar25, $vPar26, $vPar27);                     
   }
   
}
else if ($vOpcao == "012-listar-ponto-funcionario") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['nomesuperv'];
   $vPar04 = $_POST['nomepessoa'];
   $vPar05 = $_POST['siglalotacao'];
   $vPar06 = $_POST['ordenacao'];
   $vPar07 = $_POST['anomesponto'];   
   $vPar08 = $_POST['oppontofunc'];   
   fdao012_Listar_Ponto_Funcionarios($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, 
                                     $vPar06, $vPar07, $vPar08);       
}
else if ($vOpcao == "012a-listar-status-ponto-funcionario") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['anoini'];
   $vPar04 = $_POST['aanofim'];
   fdao012a_Listar_Status_Ponto_Funcionario($vPar01, $vPar02, $vPar03, $vPar04);       
}
else if ($vOpcao == "013-alterar-status-ponto-funcionario") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['anomesponto'];
   $vPar03 = $_POST['idprotocolo'];
   $vPar04 = $_POST['alteracoes'];
   $vPar05 = $_POST['idusrinc'];
   fdao013_Alterar_Status_Ponto_Funcionarios($vPar01, $vPar02, $vPar03, $vPar04, $vPar05);       
}
else if ($vOpcao == "014-listar-historico-ponto-funcionario") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['anomesponto'];
   fdao014_Listar_Historico_Ponto_Funcionario($vPar01, $vPar02, $vPar03);         
}
else if ($vOpcao == "015-enviar-email") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['anomesponto'];
   $vPar04 = $_POST['msgemail'];
   $vPar05 = $_POST['emailfunc'];
   $vPar06 = $_POST['nomefunc'];
   $vPar07 = $_POST['emailsuperv'];
   $vPar08 = $_POST['nomesuperv'];
   $vPar09 = $_POST['status'];
   $vPar10 = $_POST['idusrinc'];
   $vPar11 = $_POST['totemails'];
   $vPar12 = $_POST['numemail'];
   $vPar13 = $_POST['opmailaguardandodespachosgp'];
   $vPar14 = $_POST['opmailnaoentregue'];
   $vPar15 = $_POST['opmailentregueanalise'];
   $vPar16 = $_POST['opmaildevolvidopendencias'];
   $vPar17 = $_POST['opmailentregueok'];
   fdao015_Enviar_Email($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06, 
                        $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                        $vPar13, $vPar14, $vPar15, $vPar16, $vPar17);         
}
else if ($vOpcao == "015a-enviar-email") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idprotocolo'];
   $vPar03 = $_POST['numprotocolo'];
   $vPar04 = $_POST['dataprotocolo'];
   $vPar05 = $_POST['idfuncanomes'];
   $vPar06 = $_POST['anomesponto'];
   $vPar07 = $_POST['msgemail'];
   $vPar08 = $_POST['opemailfunc'];
   $vPar09 = $_POST['emailfunc'];
   $vPar10 = $_POST['nomefunc'];
   $vPar11 = $_POST['opemailsuperv'];
   $vPar12 = $_POST['emailsuperv'];
   $vPar13 = $_POST['nomesuperv'];
   $vPar14 = $_POST['opemailelab'];
   $vPar15 = $_POST['email1elab'];
   $vPar16 = $_POST['emailinstitelab'];
   $vPar17 = $_POST['nomeelab'];
   $vPar18 = $_POST['status'];
   $vPar19 = $_POST['idusrinc'];
   $vPar20 = $_POST['totemails'];
   $vPar21 = $_POST['numemail'];
   fdao015a_Enviar_Email($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, 
                         $vPar06, $vPar07, $vPar08, $vPar09, $vPar10, 
                         $vPar11, $vPar12, $vPar13, $vPar14, $vPar15, 
                         $vPar16, $vPar17, $vPar18, $vPar19, $vPar20, $vPar21);         
}

else if ($vOpcao == "015b-enviar-email") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['tipoevento'];
   $vPar04 = $_POST['tituloevento'];
   $vPar05 = $_POST['cargahoraria'];
   $vPar06 = $_POST['datainievento'];
   $vPar07 = $_POST['datafimevento'];
   $vPar08 = $_POST['horarioevento'];
   $vPar09 = $_POST['localrealizacao'];
   $vPar10 = $_POST['infraestrutura'];
   $vPar11 = $_POST['observacao'];
   $vPar12 = $_POST['emailpessoa'];
   $vPar13 = $_POST['nomepessoa'];
   $vPar14 = $_POST['msggeral'];
   $vPar15 = $_POST['msgemail'];
   $vPar16 = $_POST['statusinscr'];
   $vPar17 = $_POST['totemails'];
   $vPar18 = $_POST['numemail'];
   fdao015b_Enviar_Email($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06, 
                         $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                         $vPar13, $vPar14, $vPar15, $vPar16, $vPar17, $vPar18);         
}

else if ($vOpcao == "016-listar-mapa-ponto-funcionario") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['echoparajavascript'];
   $vPar03 = $_POST['idpessoa'];
   $vPar04 = $_POST['nomesuperv'];
   $vPar05 = $_POST['nomepessoa'];
   $vPar06 = $_POST['siglalotacao'];
   $vPar07 = $_POST['ordenacao'];
   $vPar08 = $_POST['anomespontoini'];   
   $vPar09 = $_POST['anomespontofim'];   
   $vPar10 = $_POST['oppontofunc'];   
   fdao016_Listar_Mapa_Ponto_Funcionarios($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, 
                                          $vPar06, $vPar07, $vPar08, $vPar09, $vPar10);          
}
else if ($vOpcao == "016a-relat-txt-mapa-ponto-funcionario") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idusr'];
   $vPar03 = $_POST['echoparajavascript'];
   $vPar04 = $_POST['idpessoa'];
   $vPar05 = $_POST['nomesuperv'];
   $vPar06 = $_POST['nomepessoa'];
   $vPar07 = $_POST['siglalotacao'];
   $vPar08 = $_POST['ordenacao'];
   $vPar09 = $_POST['anomespontoini'];   
   $vPar10 = $_POST['anomespontofim'];   
   $vPar11 = $_POST['oppontofunc'];   
   fdao016a_Relat_Txt_Mapa_Ponto_Funcionarios($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, 
                                              $vPar06, $vPar07, $vPar08, $vPar09, $vPar10, $vPar11);          
}
else if ($vOpcao == "017-listar-evento") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idevento'];
   $vPar03 = $_POST['nomeevento'];
   $vPar04 = $_POST['datahojeaaaammdd'];
   fdao017_Listar_Eventos($vPar01, $vPar02, $vPar03, $vPar04);       
}
else if ($vOpcao == "018-existe-evento") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idevento'];
   $vPar03 = $_POST['nomeevento'];
   fdao018_Existe_Evento($vPar01, $vPar02, $vPar03);       
}
else if ( ($vOpcao == "019-efetivar-inclusao-evento") ||
         ($vOpcao == "020-efetivar-alteracao-evento")  ) {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idevento'];
   $vPar03 = $_POST['anoevento'];
   $vPar04 = $_POST['nomeevento'];   
   $vPar05 = $_POST['siglaevento'];   
   $vPar06 = $_POST['dtinievento'];   
   $vPar07 = $_POST['dtfimevento'];
   $vPar08 = $_POST['idpaisevento'];
   $vPar09 = $_POST['idestadoevento'];
   $vPar10 = $_POST['idmunicevento'];   
   $vPar11 = $_POST['idusrinc'];   
   $vPar12 = $_POST['datainc'];   
   $vPar13 = $_POST['idusralt'];
   $vPar14 = $_POST['dataalt'];
   if ($vOpcao == "019-efetivar-inclusao-evento") {
      fdao019_Incluir_Evento($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
                             $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                             $vPar13, $vPar14);                  
   }  
   else {
      fdao020_Alterar_Evento($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
                             $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                             $vPar13, $vPar14);                  
   }   
}
else if ($vOpcao == "020a-excluir-evento") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idevento'];
   fdao020a_Excluir_Evento($vPar01, $vPar02);       
}

else if ($vOpcao == "021-listar-agenda-serv-graf") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['datahojeaaaammdd'];
   $vPar03 = $_POST['totmeses'];
   fdao021_Listar_Agenda_Serv_Graf($vPar01, $vPar02, $vPar03);       
}

else if ($vOpcao == "022-listar-solicit-serv-graf") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['idsolicit'];
   $vPar04 = $_POST['anosolicit'];
   $vPar05 = $_POST['numsolicit'];
   $vPar06 = $_POST['idstatussolicit'];
   $vPar07 = $_POST['tiposervgraf'];
   $vPar08 = $_POST['idplanoacao'];
   $vPar09 = $_POST['nomeevento'];
   $vPar10 = $_POST['paisevento'];
   $vPar11 = $_POST['estadoevento'];
   $vPar12 = $_POST['municevento'];
   fdao022_Listar_Solicitacao_Serv_Graf($vPar01, $vPar02, $vPar03, $vPar04, 
                                        $vPar05, $vPar06, $vPar07, $vPar08, 
                                        $vPar09, $vPar10, $vPar11, $vPar12);       
}

else if ($vOpcao == "022a-listar-solicit-serv-graf") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['idsolicit'];
   $vPar04 = $_POST['anosolicit'];
   $vPar05 = $_POST['numsolicitini'];
   $vPar06 = $_POST['numsolicitfim'];
   $vPar07 = $_POST['datasolicitini'];
   $vPar08 = $_POST['datasolicitfim'];
   $vPar09 = $_POST['nomesolicit'];
   $vPar10 = $_POST['idstatussolicit'];
   $vPar11 = $_POST['idtiposervgraf'];
   $vPar12 = $_POST['idplanoacao'];
   $vPar13 = $_POST['nomeevento'];
   $vPar14 = $_POST['paisevento'];
   $vPar15 = $_POST['estadoevento'];
   $vPar16 = $_POST['municevento'];
   $vPar17 = $_POST['descrservgraf'];
   $vPar18 = $_POST['dataagendaini'];
   $vPar19 = $_POST['dataagendafim'];
   $vPar20 = $_POST['dataentregaini'];
   $vPar21 = $_POST['dataentregafim'];
   fdao022a_Listar_Solicitacao_Serv_Graf($vPar01, $vPar02, $vPar03, $vPar04, 
                                        $vPar05, $vPar06, $vPar07, $vPar08, 
                                        $vPar09, $vPar10, $vPar11, $vPar12,       
                                        $vPar13, $vPar14, $vPar15, $vPar16,       
                                        $vPar17, $vPar18, $vPar19, $vPar20, $vPar21);       
}

else if ( ($vOpcao == "023-efetivar-inclusao-solicit-serv-graf") ||
         ($vOpcao == "024-efetivar-alteracao-solicit-serv-graf")  ) {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idsolicit'];
   $vPar03 = $_POST['anosolicit'];
   $vPar04 = $_POST['numsolicit'];   
   $vPar05 = $_POST['datasolicit'];   
   $vPar06 = $_POST['idstatussolicit'];   
   $vPar07 = $_POST['idpessoa'];
   $vPar08 = $_POST['idtiposervgraf'];
   $vPar09 = $_POST['idsubidcti'];
   $vPar10 = $_POST['idevento'];   
   $vPar11 = $_POST['descservgraf'];   
   $vPar12 = $_POST['dataagenda'];   
   $vPar13 = $_POST['horaagenda'];   
   $vPar14 = $_POST['datapreventrega'];   
   $vPar15 = $_POST['idstatusagenda'];      
   $vPar16 = $_POST['solicitante'];      
   $vPar17 = $_POST['tiposervgraf'];      
   $vPar18 = $_POST['titplanoacao'];      
   $vPar19 = $_POST['numplanoacao'];      
   $vPar20 = $_POST['iniplanoacao'];      
   $vPar21 = $_POST['fimplanoacao'];      
   $vPar22 = $_POST['nomeevento'];      
   $vPar23 = $_POST['siglaevento'];      
   $vPar24 = $_POST['dtinievento'];      
   $vPar25 = $_POST['dtfimevento'];      
   $vPar26 = $_POST['idusrinc'];   
   $vPar27 = $_POST['datainc'];   
   $vPar28 = $_POST['idusralt'];
   $vPar29 = $_POST['dataalt'];
   if ($vOpcao == "023-efetivar-inclusao-solicit-serv-graf") {
      fdao023_Incluir_Serv_Graf($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
                                $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                                $vPar13, $vPar14, $vPar15, $vPar16, $vPar17, $vPar18,
                                $vPar19, $vPar20, $vPar21, $vPar22, $vPar23, $vPar24,
                                $vPar25, $vPar26, $vPar27, $vPar28, $vPar29);                  
   }  
   else {
      fdao024_Alterar_Serv_Graf($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
                                $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                                $vPar13, $vPar14, $vPar15, $vPar16, $vPar17, $vPar18,
                                $vPar19, $vPar20, $vPar21, $vPar22, $vPar23, $vPar24,
                                $vPar25, $vPar26, $vPar27, $vPar28, $vPar29);                  
   }   
}

else if ($vOpcao == "025-cancelar-solicit-serv-graf") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idsolicit'];
   $vPar03 = $_POST['idstatussolicit'];
   $vPar04 = $_POST['idusralt'];
   $vPar05 = $_POST['dataalt'];
   fdao025_Cancelar_Serv_Graf($vPar01, $vPar02, $vPar03, $vPar04, $vPar05);       
}

else if ($vOpcao == "026-listar-tipo-serv-graf") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idtiposervgraf'];
   $vPar03 = $_POST['tiposervgraf'];
   fdao026_Listar_Tipo_Serv_Graf($vPar01, $vPar02, $vPar03);       
}

else if ( ($vOpcao == "027-efetivar-inclusao-execucao-serv-graf") ||
         ($vOpcao == "028-efetivar-alteracao-execucao-serv-graf")  ) {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idsolicit'];
   $vPar03 = $_POST['enviouemail'];
   $vPar04 = $_POST['textoemail'];   
   $vPar05 = $_POST['idstatussolicit'];   
   $vPar06 = $_POST['statussolicit'];   
   $vPar07 = $_POST['dataagenda'];   
   $vPar08 = $_POST['horaagenda'];   
   $vPar09 = $_POST['datapreventrega'];   
   $vPar10 = $_POST['idstatusagenda'];      
   $vPar11 = $_POST['numsolicit'];   
   $vPar12 = $_POST['datasolicit'];   
   $vPar13 = $_POST['nomesolicit'];      
   $vPar14 = $_POST['emailorigem'];   
   $vPar15 = $_POST['emaildestino'];   
   $vPar16 = $_POST['tiposervgraf'];   
   $vPar17 = $_POST['nomevento'];   
   $vPar18 = $_POST['siglaevento'];   
   $vPar19 = $_POST['dtinivento'];   
   $vPar20 = $_POST['dtfimevento'];   
   $vPar21 = $_POST['codpa'];   
   $vPar22 = $_POST['dtinipa'];   
   $vPar23 = $_POST['dtfimpa'];   
   $vPar24 = $_POST['descrservgraf'];   
   $vPar25 = $_POST['idusrinc'];   
   $vPar26 = $_POST['datainc'];   
   $vPar27 = $_POST['idusralt'];
   $vPar28 = $_POST['dataalt'];
   if ($vOpcao == "027-efetivar-inclusao-execucao-serv-graf") {
//      fdao027_Incluir_ExecucaoServ_Graf($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
//                                        $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
//                                        $vPar13, $vPar14, $vPar15, $vPar16, $vPar17, $vPar18,
//                                        $vPar19);                  
   }  
   else {
      fdao028_Alterar_Execucao_Serv_Graf($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
                                         $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                                         $vPar13, $vPar14, $vPar15, $vPar16, $vPar17, $vPar18,
                                         $vPar19, $vPar20, $vPar21, $vPar22, $vPar23, $vPar24,
                                         $vPar25, $vPar26, $vPar27, $vPar28);                  
   }      
   
}

else if ($vOpcao == "029-bloq-desbloq-agenda-serv-graf") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['dataaaaammdd'];
   $vPar03 = $_POST['horariobloqdesbloq'];
   fdao029_Bloquear_Desbloquear_Agenda_Serv_Graf($vPar01, $vPar02, $vPar03);       
}

else if ($vOpcao == "030-email-help-conta-de-acesso") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['emailsolicitante'];
   fdao030_Email_Help_Conta_Acesso($vPar01, $vPar02);       
}

else if ($vOpcao == "031-supervisor-funcionarios-por-tematica") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['tematica'];
   $vPar03 = $_POST['idpessoa'];
   $vPar04 = $_POST['nomesuperv'];
   $vPar05 = $_POST['nomepessoa'];
   $vPar06 = $_POST['oppontofunc'];
   $vPar07 = $_POST['ordenacao'];
   fdao031_Listar_Supervisor_Funcionarios_Por_Tematica($vPar01, $vPar02, $vPar03, $vPar04, 
                                                       $vPar05, $vPar06, $vPar07);        
}

else if ($vOpcao == "032-gerar-protocolo-folha-de-ponto") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idelaborador'];
   $vPar03 = $_POST['dataelaboracao'];
   $vPar04 = $_POST['obs'];
   $vPar05 = $_POST['folhasponto'];
   fdao032_Gerar_Protocolo_Folha_De_Ponto($vPar01, $vPar02, $vPar03, $vPar04, $vPar05);        
}

else if ($vOpcao == "033-listar-protocolo-folha-de-ponto") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idprotocolo'];
   $vPar03 = $_POST['idelaborador'];
   $vPar04 = $_POST['idfunc'];
   $vPar05 = $_POST['dataelaboracao'];
   $vPar06 = $_POST['anoprotini'];
   $vPar07 = $_POST['numprotini'];
   $vPar08 = $_POST['anoprotfim'];
   $vPar09 = $_POST['numprotfim'];
   fdao033_Listar_Protocolo_Folha_De_Ponto($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, 
                                           $vPar06, $vPar07, $vPar08, $vPar09);        
}

else if ($vOpcao == "034-imprmir-protocolo-folha-de-ponto-em-disco") {
   $vPar01 = $_POST['idUsr'];
   $vPar02 = $_POST['aDados'];
   fdao034_Imprimir_Protocolo_Folha_De_Ponto_Em_Disco($vPar01, $vPar02);        
}

else if ($vOpcao == "034a-imprmir-protocolo-folha-de-ponto-em-disco") {
   $vPar01 = $_POST['idUsr'];
   $vPar02 = $_POST['aDados'];
   fdao034a_Imprimir_Protocolo_Folha_De_Ponto_Em_Disco($vPar01, $vPar02);        
}

else if ($vOpcao == "035-listar-historico-status-folha-de-ponto") {
   $vPar01 = $_POST['idfunc'];
   $vPar02 = $_POST['anomesponto'];
   fdao035_Listar_Historico_Status_Folha_De_Ponto($vPar01, $vPar02);        
}

else if ($vOpcao == "036-listar-estag-bolsista-etc") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idvinculo'];
   $vPar03 = $_POST['nomepessoa'];
   $vPar04 = $_POST['oppostxtnomepessoa'];
   $vPar05 = $_POST['idtipovinculo'];
   $vPar06 = $_POST['opstatusvinculo'];
   $vPar07 = $_POST['dtinivinculo'];
   $vPar08 = $_POST['dtfimvinculo'];
   $vPar09 = $_POST['dtiniencerrvinculo'];
   $vPar10 = $_POST['dtfimencerrvinculo'];
   $vPar11 = $_POST['dtiniterminovinculo'];
   $vPar12 = $_POST['dtfimterminovinculo'];
   $vPar13 = $_POST['idorientador'];
   $vPar14 = $_POST['orientador2'];
   $vPar15 = $_POST['oppostxtorientador2'];
   $vPar16 = $_POST['idescolaridade'];
   $vPar17 = $_POST['idcursograd'];
   $vPar18 = $_POST['areatematica'];
   $vPar19 = $_POST['oppostxtareatematica'];
   $vPar20 = $_POST['instit_temp'];
   $vPar21 = $_POST['oppostxtinstit_temp'];
   $vPar22 = $_POST['opseguro'];
   $vPar23 = $_POST['cargahoraria'];
   $vPar24 = $_POST['opfolhaponto'];
   $vPar25 = $_POST['opremunerado'];
   $vPar26 = $_POST['opradioatividade'];
   $vPar27 = $_POST['matrerp'];
   $vPar28 = $_POST['procsei'];
   $vPar29 = $_POST['numcracha'];
   $vPar30 = $_POST['tempendencia'];
   $vPar31 = $_POST['obspendencia'];
   $vPar32 = $_POST['opordenacao'];
   fdao036_Listar_EstagBolsistaEtc($vPar01, $vPar02, $vPar03, $vPar04, $vPar05,
                                   $vPar06, $vPar07, $vPar08, $vPar09, $vPar10,
                                   $vPar11, $vPar12, $vPar13, $vPar14, $vPar15,
                                   $vPar16, $vPar17, $vPar18, $vPar19, $vPar20,
                                   $vPar21, $vPar22, $vPar23, $vPar24, $vPar25,
                                   $vPar26, $vPar27, $vPar28, $vPar29, $vPar30,
                                   $vPar31, $vPar32
                                  );       
}

else if ($vOpcao == "036a-existe-estag-bolsista-etc") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['dtinivinculo'];
   fdao036a_Existe_EstagBolsista($vPar01, $vPar02, $vPar03);       
}

else if ( ($vOpcao == "037-efetivar-inclusao-estag-bolsista-etc")   ||
          ($vOpcao == "038-efetivar-alteracao-estag-bolsista-etc")  ||
          ($vOpcao == "039-efetivar-novo-vinculo-estag-bolsista-etc") )  {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idvinculo'];
   $vPar03 = $_POST['idpessoa'];
   $vPar04 = $_POST['nomepessoa'];
   $vPar05 = $_POST['cpfpessoa'];   
   $vPar06 = $_POST['cartident'];      
   $vPar07 = $_POST['datanasc'];   
   $vPar08 = $_POST['diamesnasc'];   
   $vPar09 = $_POST['idpaisres'];
   $vPar10 = $_POST['idestadores'];
   $vPar11 = $_POST['idmunicres'];
   $vPar12 = $_POST['enderecores'];   
   $vPar13 = $_POST['bairrores'];   
   $vPar14 = $_POST['cepres'];   
   $vPar15 = $_POST['fonesres'];
   $vPar16 = $_POST['celulares'];
   $vPar17 = $_POST['fax'];
   $vPar18 = $_POST['email1'];   
   $vPar19 = $_POST['email2'];   
   $vPar20 = $_POST['obspessoa'];   
   $vPar21 = $_POST['idtipovinculo'];   
   $vPar22 = $_POST['statusvinculo'];   
   $vPar23 = $_POST['cargahoraria'];   
   $vPar24 = $_POST['dtinivinculo'];   
   $vPar25 = $_POST['dtfimvinculo'];   
   $vPar26 = $_POST['dtencerrvinculo'];   
   $vPar27 = $_POST['dtinivinculoorig'];   
   $vPar28 = $_POST['idorientador'];   
   $vPar29 = $_POST['areatematica'];   
   $vPar30 = $_POST['seguro'];   
   $vPar31 = $_POST['folhaponto'];   
   $vPar32 = $_POST['remunerado'];   
   $vPar33 = $_POST['radioatividade'];   
   $vPar34 = $_POST['idescolaridade'];   
   $vPar35 = $_POST['idcursograd'];   
   $vPar36 = $_POST['instit_temp'];   
   $vPar37 = $_POST['lotacao'];   
   $vPar38 = $_POST['nucleo'];   
   $vPar39 = $_POST['laboratorio'];   
   $vPar40 = $_POST['projeto'];   
   $vPar41 = $_POST['fonterecurso'];   
   $vPar42 = $_POST['ramais'];  
   $vPar43 = $_POST['matrerp'];  
   $vPar44 = $_POST['procsei'];  
   $vPar45 = $_POST['numcracha'];  
   $vPar46 = $_POST['tempendencia'];  
   $vPar47 = $_POST['obspendencia'];  
   $vPar48 = $_POST['nickusr'];   
   $vPar49 = $_POST['senha'];   
   $vPar50 = $_POST['perfilusr'];   
   $vPar51 = $_POST['nickldap'];   
   $vPar52 = $_POST['idusrinc'];
   $vPar53 = $_POST['datainc'];
   $vPar54 = $_POST['idusralt'];
   $vPar55 = $_POST['dataalt'];
   $vPar56 = $_POST['operacao'];
   if ($vOpcao == "037-efetivar-inclusao-estag-bolsista-etc") {
      fdao037_Incluir_EstagBolsista($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
                                    $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                                    $vPar13, $vPar14, $vPar15, $vPar16, $vPar17, $vPar18,
                                    $vPar19, $vPar20, $vPar21, $vPar22, $vPar23, $vPar24, 
                                    $vPar25, $vPar26, $vPar27, $vPar28, $vPar29, $vPar30,                     
                                    $vPar31, $vPar32, $vPar33, $vPar34, $vPar35, $vPar36,                     
                                    $vPar37, $vPar38, $vPar39, $vPar40, $vPar41, $vPar42,                     
                                    $vPar43, $vPar44, $vPar45, $vPar46, $vPar47, $vPar48,
                                    $vPar49, $vPar50, $vPar51, $vPar52, $vPar53, $vPar54,
                                    $vPar55, $vPar56);       
   }  
   else if ($vOpcao == "038-efetivar-alteracao-estag-bolsista-etc") { 
      fdao038_Alterar_EstagBolsista($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
                                    $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                                    $vPar13, $vPar14, $vPar15, $vPar16, $vPar17, $vPar18,
                                    $vPar19, $vPar20, $vPar21, $vPar22, $vPar23, $vPar24, 
                                    $vPar25, $vPar26, $vPar27, $vPar28, $vPar29, $vPar30,                     
                                    $vPar31, $vPar32, $vPar33, $vPar34, $vPar35, $vPar36,                     
                                    $vPar37, $vPar38, $vPar39, $vPar40, $vPar41, $vPar42,                     
                                    $vPar43, $vPar44, $vPar45, $vPar46, $vPar47, $vPar48,
                                    $vPar49, $vPar50, $vPar51, $vPar52, $vPar53, $vPar54,
                                    $vPar55, $vPar56);       
   }
   else if ($vOpcao == "039-efetivar-novo-vinculo-estag-bolsista-etc") { 
      fdao039_Novo_Vinculo_EstagBolsista($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
                                         $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                                         $vPar13, $vPar14, $vPar15, $vPar16, $vPar17, $vPar18,
                                         $vPar19, $vPar20, $vPar21, $vPar22, $vPar23, $vPar24, 
                                         $vPar25, $vPar26, $vPar27, $vPar28, $vPar29, $vPar30,                     
                                         $vPar31, $vPar32, $vPar33, $vPar34, $vPar35, $vPar36,                     
                                         $vPar37, $vPar38, $vPar39, $vPar40, $vPar41, $vPar42,                     
                                         $vPar43, $vPar44, $vPar45, $vPar46, $vPar47, $vPar48,
                                         $vPar49, $vPar50, $vPar51, $vPar52, $vPar53, $vPar54,
                                         $vPar55, $vPar56);       
   }
   
}
else if ($vOpcao == "039-importar-marcacao-ferias") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['periodomarcacao'];
   $vPar03 = $_POST['matric'];
   $vPar04 = $_POST['numlinharelsirh'];   
   $vPar05 = $_POST['linharelsirh'];   
   $vPar06 = $_POST['dtadmissao'];   
   $vPar07 = $_POST['dtiniaquis'];
   $vPar08 = $_POST['dtfimaquis'];
   $vPar09 = $_POST['dtiniconc'];
   $vPar10 = $_POST['dtfimconc'];   
   $vPar11 = $_POST['temparc1sirh'];
   $vPar12 = $_POST['totdiasp1sirh'];
   $vPar13 = $_POST['temparc2sirh'];
   $vPar14 = $_POST['totdiasp2sirh'];
   $vPar15 = $_POST['parcelamento'];
   $vPar16 = $_POST['abono'];
   $vPar17 = $_POST['dtinigozo'];   
   $vPar18 = $_POST['dtfimgozo'];   
   $vPar19 = $_POST['13salario'];
   $vPar20 = $_POST['devolucao'];   
   $vPar21 = $_POST['obs'];   
   fdao039_Importar_Marcacao_Ferias($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
                                    $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                                    $vPar13, $vPar14, $vPar15, $vPar16, $vPar17, $vPar18, 
                                    $vPar19, $vPar20, $vPar21);                     
    
}

else if  ($vOpcao == "040-consulta-data-limite-marcacao-ferias") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['evento'];
   fdao040_Consulta_Data_Limite_Marcacao_Ferias($vPar01, $vPar02);          
   
}

else if  ($vOpcao == "040a-consulta-data-limite-lista-ferias-supervisionados") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['evento'];
   fdao040a_Consulta_Data_Limite_Lista_Ferias_Supervisionados($vPar01, $vPar02);          
   
}

else if  ($vOpcao == "041-listar-marcacao-ferias-funcionario") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['marcacaoferias'];
   $vPar03 = $_POST['idfuncionario'];
   $vPar04 = $_POST['matric'];
   $vPar05 = $_POST['numlinharelsirh'];
   $vPar06 = $_POST['nomesuperv'];
   $vPar07 = $_POST['nomepessoa'];
   $vPar08 = $_POST['ordenacao'];
   $vPar09 = $_POST['datafinalconcessivo'];
   $vPar10 = $_POST['opnaomarcouferias'];
   fdao041_Listar_Marcacao_Ferias($vPar01, $vPar02, $vPar03, $vPar04, $vPar05,
                                  $vPar06, $vPar07, $vPar08, $vPar09, $vPar10);             
}

else if ($vOpcao == "042-efetivar-marcacao-ferias") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['periodomarcacao'];
   $vPar03 = $_POST['matric'];
   $vPar04 = $_POST['numlinharelsirh'];   
   $vPar05 = $_POST['temparc1sirh'];
   $vPar06 = $_POST['totdiasp1sirh'];
   $vPar07 = $_POST['temparc2sirh'];
   $vPar08 = $_POST['totdiasp2sirh'];
   $vPar09 = $_POST['parcelamento'];
   $vPar10 = $_POST['abono'];
   $vPar11 = $_POST['dtinigozo'];   
   $vPar12 = $_POST['dtfimgozo'];   
   $vPar13 = $_POST['13salario'];
   $vPar14 = $_POST['devolferias'];   
   $vPar15 = $_POST['abono2'];
   $vPar16 = $_POST['dtinigozo2'];   
   $vPar17 = $_POST['dtfimgozo2'];   
   $vPar18 = $_POST['13salario2'];
   $vPar19 = $_POST['devolferias2'];   
   $vPar20 = $_POST['idusralt'];   
   $vPar21 = $_POST['dataalt'];   
   fdao042_Efetivar_Marcacao_Ferias($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
                                    $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                                    $vPar13, $vPar14, $vPar15, $vPar16, $vPar17, $vPar18, 
                                    $vPar19, $vPar20, $vPar21);                     
    
}

else if  ($vOpcao == "043-enviar-email-marcacao-ferias") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['idpessoalintable'];
   $vPar04 = $_POST['msgemail'];
   $vPar05 = $_POST['emailfunc'];
   $vPar06 = $_POST['nomefunc'];
   $vPar07 = $_POST['aquisfunc'];
   $vPar08 = $_POST['concesfunc'];
   $vPar09 = $_POST['nomesuperv'];
   $vPar10 = $_POST['totemails'];
   $vPar11 = $_POST['numemail'];
   fdao043_Enviar_Email_MarcacaoFerias($vPar01, $vPar02, $vPar03, $vPar04, $vPar05,
                                       $vPar06, $vPar07, $vPar08, $vPar09, $vPar10, $vPar11);             
}

else if ($vOpcao == "044-imprmir-lista-marcacao-ferias-em-disco") {
   $vPar01 = $_POST['idUsr'];
   $vPar02 = $_POST['aDados'];
   fdao044_Imprimir_Lista_Marcacao_Ferias_Em_Disco($vPar01, $vPar02);        
}

else if ($vOpcao == "045-listar-supervisor-marcacao-ferias") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['marcacaoferias'];
   $vPar03 = $_POST['nomesuperv'];
   $vPar04 = $_POST['nomepessoa'];
   $vPar05 = $_POST['datafinalconcessivo'];
   $vPar06 = $_POST['opnaomarcouferias'];
   fdao045_Imprimir_Lista_Supervisor_Marcacao_Ferias($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06);        
}

else if ($vOpcao == "046-listar-tipo-evento-cenargen") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idtipoevento'];
   $vPar03 = $_POST['tipoevento'];
   fdao046_Listar_Tipo_Evento_Cenargen($vPar01, $vPar02, $vPar03);       
}

else if ($vOpcao == "047-listar-status-pessoa-evento-cenargen") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idstatuspessoa'];
   $vPar03 = $_POST['statuspessoa'];
   fdao047_Listar_Status_Pessoa_Evento_Cenargen($vPar01, $vPar02, $vPar03);       
}

else if ($vOpcao == "048-listar-proposta-evento-cenargen-solicitante") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idevento'];
   $vPar03 = $_POST['idsolicitante'];
   $vPar04 = $_POST['solicitante'];
   $vPar05 = $_POST['anoevento'];
   $vPar06 = $_POST['idstatusevento'];
   $vPar07 = $_POST['idtipoevento'];
   $vPar08 = $_POST['tituloevento'];
   fdao048_Listar_Proposta_Evento_Cenargen($vPar01, $vPar02, $vPar03, $vPar04,
                                           $vPar05, $vPar06, $vPar07, $vPar08);       
   
}

else if ($vOpcao == "049-efetivar-inclusao-alteracao-proposta-evento-cenargen") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['operacao'];
   $vPar03 = $_POST['idevento'];
   $vPar04 = $_POST['idsolicitante'];
   $vPar05 = $_POST['idtipoevento'];   
   $vPar06 = $_POST['idstatusevento'];   
   $vPar07 = $_POST['tituloevento'];   
   $vPar08 = $_POST['cargahoraria'];
   $vPar09 = $_POST['idpublicoalvo'];
   $vPar10 = $_POST['minimoparticip'];
   $vPar11 = $_POST['maximoparticip'];
   $vPar12 = $_POST['dtinievento'];   
   $vPar13 = $_POST['dtfimevento'];   
   $vPar14 = $_POST['horario'];   
   $vPar15 = $_POST['dtiniinscr'];
   $vPar16 = $_POST['dtfiminscr'];
   $vPar17 = $_POST['localrealizacao'];
   $vPar18 = $_POST['infraestrutura'];   
   $vPar19 = $_POST['prereq'];   
   $vPar20 = $_POST['objgeral'];   
   $vPar21 = $_POST['objespecifico'];
   $vPar22 = $_POST['conteudoprogr'];
   $vPar23 = $_POST['observacao'];
   $vPar24 = $_POST['responsaveisevento'];
   $vPar25 = $_POST['statusinscricao'];
   $vPar26 = $_POST['idusrinc'];
   $vPar27 = $_POST['datainc'];
   $vPar28 = $_POST['idusralt'];
   $vPar29 = $_POST['dataalt'];
   
   fdao049_Incluir_Alterar_Proposta_Evento_Cenargen($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06,
                                                    $vPar07, $vPar08, $vPar09, $vPar10, $vPar11, $vPar12,
                                                    $vPar13, $vPar14, $vPar15, $vPar16, $vPar17, $vPar18,
                                                    $vPar19, $vPar20, $vPar21, $vPar22, $vPar23, $vPar24,
                                                    $vPar25, $vPar26, $vPar27, $vPar28, $vPar29);                       
   
}

else if ($vOpcao == "050-listar-status-evento-cenargen") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idstatusevento'];
   $vPar03 = $_POST['statusevento'];
   fdao050_Listar_Status_Evento_Cenargen($vPar01, $vPar02, $vPar03);       
}

else if ($vOpcao == "051-enviar-email") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['assuntoemail'];
   $vPar03 = $_POST['msgemail'];
   $vPar04 = $_POST['emailde'];
   $vPar05 = $_POST['emailpara'];
   fdao051_Enviar_Email($vPar01, $vPar02, $vPar03, $vPar04, $vPar05); 
}

else if ($vOpcao == "052-verificar-situacao-cpf") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['cpf'];
   fdao052_Verificar_Situacao_Cpf($vPar01, $vPar02);       
}

else if ($vOpcao == "053-verificar-situacao-cpf-pessoa-externo") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['cpf'];
   fdao053_Verificar_Situacao_Cpf_Pessoa_Externo($vPar01, $vPar02);       
}

else if ($vOpcao == "054-homologar-pre-inscricao") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idpessoa'];
   $vPar03 = $_POST['cpf'];
   $vPar04 = $_POST['nomepessoa'];
   $vPar05 = $_POST['email'];
   $vPar06 = $_POST['fones'];
   $vPar07 = $_POST['idevento'];
   $vPar08 = $_POST['emailtavabranco'];
   fdao054_Homologar_Pre_Inscricao($vPar01, $vPar02, $vPar03, $vPar04, $vPar05, $vPar06, $vPar07, $vPar08);       
}

else if ($vOpcao == "055-listar-preinscritos-em-eventos") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idevento'];
   $vPar03 = $_POST['idpessoa'];
   $vPar04 = $_POST['idstatusinscr'];
   $vPar05 = $_POST['ordenacao'];
   fdao055_Listar_Pre_Inscritos_Em_Eventos($vPar01, $vPar02, $vPar03, $vPar04, $vPar05);       
}

else if ($vOpcao == "056-listar-status-inscricao-evento-cenargen") {
   $vPar01 = $_POST['subsistema'];
   $vPar02 = $_POST['idstatusinscr'];
   $vPar03 = $_POST['statusinscr'];
   fdao056_Listar_Status_Inscricao_Evento_Cenargen($vPar01, $vPar02, $vPar03);       
}

else if ($vOpcao == "057-imprmir-lista-de-presenca-em-disco") {
   $vPar01 = $_POST['idusr'];
   $vPar02 = $_POST['dados'];
   $vPar03 = $_POST['totdiasevento'];
   fdao057_Imprimir_Lista_Presenca_Em_Disco($vPar01, $vPar02, $vPar03);        
}

else if ($vOpcao == "058-imprimir-protocolo-solicitacao-serv-graf") {
   $vPar01 = $_POST['idusr'];
   $vPar02 = $_POST['dados'];
   fdao058_Imprimir_Protocolo_Servico_Grafico_NCO($vPar01, $vPar02);       
}


?>
