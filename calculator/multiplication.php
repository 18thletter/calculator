<?php

namespace Calculator;

class Multiplication extends Operation{
  public function getResult() {
    return $this->leftOperand * $this->rightOperand;
  }
}
