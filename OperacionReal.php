<?php

class OperacionReal extends Operacion {

    function __construct($operando1, $operando2, $operacion) {
        parent::__construct($operando1, $operando2, $operacion);
        $this->resuelve();
    }

    protected function resuelve() {
        $op1 = parent::getOperando1();
        $op2 = parent::getOperando2();
        $operacion = parent::getOperacion();
        switch ($operacion) {
            case '+':
                parent::setResultado($op1 + $op2);


                break;
            case '-':

                parent::setResultado($op1 - $op2);
                break;

            case '*':


                parent::setResultado($op1 * $op2);
                break;
            case '/':
                if ($op2) {

                    parent::setResultado($op1 / $op2);
                } else {

                    parent::setResultado("No se puede dividir por 0");
                }

                break;
        }
        parent::setCadenaResultado($op1 . $operacion . $op2 . "=" . parent::getResultado());
    }

    public function __toString() {

        return "<fieldset id=rtdo>
                  <legend>Resultado</legend>
                  <label>
                  <table border=1>
                  <tr>
                  <th>Concepto</th>
                  <th>Valores</th>
                  </tr>
                  <tr>
                  <th>Operando 1 </th>
                  <th>" . parent::getOperando1() . "</th>
                  </tr>
                  <tr>
                  <th>Operando 2 </th>
                  <th>" . parent::getOperando2() . "</th>
                  </tr>
                  <tr>
                  <th>Operación </th>
                  <th>" . parent::getOperacion() . "</th>
                  </tr>
                  <tr>
                  <th>Tipo de operacion  </th>
                  <th> Real </th>
                  </tr>
                  <tr>
                  <th>Resultado </th>
                  <th>" . parent::getResultado() . "</th>
                  </tr>
                  </table>
                  </label>
                  </fieldset>";
    }

}
