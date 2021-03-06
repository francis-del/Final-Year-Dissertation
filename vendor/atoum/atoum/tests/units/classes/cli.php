<?php

namespace atoum\atoum\tests\units;

use atoum\atoum
;

require_once __DIR__ . '/../runner.php';

class cli extends atoum\test
{
    public function testIsTerminalWhenStdoutIsUndefined()
    {
        $this
            ->if($adapter = new atoum\test\adapter())
            ->and($adapter->defined = function ($constant) {
                switch ($constant) {
                    case 'STDOUT':
                        return false;
                }
            })
            ->and($cli = new atoum\cli($adapter))
            ->then
                ->boolean($cli->isTerminal())->isFalse()
        ;
    }

    public function testIsTerminalWhenStdoutIsDirect()
    {
        $this
            ->if($adapter = new atoum\test\adapter())
            ->and($adapter->defined = function ($constant) {
                return $constant === 'STDOUT';
            })
            ->and($adapter->constant = function ($constant) {
                switch ($constant) {
                    case 'STDOUT':
                        return uniqid();

                    case 'PHP_OS_FAMILY':
                        return 'Linux';
                }
                return null;
            })
            ->and($adapter->fstat = ['mode' => 8592])
            ->and($cli = new atoum\cli($adapter))
            ->then
                ->boolean($cli->isTerminal())->isTrue()
        ;
    }

    public function testIsTerminalWhenStdoutIsIndirect()
    {
        $this
            ->if($adapter = new atoum\test\adapter())
            ->and($adapter->defined = function ($constant) {
                return $constant === 'STDOUT';
            })
            ->and($adapter->constant = function ($constant) {
                switch ($constant) {
                    case 'STDOUT':
                        return uniqid();

                    case 'PHP_OS_FAMILY':
                        return 'Linux';
                }
                return null;
            })
            ->and($adapter->fstat = ['mode' => 0])
            ->and($cli = new atoum\cli($adapter))
            ->then
                ->boolean($cli->isTerminal())->isFalse()
        ;
    }

    public function testIsTerminalWhenStdoutIsDirectAndOsIsWindowsAndAnsiconIsUndefined()
    {
        $this
            ->if($adapter = new atoum\test\adapter())
            ->and($adapter->defined = function ($constant) {
                return $constant === 'STDOUT';
            })
            ->and($adapter->constant = function ($constant) {
                switch ($constant) {
                    case 'STDOUT':
                        return uniqid();

                    case 'PHP_OS_FAMILY':
                        return 'Windows';
                }
                return null;
            })
            ->and($adapter->fstat = ['mode' => 8592])
            ->and($adapter->getenv = function ($variable) {
                return ($variable != 'ANSICON');
            })
            ->and($cli = new atoum\cli($adapter))
            ->then
                ->boolean($cli->isTerminal())->isFalse()
        ;
    }

    public function testIsTerminalWhenStdoutIsDirectAndOsIsWindowsAndAnsiconIsDefined()
    {
        $this
            ->if($adapter = new atoum\test\adapter())
            ->and($adapter->defined = function ($constant) {
                return $constant === 'STDOUT';
            })
            ->and($adapter->constant = function ($constant) {
                switch ($constant) {
                    case 'STDOUT':
                        return uniqid();

                    case 'PHP_OS_FAMILY':
                        return 'Windows';
                }
                return null;
            })
            ->and($adapter->fstat = ['mode' => 8592])
            ->and($adapter->getenv = function ($variable) {
                return ($variable == 'ANSICON');
            })
            ->and($cli = new atoum\cli($adapter))
            ->then
                ->boolean($cli->isTerminal())->isTrue()
        ;
    }

    public function testIsTerminalWhenForceTerminalBeforeConstruction()
    {
        $this
            ->if($adapter = new atoum\test\adapter())
            ->and(atoum\cli::forceTerminal())
            ->and($adapter->defined = function ($constant) {
                switch ($constant) {
                    case 'STDOUT':
                        return false;
                }
            })
            ->and($cli = new atoum\cli($adapter))
            ->then
                ->boolean($cli->isTerminal())->isTrue()
        ;
    }

    public function testIsTerminalWhenForceTerminalAfterConstruction()
    {
        $this
            ->if($adapter = new atoum\test\adapter())
            ->and($adapter->defined = function ($constant) {
                switch ($constant) {
                    case 'STDOUT':
                        return false;
                }
            })
            ->and($cli = new atoum\cli($adapter))
            ->then
                ->boolean($cli->isTerminal())->isFalse()
            ->if($otherCli = new atoum\cli($adapter))
            ->then
                ->boolean($otherCli->isTerminal())->isFalse()
            ->if(atoum\cli::forceTerminal())
            ->then
                ->boolean($cli->isTerminal())->isTrue()
                ->boolean($otherCli->isTerminal())->isTrue()
        ;
    }
}
