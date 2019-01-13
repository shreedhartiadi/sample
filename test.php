<?php
	$array = array('a'=>1,'b'=>2,'c'=>array(1,2,3,4));
	echo count($array['c']);
	
	$numbers=array(4,6,2,22,11);
sort($numbers);
print_r($numbers);
echo $numbers[0];


$my_array = array("Dog","Cat","Horse");

list($a,$c) = $my_array;
echo "Here I only use the $a and $c variables.";


$a = "Original";
$my_array = array("a" => "Cat","b" => "Dog", "c" => "Horse");
extract($my_array);
echo "\


$a = $a; \$b = $b; \$c = $c";

$a=array("sdasd",5);
echo(array_product($a)."<br>");

class ParentClass {
	const CONST_VALUE="const<br>";
	static $my_static="static<br>";
    function test() {
        self::who();    // will output 'parent'
        $this->who();    // will output 'child'
    }

    public static function who() {
        echo 'parent';
		echo self::CONST_VALUE . "\n";
        echo self::$my_static . "\n";
    }
}

class ChildClass extends ParentClass {
    public static function who() {
        echo 'child<br>';
    }
}

$obj = new ChildClass();
$obj->test();

$a=1+2;
echo ("string"==='string');
?>
