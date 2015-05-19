<?php

require 'lib/calculator.php';

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

?>
