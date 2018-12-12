<?php

namespace Digia\NotificationWrapper\Tests;

use Digia\NotificationWrapper\Notification;
use PHPUnit\Framework\TestCase;

/**
 * Class NotificationTest
 * @package Digia\NotificationWrapper\Tests
 */
class NotificationTest extends TestCase
{

    public function testBasics(): void
    {
        // Test constructor and getters
        $notification = new Notification('foo', ['bar' => 'baz']);

        $this->assertEquals('foo', $notification->getType());
        $this->assertEquals(['bar' => 'baz'], $notification->getPayload());

        // Test JSON serialization
        $this->assertJsonStringEqualsJsonString('{"type":"foo","payload":{"bar":"baz"}}', \json_encode($notification));

        // Test JSON deserialization
        $notification = Notification::fromJson('{"type":"foo","payload":{"bar":"baz"}}');

        $this->assertEquals('foo', $notification->getType());
        $this->assertEquals(['bar' => 'baz'], $notification->getPayload());
    }
}
