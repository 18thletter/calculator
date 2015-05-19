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
    while (count($this->args) > 1) {
      $operation = $this->breakOffOneOperation();
      $result = 0;
      switch ($operation['operator']) {
      case '*':
        $result = $operation['leftOperand'] * $operation['rightOperand'];
        break;
      case '/':
        $result = $operation['leftOperand'] / $operation['rightOperand'];
        break;
      case '%':
        $result = $operation['leftOperand'] % $operation['rightOperand'];
        break;
      case '+':
        $result = $operation['leftOperand'] + $operation['rightOperand'];
        break;
      case '-':
        $result = $operation['leftOperand'] - $operation['rightOperand'];
        break;
      default:
        break;
      }
      $this->args[$operation['index'] - 1] = $result;
      unset($this->args[$operation['index']]);
      unset($this->args[$operation['index'] + 1]);
      // re-index the array
      $this->args = array_values($this->args);
    }
  }

  private function breakOffOneOperation() {
    if (($indexOfOperator = $this->findMultiplication()) !== false) {
      return [
        'leftOperand' => $this->args[$indexOfOperator - 1],
        'rightOperand' => $this->args[$indexOfOperator + 1],
        'operator' => $this->args[$indexOfOperator],
        'index' => $indexOfOperator,
      ];
    }
    if (($indexOfOperator = $this->findDivision()) !== false) {
      return [
        'leftOperand' => $this->args[$indexOfOperator - 1],
        'rightOperand' => $this->args[$indexOfOperator + 1],
        'operator' => $this->args[$indexOfOperator],
        'index' => $indexOfOperator,
      ];
    }
    if (($indexOfOperator = $this->findModulus()) !== false) {
      return [
        'leftOperand' => $this->args[$indexOfOperator - 1],
        'rightOperand' => $this->args[$indexOfOperator + 1],
        'operator' => $this->args[$indexOfOperator],
        'index' => $indexOfOperator,
      ];
    }
    if (($indexOfOperator = $this->findAddition()) !== false) {
      return [
        'leftOperand' => $this->args[$indexOfOperator - 1],
        'rightOperand' => $this->args[$indexOfOperator + 1],
        'operator' => $this->args[$indexOfOperator],
        'index' => $indexOfOperator,
      ];
    }
    if (($indexOfOperator = $this->findSubtraction()) !== false) {
      return [
        'leftOperand' => $this->args[$indexOfOperator - 1],
        'rightOperand' => $this->args[$indexOfOperator + 1],
        'operator' => $this->args[$indexOfOperator],
        'index' => $indexOfOperator,
      ];
    }
  }

  protected function findMultiplication() {
    // operands are on the odd indexes
    for ($i = 1; $i < count($this->args); $i += 2) {
      if ($this->args[$i] === '*') {
        return $i;
      }
    }
    return false;
  }

  protected function findDivision() {
    // operands are on the odd indexes
    for ($i = 1; $i < count($this->args); $i += 2) {
      if ($this->args[$i] === '/') {
        return $i;
      }
    }
    return false;
  }

  protected function findModulus() {
    // operands are on the odd indexes
    for ($i = 1; $i < count($this->args); $i += 2) {
      if ($this->args[$i] === '%') {
        return $i;
      }
    }
    return false;
  }

  protected function findAddition() {
    // operands are on the odd indexes
    for ($i = 1; $i < count($this->args); $i += 2) {
      if ($this->args[$i] === '+') {
        return $i;
      }
    }
    return false;
  }

  protected function findSubtraction() {
    // operands are on the odd indexes
    for ($i = 1; $i < count($this->args); $i += 2) {
      if ($this->args[$i] === '-') {
        return $i;
      }
    }
    return false;
  }

  public function printResult() {
    print_r($this->args[0]);
  }

  /**
   * Scan left to right and create Multiplication Operations
   */
  protected function doMultiplication() {
    // operands are on the odd indexes
    for ($i = 1; $i <= count($this->args); $i+= 2) {
      if ($this->args[$i] === '*') {
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
