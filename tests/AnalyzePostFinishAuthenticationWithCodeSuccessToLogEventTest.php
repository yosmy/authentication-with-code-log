<?php

namespace Yosmy\Test;

use PHPUnit\Framework\TestCase;
use Yosmy;

class AnalyzePostFinishAuthenticationWithCodeSuccessToLogEventTest extends TestCase
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
                    'yosmy.finish_authentication_with_code_success',
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

        $analyzePostFinishAuthenticationWithCodeSuccessToLogEvent = new Yosmy\AnalyzePostFinishAuthenticationWithCodeSuccessToLogEvent(
            $logEvent
        );

        $analyzePostFinishAuthenticationWithCodeSuccessToLogEvent->analyze(
            $device,
            $country,
            $prefix,
            $number
        );
    }
}