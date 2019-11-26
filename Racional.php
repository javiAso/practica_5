<?php

class Racional {

    private $numerador;
    private $denominador;

    public function __construct($numerador = 1, $denominador = 1) {
        if ($denominador == 1) {
            $this->setNumerador($numerador);
        } else {
            $this->numerador = $numerador;
            $this->denominador = $denominador;
        }
    }

    function getNumerador() {
        return $this->numerador;
    }

    function getDenominador() {
        return $this->denominador;
    }

    function setNumerador($numerador): void {

        if (is_string($numerador)) {
            $corte = strpos($numerador, "/", 1);
            if ($corte) {
                $this->numerador = substr($numerador, 0, $corte);
                $this->denominador = substr($numerador, $corte + 1);
            } else {
                $this->numerador = $numerador;
                $this->denominador = 1;
            }
        } else {
            $this->numerador = $numerador;
            $this->denominador = 1;
        }
    }

    function setDenominador($denominador): void {
        $this->denominador = $denominador;
    }

    function __toString() {
        return $this->numerador . "/" . $this->denominador;
    }

    public function suma($r) {

        return new Racional($r->getNumerador() * $this->denominador + $r->getDenominador() * $this->numerador, $r->getDenominador() * $this->getDenominador());
    }

    public function resta($r) {

        return $this->suma(new Racional($r->getNumerador() * -1, $r->getDenominador()));
    }

    public function multiplica($r) {
        return new Racional($this->numerador * $r->getNumerador(), $this->denominador * $r->getDenominador());
    }

    public function divide($r) {

        return new Racional($this->numerador * $r->getDenominador(), $this->denominador * $r->getNumerador());
    }

    public function simplifica() {

        $divisor = $this->numerador;
        $dividendo = $this->denominador;

        if ($dividendo != 0) {
            do {
                $resto = $divisor % $dividendo;
                $divisor = $dividendo;
                $dividendo = $resto;
            } while ($resto != 0);
            $this->numerador /= $divisor;
            $this->denominador /= $divisor;
            return $divisor;
        }
        return 1;
    }

}
?>