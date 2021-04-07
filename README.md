# classlist

A simple utility for conditionally concatenating a list of class names.

```php
classlist('one', 'two') // 'one two'
classlist(['conditional' => true]) // 'conditional'
classlist(['conditional' => false]) // ''
classlist(['sub', 'array'], (object) ['conditional' => true]) // 'sub array conditional'
```

**Install**

```bash
composer require coxmichael/classlist
```

**Usage**

```php
<div class="<?php echo classlist(...args) ?>"></div>

```

Or retrieve the array of class names with a tokenlist:

```php
$tokens = tokenlist('in-results', [ 'not-in-results' => false ]) // ['in-results']
```

**Miscellaneous**

- All falsy values are ignored: `false`, `0`, `null`, `""`, `[]`
- Arrays are flattened
- An object or array's string key will be used if its value is truthy
- Arguments are html attribute escaped

