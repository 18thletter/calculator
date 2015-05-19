<?php

namespace Calculator;

class Modulus extends Operation{
  public function getResult() {
    return $this->leftOperand % $this->rightOperand;
  }
}


