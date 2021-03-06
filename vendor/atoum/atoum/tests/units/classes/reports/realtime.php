<?php

namespace atoum\atoum\tests\units\reports;

require __DIR__ . '/../../runner.php';

use atoum\atoum;

class realtime extends atoum\test
{
    public function testClass()
    {
        $this->testedClass->extends(atoum\report::class);
    }

    public function testIsOverridableBy()
    {
        $this
            ->if($report = new \mock\atoum\atoum\reports\realtime())
            ->and($otherRealtimeReport = new \mock\atoum\atoum\reports\realtime())
            ->and($otherReport = new \mock\atoum\atoum\report())
            ->then
                ->boolean($report->isOverridableBy($report))->isFalse
                ->boolean($report->isOverridableBy($otherRealtimeReport))->isFalse
                ->boolean($report->isOverridableBy($otherReport))->isTrue
        ;
    }

    public function testAddWriter()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $writer = new \mock\atoum\atoum\report\writers\realtime()
            )
            ->then
                ->object($this->testedInstance->addWriter($writer))->isTestedInstance
        ;
    }

    public function testHandleEVent()
    {
        $this
            ->given(
                $this->newTestedInstance,
                $observable = new \mock\atoum\atoum\observable(),
                $writer = new \mock\atoum\atoum\report\writers\realtime()
            )
            ->if(
                $this->testedInstance->addWriter($writer),
                $event = uniqid()
            )
            ->then
                ->object($this->testedInstance->handleEvent($event, $observable))->isTestedInstance
                ->mock($writer)
                    ->call('writeRealtimeReport')->withArguments($this->testedInstance, $event)->once
                    ->call('reset')->never
            ->if($event = atoum\runner::runStop)
            ->then
                ->object($this->testedInstance->handleEvent($event, $observable))->isTestedInstance
                ->mock($writer)
                    ->call('writeRealtimeReport')->withArguments($this->testedInstance, $event)->once
                    ->call('reset')->once
            ->given($otherWriter = new \mock\atoum\atoum\report\writers\realtime())
            ->if(
                $this->testedInstance->addWriter($otherWriter),
                $event = uniqid()
            )
            ->then
                ->object($this->testedInstance->handleEvent($event, $observable))->isTestedInstance
                ->mock($otherWriter)
                    ->call('writeRealtimeReport')->withArguments($this->testedInstance, $event)->once
                    ->call('reset')->never
            ->if($event = atoum\runner::runStop)
            ->then
                ->object($this->testedInstance->handleEvent($event, $observable))->isTestedInstance
                ->mock($writer)
                    ->call('writeRealtimeReport')->withArguments($this->testedInstance, $event)->twice
                    ->call('reset')->twice
                ->mock($otherWriter)
                    ->call('writeRealtimeReport')->withArguments($this->testedInstance, $event)->once
                    ->call('reset')->once
        ;
    }
}
