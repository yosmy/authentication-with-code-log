<?php

namespace Yosmy;

/**
 * @di\service({
 *     tags: [
 *         'yosmy.post_finish_authentication_with_code_success',
 *     ]
 * })
 */
class AnalyzePostFinishAuthenticationWithCodeSuccessToLogEvent implements AnalyzePostFinishAuthenticationWithCodeSuccess
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
        string $number
    ) {
        $this->logEvent->log(
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
    }
}
