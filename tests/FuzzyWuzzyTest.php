<?php

declare(strict_types=1);

namespace FuzzyWuzzy;

use PHPUnit\Framework\TestCase;

class FuzzyWuzzyTest extends TestCase
{

    public function testShouldReturnString(): void
    {
        $fuzzyWuzzy = new FuzzyWuzzy('Fuzzy', 'Wuzzy', 3, 5, 7);

        $arrayTest = [3, 5, 7, 15, 2, 35];

        $this->assertEquals('FuzzyWuzzyFuzzyWuzzyWuzzyFuzzy2FuzzyWuzzyWuzzy', $fuzzyWuzzy->getResult($arrayTest));
    }


    public function testShouldReturnFuzzy(): void
    {
        $fuzzyWuzzy = new FuzzyWuzzy('Fuzzy', 'Wuzzy', 3, 5, 7);

        $arrayTest = [3];

        $this->assertEquals('Fuzzy', $fuzzyWuzzy->getResult($arrayTest));
    }


    public function testShouldReturnWuzzy(): void
    {
        $fuzzyWuzzy = new FuzzyWuzzy('Fuzzy', 'Wuzzy', 3, 5, 7);

        $arrayTest = [5];

        $this->assertEquals('Wuzzy', $fuzzyWuzzy->getResult($arrayTest));
    }


    public function testShouldReturnFuzzyWuzzy(): void
    {
        $fuzzyWuzzy = new FuzzyWuzzy('Fuzzy', 'Wuzzy', 3, 5, 7);

        $arrayTest = [7];

        $this->assertEquals('FuzzyWuzzy', $fuzzyWuzzy->getResult($arrayTest));
    }


    public function testShouldThrowError(): void
    {
        $fuzzyWuzzy = new FuzzyWuzzy('Fuzzy', 'Wuzzy', 3, 5, 7);

        $arrayTest = [7, 2, -5];

        $this->expectExceptionMessage('Inserita una serie di numeri con almeno un valore minore di 0');
        $test = $fuzzyWuzzy->getResult($arrayTest);
    }
}