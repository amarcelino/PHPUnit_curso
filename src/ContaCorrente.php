<?php

namespace BancoX;

class ContaCorrente 
{

    protected  $saldo = 0;
    private $nomeCliente;
    
    public function setNomeCliente($nome) 
    {
        $this->nomeCliente = $nome;
    }
    
    public function getSaldo() 
    {
        return $this->saldo;
        
    }
    
    public function setSaldo($valor) 
    {
        $this->saldo=$valor;        
    }
    
    public function saldoNegativo() 
    {
      return  $this->saldo < 0 ;
    }
    
    public function saldoPositivo() 
    {
         return  ! $this->saldoNegativo();
    }
    
    public function addSaldo($valor) 
    {
        if( $valor < 0 ){
            throw new \InvalidArgumentException('Parametro valor não deve ser 0 ou negativo');
        }
        
        $this->saldo += $valor;
    }
    
    public function escrita() 
    {        
        echo "$this->nomeCliente: seu saldo é $this->saldo";             
                
    }

}
