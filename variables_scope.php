<?php
echo"<h2> php variables and scope</h2>";
echo "<h3>php datatypes </h3>";
$s1="phplab";
$I1=15;
$f=10.0;
$b=true;
$a=array("login","register","dashboard");
echo "String:$s1<br>";
echo "Integer:$I1<br>";
echo "Float:$f<br>";
echo "bool:$b<br>";
echo"Array:".($b?"true":"false")."<br>";
echo"array ele";
print_r($a);
echo"<br><br>";
//--------Local scope---------
echo"<h3>Local scope</h3>";
function local(){
    $l="this is local var";
    echo $l."<br>";
}
local();
//-------Global Scope------
echo "<h3>Global Scope</h3>";
$g="This Is Global var";
function globals(){
    global $g;
    echo $g."<br>";
}
globals();
//------Static Scope---
echo"<h3>Static Scope</h3>";
function statics(){
    static $c=0;
    $c++;
    echo "count val:$c<br>";

}
statics();
statics();
?>

