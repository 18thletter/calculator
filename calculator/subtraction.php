<?php

namespace Calculator;

class Subtraction extends Operation{
  public function getResult() {
    return $this->leftOperand - $this->rightOperand;
  }
}

