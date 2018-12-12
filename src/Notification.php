<?php

namespace Digia\NotificationWrapper;

/**
 * Class Notification
 * @package Digia\NotificationWrapper
 */
class Notification implements \JsonSerializable
{

    /**
     * @var string
     */
    private $type;

    /**
     * @var mixed
     */
    private $payload;

    /**
     * Notification constructor.
     *
     * @param string $type
     * @param mixed  $payload
     */
    public function __construct(string $type, $payload)
    {
        $this->type    = $type;
        $this->payload = $payload;
    }

    /**
     * @param string $json
     *
     * @return Notification
     */
    public static function fromJson(string $json): Notification
    {
        $raw = \json_decode($json, true);

        if (\json_last_error() !== JSON_ERROR_NONE) {
            throw new \InvalidArgumentException(sprintf('Invalid JSON: %s', \json_last_error_msg()));
        }

        return new self($raw['type'], $raw['payload']);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'type'    => $this->getType(),
            'payload' => $this->getPayload(),
        ];
    }
}
