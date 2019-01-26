<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace KryuuCommon\BufferTest;

use PHPUnit\Framework\TestCase;
use KryuuCommon\Buffer\Buffer;

class SupportTest extends TestCase {
    
    private $testData4x4 = 
        'Qk2qAAAAAAAAAHoAAABsAAAABAAAAAQAAAABABgAAAAAADAAAAAjLgAAIy4AAAAAAAAAAA'
        . 'AAQkdScwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'
        . 'AAAAIAAAAAAAAAAAAAAAAAAAD///8AAAD///8AAAAAAAD///8AAAD///////8AAAD///'
        . '8AAAAAAAD///8AAAD///8=';
    
    public function testStaticBufferFrom() {
        
        $output = Buffer::isfrom('oKLAAAA');
        
        $this->assertInstanceOf('\KryuuCommon\Buffer\Buffer', $output);
        
    }
    
    public function testUnpack() {
        
        $raw = base64_decode($this->testData4x4);
        
        $unpacked = unpack('H*', $raw);
        
        $packed = pack('H*', $unpacked[1]);
        
        
        $this->assertEquals($raw, $packed);
        
    }
    
    public function testRawInput() {
        
        $buffer = new Buffer();
         
        $buffer->from('oKLAAAA');
        
        print_r($buffer->toString());
        
        
    }
}