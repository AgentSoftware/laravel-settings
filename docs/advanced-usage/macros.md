---
title: Macros
sort: 3
---

`AgentSoftware\Settings\Settings` is Macroable, so you can add any custom functionality you want to the class. The
best place to do so would be in a service provider.

```php
use AgentSoftware\Settings\Settings;

Settings::macro('getWithSuffix', function ($key, $suffix) {
    // Inside this closure you can call any method available on `Settings`.
    $value = $this->get($key);

    return $value . '_' . $suffix;
});
```

Using the macro:

```php
use AgentSoftware\Settings\Facades\Settings;

Settings::set('foo', 'bar');

Settings::getWithSuffix('foo', 'some_suffix'); // 'bar_some_suffix'

// Or
settings()->getWithSuffix('foo', 'some_suffix');
```
