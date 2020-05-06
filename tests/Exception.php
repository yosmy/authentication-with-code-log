<?php

namespace Yosmy\Test;

use Exception as BaseException;
use Yosmy;
use JsonSerializable;

class Exception extends BaseException implements JsonSerializable
{
    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): array
    {
        return [
            'class' => self::class
        ];
    }
}
