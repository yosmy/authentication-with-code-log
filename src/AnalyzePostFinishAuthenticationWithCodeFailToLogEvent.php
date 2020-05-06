<?php

namespace Yosmy;

use JsonSerializable;

/**
 * @di\service({
 *     tags: [
 *         'yosmy.post_finish_authentication_with_code_fail',
 *     ]
 * })
 */
class AnalyzePostFinishAuthenticationWithCodeFailToLogEvent implements AnalyzePostFinishAuthenticationWithCodeFail
{
    /**
     * @var LogEvent
     */
    private $logEvent;

    /**
     * @param LogEvent $logEvent
     */
    public function __construct(
        LogEvent $logEvent
    ) {
        $this->logEvent = $logEvent;
    }

    /**
     * {@inheritDoc}
     */
    public function analyze(
        string $device,
        string $country,
        string $prefix,
        string $number,
        JsonSerializable $e
    ) {
        $this->logEvent->log(
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
    }
}
