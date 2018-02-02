<?php

class AssertsTest extends PHPUnit\Framework\TestCase
{
    public function testAssertString()
    {
        $this->assertStringStartsWith('And', 'AndreMarcelino');
        $this->assertStringEndsWith('Web', 'AndreWeb');
    }
    
    public function testAssertContains()
    {
        $this->assertContains('PHPUnit', 'Faça seus testes com PHPUnit :)');
        $this->assertContains('PHPUnit', ['PHP', 'JAVA', 'PHPUnit']);
    }
    
    public function testAssertArray()
    {
        $cliente = [
            'nome' => 'Joao',
            'End' => 'Rua teste 123'
        ];
        
        $fornecedor = [
            'nome' => 'Joao',
            'End' => 'Rua teste 123'
        ];
        
        $this->assertArrayHasKey('nome', $cliente);
        $this->assertArrayHasKey('End', $fornecedor);
        $this->assertCount(2, $cliente);
        $this->assertEquals($cliente, $fornecedor);
    }
}