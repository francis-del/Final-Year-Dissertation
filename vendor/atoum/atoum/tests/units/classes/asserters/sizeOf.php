<?php

namespace atoum\atoum\tests\units\asserters;

use atoum\atoum;
use atoum\atoum\asserter;
use atoum\atoum\tools\variable;

require_once __DIR__ . '/../../runner.php';

class sizeOf extends atoum\test
{
    public function testClass()
    {
        $this->testedClass->isSubclassOf(atoum\asserters\integer::class);
    }

    public function test__construct()
    {
        $this
            ->given($this->newTestedInstance)
            ->then
                ->object($this->testedInstance->getGenerator())->isEqualTo(new asserter\generator())
                ->object($this->testedInstance->getAnalyzer())->isEqualTo(new variable\analyzer())
                ->object($this->testedInstance->getLocale())->isEqualTo(new atoum\locale())
                ->variable($this->testedInstance->getValue())->isNull()
                ->boolean($this->testedInstance->wasSet())->isFalse()

            ->if($this->newTestedInstance($generator = new asserter\generator(), $analyzer = new variable\analyzer(), $locale = new atoum\locale()))
            ->then
                ->object($this->testedInstance->getGenerator())->isIdenticalTo($generator)
                ->object($this->testedInstance->getAnalyzer())->isIdenticalTo($analyzer)
                ->object($this->testedInstance->getLocale())->isIdenticalTo($locale)
                ->variable($this->testedInstance->getValue())->isNull()
                ->boolean($this->testedInstance->wasSet())->isFalse()
        ;
    }

    public function testSetWith()
    {
        $this
            ->if($this->newTestedInstance)
            ->then
                ->object($this->testedInstance->setWith([]))->isTestedInstance
                ->boolean($this->testedInstance->wasSet())->isTrue()
                ->integer($this->testedInstance->getValue())->isZero()

                ->object($this->testedInstance->setWith($countable = range(1, rand(2, 5))))->isTestedInstance
                ->boolean($this->testedInstance->wasSet())->isTrue()
                ->integer($this->testedInstance->getValue())->isEqualTo(count($countable))
        ;
    }
}
