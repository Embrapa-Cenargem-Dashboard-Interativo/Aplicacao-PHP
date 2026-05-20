<?php header('Content-Type: text/html; charset=ISO-8859-1',true) ?>

<?php

class C_PDF01 extends FPDF {
   private $mLinha1Cabec  = ""; 
   private $mLinha1Rodape = ""; 
   private $mMsgErro      = "";
    
   // linha 1 do cabeçalho    
   function fSetLinha1Cabec($aTexto) {
        $this->mLinha1Cabec = $aTexto;
   }

   // linha 1 do rodapé    
   function fSetLinha1Rodape($aTexto) {
        $this->mLinha1Rodape = $aTexto;
   }
   
   //
   function fGetMensagemDeErro() {
        return $this->mMsgErro;
   }   
   
  // Mensagem de erro
   function Error($aMsg) {
        $this->mMsgErro = $aMsg;
   }
    
   
   // Page header       $this->Image('../pcenimg/embrapa05-png.png',10,6, 90, 8);  // Logo     

   function Header() {
       
       $this->Image('../pcenimg/embrapa05-png.png',10,6, 90, 8);  // Logo     
       $this->SetFont('Arial','B',8);                             // Arial bold 8      
       $this->Ln(4);                                              // Pular uma linha com altura 4       
       $this->Cell(0,10,$this->mLinha1Cabec,0,0,'L');             // Linha 1 do cabeçalho       
       $this->Ln(4);                                              // Pular uma linha com altura 4
   }

   // Page footer
   function Footer() {
       // Position at 1.5 cm from bottom
       $this->SetY(-15);
       // Arial italic 8
       $this->SetFont('Arial','I',8);
       // Page number
////////       $this->Cell(0,10,'Pág. '.$this->PageNo().' de {nb}',0,0,'R');
      // Linha 1 do rodapé
       $vAux  = $this->mLinha1Rodape . "                                               ";
       $vAux .= 'Pág. '.$this->PageNo().' de {nb}';
       $this->Cell(0,10, $vAux,0,0,'R');
   }
   
}

class C_PHPMAILER extends PHPMailer {

   function fSetServidorDeEmail() {
      $this->IsSMTP();                                   // telling the class to use SMTP
      $this->Host     = "cogumelo.cenargen.embrapa.br";  // SMTP server
      $this->Hostname = "cogumelo.cenargen.embrapa.br";  // só funcionou com essa instrução...
      $this->Port     = 25; 
      $this->From     = "cenweb@cenargen.embrapa.br";       
      $this->FromName = "CENweb adm.";  
      $this->WordWrap = 95;
   }
    
}



?>
