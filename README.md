format-telefoonnummer
===

Formatteer alle Nederlandse telefoonnummers volgens de nationale standaard. Alle (geografische- en niet-geografische) netnummers worden netjes geformatteerd.

```0201234567``` wordt bijvoorbeeld ```020 1234567```

```020 123 4567``` wordt bijvoorbeeld ```020 1234567```

```02 012 345 67``` wordt bijvoorbeeld ```020 1234567```

```020-12 345 67``` wordt bijvoorbeeld ```020 1234567```

## Gebruik je eigen tussenvoegsel

```0201234567``` wordt bijvoorbeeld ```020-1234567```

```0201234567``` wordt bijvoorbeeld ```020 - 1234567```

# Usage
```php
use denvers\Telefoonnummer;

Telefoonnummer::beautify("020 123 4567"); // produces 020 1234567

Telefoonnummer::beautify("020 123 4567", " - "); // produces 020 - 1234567
```
