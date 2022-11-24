<?php

declare(strict_types=1);

namespace FuzzyWuzzy;

class FuzzyWuzzy
{

    public function __construct(
        private string $firstWord,
        private string $secondWord,
        private int $firstDivisor,
        private int $secondDivisor,
        private int $thirdDivisor
    ) {}

    public function getResult(array $numbers): string {
        $result = '';
        foreach ($numbers as $number) {
            if ($number <= 0) {
                throw new \InvalidArgumentException('Inserita una serie di numeri con almeno un valore minore di 0');
            }

            $result .= $this->createString($number);
        }

        return $result;
    }

    private function createString(int $number): string {
        if ($number % $this->firstDivisor === 0 && $number % $this->secondDivisor === 0 && $number % $this->thirdDivisor === 0) {
            return $this->secondWord . $this->firstWord . $this->firstWord . $this->secondWord;
        }
        if ($number % $this->firstDivisor === 0 && $number % $this->thirdDivisor === 0) {
            return $this->secondWord . $this->firstWord . $this->secondWord;
        }
        if ($number % $this->secondDivisor === 0 && $number % $this->thirdDivisor === 0) {
            return $this->firstWord . $this->secondWord . $this->secondWord;
        }
        if ($number % $this->firstDivisor === 0 && $number % $this->secondDivisor === 0) {
            return $this->secondWord . $this->firstWord;
        }
        if ($number % $this->firstDivisor === 0) {
            return $this->firstWord;
        }
        if ($number % $this->secondDivisor === 0) {
            return $this->secondWord;
        }
        if ($number % $this->thirdDivisor === 0) {
            return $this->firstWord . $this->secondWord;
        }
        return strval($number);
    }
}