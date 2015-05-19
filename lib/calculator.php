<?php

namespace Calculator;

class Calculator {
  /**
   * Make a new calculator
   *
   * @param array[string] the arguments to calculate
   */
  public function __construct(array $arguments) {
    $this->checkArgs($arguments);
  }

  /**
   * Print a helpful message
   */
  public static function printHelp() {
    echo "  Usage: php calculator.php [numbers to do math on]\n";
    echo "    Available operations: +, -, *, \, %\n";
    echo "    You can have spaces. () Parentheses don't work.\n";
  }

  /**
   * Check the arguments for errors
   *
   * @param array[string] the arguments to check
   * @throws \Exception if the formatting is wrong or there are invalid
   * characters
   *
   * @todo check the operations:
   *  1. check if the characters are numbers and operation symbols
   *  2. check for operations between numbers
   *  3. there should be 1 fewer operators than operands (in this simple
   *  calculator)
   */
  protected function checkArgs(array $arguments) {
  }
}
