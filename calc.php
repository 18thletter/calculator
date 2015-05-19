<?php

function simpleAutoloader($class) {
  $class = str_replace('\\', '/', $class);
  require_once strtolower($class) . '.php';
}
spl_autoload_register('simpleAutoloader');

if ($argc <= 1) {
  \Calculator\Calculator::printHelp();
  exit;
}

// Get rid of the first argument (php call)
array_shift($argv);
try {
  $calc = new \Calculator\Calculator($argv);
} catch (\Exception $e) {
  \Calculator\Calculator::printHelp();
}
$calc->calculate();
$calc->printResult();

?>
