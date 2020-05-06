<?php

namespace Yosmy\Test;

use PHPUnit\Framework\TestCase;
use Yosmy;

class AnalyzePostStartAuthenticationWithCodeFailToLogEventTest extends TestCase
{
    public function testAnalyze()
    {
        $device = 'device';
        $country = 'country';
        $prefix = 'prefix';
        $number = 'number';
        $e = new Exception();

        $logEvent = $this->createMock(Yosmy\LogEvent::class);

        $logEvent->expects($this->once())
            ->method('log')
            ->with(
                [
                    'yosmy.start_authentication_with_code_fail',
                    'fail'
                ],
                [
                    'device' => $device,
                    'country' => $country,
                    'prefix' => $prefix,
                    'number' => $number,
                ],
                [
                    'exception' => $e->jsonSerialize()
                ]
            );

        $analyzePostStartAuthenticationWithCodeFailToLogEvent = new Yosmy\AnalyzePostStartAuthenticationWithCodeFailToLogEvent(
            $logEvent
        );

        $analyzePostStartAuthenticationWithCodeFailToLogEvent->analyze(
            $device,
            $country,
            $prefix,
            $number,
            $e
        );
    }
}