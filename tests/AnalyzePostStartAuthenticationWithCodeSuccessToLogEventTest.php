<?php

namespace Yosmy\Test;

use PHPUnit\Framework\TestCase;
use Yosmy;

class AnalyzePostStartAuthenticationWithCodeSuccessToLogEventTest extends TestCase
{
    public function testAnalyze()
    {
        $device = 'device';
        $country = 'country';
        $prefix = 'prefix';
        $number = 'number';

        $logEvent = $this->createMock(Yosmy\LogEvent::class);

        $logEvent->expects($this->once())
            ->method('log')
            ->with(
                [
                    'yosmy.start_authentication_with_code_success',
                    'success'
                ],
                [
                    'device' => $device,
                    'country' => $country,
                    'prefix' => $prefix,
                    'number' => $number,
                ],
                []
            );

        $analyzePostStartAuthenticationWithCodeSuccessToLogEvent = new Yosmy\AnalyzePostStartAuthenticationWithCodeSuccessToLogEvent(
            $logEvent
        );

        $analyzePostStartAuthenticationWithCodeSuccessToLogEvent->analyze(
            $device,
            $country,
            $prefix,
            $number
        );
    }
}