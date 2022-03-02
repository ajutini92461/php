<?php
    function test(){
        $a=0;
        return ++$a; //primero incrementa y luego asigna. Cada vez que se hace la memoria se borra
    }
    echo "Test 1: ".test()."<br>";
    echo "Test 2: ".test()."<br>";
    echo "Test 3: ".test()."<br>";
?>
<br>
<?php
    function test1(){
        static $b=0; //al ser static la memoria se mantiene
        return ++$b;
    }
    echo "Test 1: ".test1()."<br>";
    echo "Test 2: ".test1()."<br>";
    echo "Test 3: ".test1()."<br>";
?>
<br>
<?php
    function test2(){
        $c=0;
        return $c++; //primero asigna (devulve) y después incrementa, cada vez que se hace la memoria se borra
    }
    echo "Test 1: ".test2()."<br>";
    echo "Test 2: ".test2()."<br>";
    echo "Test 3: ".test2()."<br>";
?>
<br>
<?php
    function test3(){
        static $d=0;
        return $d++;
    }
    echo "Test 1: ".test3()."<br>";
    echo "Test 2: ".test3()."<br>";
    echo "Test 3: ".test3()."<br>";
?>