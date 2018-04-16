# PHP Url manipulation library.

## Installation

```sh
$ composer require alexeybob/url dev-master
```
### Example 1
```php
$url = "http://username:password@hostname:9090/segment1/segment2/segment3/segment4/segment5/segment6?arg1=value1&arg2=value2&arg3=value3&arg4=value4&arg5=value5#anchor";

// result: https://alexeybob:123abc@test.com:9090/common/user/2?arg1=25&arg2=member#shop
echo aburl($url, [
    "scheme" => "https",
    "host" => "test.com",
    "port" => 9090,
    "user" => "alexeybob",
    "pass" => "123abc",
    "path" => [
        1 => 'common',
        2 => 'user',
        3 => 2,
        4 => null,
        5 => null,
        6 => null
    ],
    "query" => [
        "arg1" => 25,
        "arg2" => 'member',
        "arg3" => null,
        "arg4" => null,
        "arg5" => null,
    ],
    "fragment" => "shop"
]);
```

### Example 2
```php
$url = "http://username:password@hostname:9090/segment1/segment2/segment3/segment4/segment5/segment6?arg1=value1&arg2=value2&arg3=value3&arg4=value4&arg5=value5#anchor";

// result: https://alexeybob:123abc@test.com:9090/common/user/2?arg1=25&arg2=member#shop
echo aburl($url, [
    "scheme" => "https",
    "host" => "test.com",
    "port" => 9090,
    "user" => "alexeybob",
    "pass" => "123abc",
    "path" => '/common/user/2',
    "query" => "arg1=25&arg2=member",
    "fragment" => "shop"
]);
```

### Example 3
```php
$url = "http://username:password@hostname:9090/segment1/segment2/segment3/segment4/segment5/segment6?arg1=value1&arg2=value2&arg3=value3&arg4=value4&arg5=value5#anchor";

// result: https://test.com
echo aburl($url, [
    "scheme" => "https",
    "host" => "test.com",
    "port" => null,
    "user" => null,
    "pass" => null,
    "path" => null,
    "query" => null,
    "fragment" => null
]);
```
