<?php
class Operaciones {
    private $a;
    private $b;
    private $c;
    
    function __construct($a, $b, $c) {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
    
    function sumar() {
        return $this->a + $this->b + $this->c;
    }
    
    function restar() {
        return $this->a - $this->b - $this->c;
    }
    
    function multiplicar() {
        return $this->a * $this->b * $this->c;
    }
    
    function dividir() {
        if ($this->b != 0 && $this->c != 0) {
            return $this->a / $this->b / $this->c;
        } else {
            return "Error: División por cero";
        }
    }
    
    function getA() {
        return $this->a;
    }
    
    function getB() {
        return $this->b;
    }
    
    function getC() {
        return $this->c;
    }
}
?>
