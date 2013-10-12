<?php
namespace Webit\Util\EvalMath;
class Stack {

    var $stack = array();
    var $count = 0;
    
    function push($val) {
        $this->stack[$this->count] = $val;
        $this->count++;
    }
    
    function pop() {
        if ($this->count > 0) {
            $this->count--;
            return $this->stack[$this->count];
        }
        return null;
    }
    
    function last($n=1) {
        $key = $this->count-$n;
    		
        return key_exists($key,$this->stack) ? $this->stack[$key] : null;
    }
}
?>