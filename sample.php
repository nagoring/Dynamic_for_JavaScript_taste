<?php
include dirname(__FILE__) . '/Controller.php';

$ctrl = Controller::getInstance();
$ctrl->addMethod('exec', function(){
	echo "run1<br>";
}, 10);
$ctrl->addMethod('exec', function(){
	echo "run2<br>";
}, 11);
$ctrl->exec();





$ctrl->F = [function($value=10){
	echo "imm value {$value}";
},[15]];

$ctrl->attack = function(){
	echo "attack";
};
$ctrl->attack();
