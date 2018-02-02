<?php

//require __DIR__ . "/../vendor/autoload.php";
//use PHPUnit\Framework\TestCase;

use BancoX\ContaCorrente;

class ContaCorrenteTest extends PHPUnit\Framework\TestCase
{
    
    private $cc;
    
    public function setup() {
        
        $this->cc =  new ContaCorrente;
    }


    public function testRetornoSaldoInicial() 
    {
        $conta = new ContaCorrente;
        $this->assertEquals(0, $this->cc->getSaldo());
    }
    
    public function testAlteraValorSaldoDaContaCorrente()            
    {
        $this->cc->setSaldo(200);
        $this->assertEquals(200, $this->cc->getSaldo());
        
    }
    
    public function testVerificaSaldoNegativo() 
    {
        $this->cc->setSaldo(-200);     
        $this->assertTrue($this->cc->saldoNegativo());
    }
    
    /**
     * @depends  testVerificaSaldoNegativo
     */
    public function testVerificaSaldoPositivo() 
    {
        $this->cc->setSaldo(200);     
        $this->assertTrue($this->cc->saldoPositivo());
    }
    
    
    public function testVerificaSaldoPositivoDeveraVirFalse() 
    {
        $this->cc->setSaldo(-200);
        
        $this->assertFalse($this->cc->saldoPositivo());
    }
           
    
    public function testVerificaSaldoNegativoDeveraVirFalse() 
    {
        $this->cc->setSaldo(200);
        
        $this->assertFalse($this->cc->saldoNegativo());
    }
    
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaAddSaldoValorNegativo() 
    {
        $this->cc->addSaldo(-200);
    }
    
    public function testVerificaSeSaldoFoiIncrementado() 
    {
        $this->cc->addSaldo(500);
        $this->cc->addSaldo(87);
        $this->assertEquals(587, $this->cc->getSaldo());
    }
    
    /**
     * @dataProvider saldoProvider     
     */    
    public function testVerificaSetSaldoEGetSaldo($valor1, $valor2, $res) 
    {
        $this->cc->setSaldo($valor1);
        $this->cc->addSaldo($valor2);
        
        $this->assertEquals($res, $this->cc->getSaldo());
    }
    
    
    public function saldoProvider() 
    {
        return [
            [20, 200, 220],
            [50, 55, 105],
            [0, 10, 10],
            [-100, 20, -80],
            [65, 60, 125],
            'teste_chave' =>[100, 0, 100]
        ];
    }
    
    public function testVerificaDefinicaoNomeDoCliente() 
    {
        $this->cc->setNomeCliente('Andre Marcelino');
        
        $this->assertAttributeContains('Andre Marcelino', 'nomeCliente', $this->cc);
    }
    
   public function testVerificaSaidaDoMetodoEscrita()
    {
        $this->cc->setNomeCliente('Andre Marcelino');
        
        $this->cc->setSaldo(200);
        
        $this->expectOutputString('Andre Marcelino: seu saldo é 200');
        
        $this->cc->escrita();
    }
    
    
}
