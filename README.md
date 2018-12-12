# notification-wrapper

[![Build Status](https://travis-ci.org/digiaonline/notification-wrapper.svg?branch=master)](https://travis-ci.org/digiaonline/notification-wrapper)

A super-basic wrapper for notifications/messages

## Installation

```bash
composer require digiaonline/notification-wrapper
```

## Usage

```php
// Create a notification
$notification = new Notification('TYPE_FOO', ['id' => 1, 'name' => 'John']);

// Encode it as JSON (now you can send it somewhere)
$json = \json_encode($notification);

// Decode the notification on the other end
$notification = Notification::fromJson($json);

var_dump($notification->getType() === 'TYPE_FOO'); // true
var_dump($notification->getPayload() === ['id' => 1, 'name' => 'John']); // true
```

## License

MIT
