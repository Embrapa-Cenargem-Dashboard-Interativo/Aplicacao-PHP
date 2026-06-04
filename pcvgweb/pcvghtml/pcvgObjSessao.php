<?php

 class CObjSessao {
             
     private $mDataHoje         = "";
     private $mDataHojeAAAAMMDD = "";
     private $mNickUsr          = "";
     private $mNomePessoa       = "";
     private $mPerfilUsr        = "";
     private $mIdPessoa         = "-111";
     private $mEmail1Usr        = "";

// The constructor, duh!
     function __construct(){
         
     }
     
//---     
     function fGetDataHoje()         { return $this->mDataHoje; } 
     function fGetDataHojeAAAAMMDD() { return $this->mDataHojeAAAAMMDD; }      
     function fGetNickUsr()          { return $this->mNickUsr; }           
     function fGetNomePessoa()       { return $this->mNomePessoa; }           
     function fGetPerfilUsr()        { return $this->mPerfilUsr; }           
     function fGetIdPessoa()         { return $this->mIdPessoa; }           
     function fGetEmail1Usr()        { return $this->mEmail1Usr; }           
//---     
     function fSetDataHoje($aValor)         { $this->mDataHoje = $aValor; } 
     function fSetDataHojeAAAAMMDD($aValor) { $this->mDataHojeAAAAMMDD = $aValor; }      
     function fSetNickUsr($aValor)          { $this->mNickUsr = $aValor; }           
     function fSetNomePessoa($aValor)       { $this->mNomePessoa = $aValor; }           
     function fSetPerfilUsr($aValor)        { $this->mPerfilUsr = $aValor; }           
     function fSetIdPessoa($aValor)         { $this->mIdPessoa = $aValor; }       
     function fSetEmail1Usr($aValor)        { $this->mEmail1Usr = $aValor; }       
     
 }   
     
?>
