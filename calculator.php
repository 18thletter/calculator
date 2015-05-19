<?php

function printHelp() {
  echo "  Usage: php calculator.php [numbers to do math on]\n";
  echo "    Available operations: +, -, *, \, %\n";
  echo "    You can have spaces. () Parentheses don't work.\n";
}

if ($argc <= 1) {
  printHelp();
  exit;
}

?>
