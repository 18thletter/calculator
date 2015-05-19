<?php

namespace Calculator;

class Calculator {

  /**
   * @var array[string] $args the arguments, which include operators
   * and operands
   */
  protected $args;

  /**
   * @var array[\Calculator\Operation] $operations array of Operations
   */
  protected $operations;

  /**
   * Make a new calculator
   *
   * @param array[string] $arguments the arguments to calculate
   */
  public function __construct(array $arguments) {
    $this->checkArgs($arguments);
    $this->args = $arguments;
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
   * @param array[string] $arguments the arguments to check
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

  /**
   * Calculate the damn thing
   */
  public function calculate() {
    $this->doMultiplication();
    $this->doDivision();
    $this->doModulus();
    $this->doAddition();
    $this->doSubtraction();
  }

  /**
   * Scan left to right and create Multiplication Operations
   */
  protected function doMultiplication() {
    // operands are on the odd indexes
    $iterations = count($this->args) / 3;
    for ($i = 1; $i <= $iterations; $i+= 2) {
      if ($this->args[$i] == '*') {
        $this->operations[] = new Multiplication(
          $this->args[$i - 1],
          $this->args[$i],
          $this->args[$i + 1]
        );
      }
    }
    print_r($this->operations);
  }

  /**
   * Scan left to right and create Division Operations
   */
  protected function doDivision() {

  }

  /**
   * Scan left to right and create Modulus Operations
   */
  protected function doModulus() {

  }

  /**
   * Scan left to right and create Addition Operations
   */
  protected function doAddition() {

  }

  /**
   * Scan left to right and create Subtraction Operations
   */
  protected function doSubtraction() {

  }
}
