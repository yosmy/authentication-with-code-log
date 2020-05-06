<?php

namespace Yosmy\Test;

use PHPUnit\Framework\TestCase;
use Yosmy;

class AnalyzePostFinishAuthenticationWithCodeFailToLogEventTest extends TestCase
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
                    'yosmy.finish_authentication_with_code_fail',
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

        $analyzePostFinishAuthenticationWithCodeFailToLogEvent = new Yosmy\AnalyzePostFinishAuthenticationWithCodeFailToLogEvent(
            $logEvent
        );

        $analyzePostFinishAuthenticationWithCodeFailToLogEvent->analyze(
            $device,
            $country,
            $prefix,
            $number,
            $e
        );
    }
}