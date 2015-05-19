<?php

namespace Calculator;

class Addition extends Operation{
  public function getResult() {
    return $this->leftOperand + $this->rightOperand;
  }
}


