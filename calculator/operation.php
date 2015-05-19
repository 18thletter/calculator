<?php

namespace Calculator;

abstract class Operation implements OperationInterface {
  /**
   * @var number $leftOperand the left hand operand
   */
  protected $leftOperand;

  /**
   * @var number $rightOperand the right hand operand
   */
  protected $rightOperand;

  /**
   * @var char $operator the operator
   */
  protected $operator;

  /**
   * Make a new operand
   *
   * @param number $leftOperand
   * @param char $operator
   * @param number $rightOperand
   */
  public function __construct($leftOperand, $operator, $rightOperand) {
    $this->leftOperand = $leftOperand;
    $this->operator = $operator;
    $this->rightOperand = $rightOperand;
  }

  abstract public function getResult();
}
