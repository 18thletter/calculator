<?php

namespace Calculator;

class Division extends Operation{
  public function getResult() {
    return $this->leftOperand / $this->rightOperand;
  }
}

