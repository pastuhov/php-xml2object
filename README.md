[![Build Status](https://travis-ci.org/pastuhov/php-xml2object.svg)](https://travis-ci.org/pastuhov/php-xml2object)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pastuhov/php-xml2object/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/pastuhov/php-xml2object/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/pastuhov/php-xml2object/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/pastuhov/php-xml2object/?branch=master)
[![Total Downloads](https://poser.pugx.org/pastuhov/php-xml2object/downloads)](https://packagist.org/packages/pastuhov/php-xml2object)

Converts XML to object
===========================

Input: 
```xml
<root>
    <detail detailid="3721899" formattedoem="90311-71001" manufacturer="TOYOTA">
        <properties>
            <property code="Name" detailpropertyid="6086730" locale="en_US" property="Наименование"/>
            <property property="Наименование" rate="5" value="ｶﾑｼｬﾌﾄｾｯﾃｨﾝｸﾞ ｵｲﾙ ｼｰﾙ"/>
            <property rate="5" value="0.035 кг"/>
        </properties>
    </detail>
    <detail detailid="4445210" formattedoem="20621-71001" manufacturer="TOYOTA">
        <properties>
            <property code="Name" detailpropertyid="6086730" locale="en_US" property="Наименование"/>
            <property property="Наименование" rate="5" value="ｶﾑｼｬﾌﾄｾｯﾃｨﾝｸﾞ ｵｲﾙ ｼｰﾙ"/>
        </properties>
    </detail>
</root>
```

Output:
```javascript
{
    "_tagName": "root",
    "_childrenProperty": "children",
    "children": [
        {
            "_tagName": "detail",
            "_childrenProperty": "properties",
            "detailid": "3721899",
            "formattedoem": "90311-71001",
            "manufacturer": "TOYOTA",
            "properties": [
                {
                    "_tagName": "property",
                    "_childrenProperty": null,
                    "code": "Name",
                    "detailpropertyid": "6086730",
                    "locale": "en_US",
                    "property": "Наименование"
                },
                {
                    "_tagName": "property",
                    "_childrenProperty": null,
                    "property": "Наименование",
                    "rate": "5",
                    "value": "ｶﾑｼｬﾌﾄｾｯﾃｨﾝｸﾞ ｵｲﾙ ｼｰﾙ"
                },
                {
                    "_tagName": "property",
                    "_childrenProperty": null,
                    "rate": "5",
                    "value": "0.035 кг"
                }
            ]
        },
        {
            "_tagName": "detail",
            "_childrenProperty": "properties",
            "detailid": "4445210",
            "formattedoem": "20621-71001",
            "manufacturer": "TOYOTA",
            "properties": [
                {
                    "_tagName": "property",
                    "_childrenProperty": null,
                    "code": "Name",
                    "detailpropertyid": "6086730",
                    "locale": "en_US",
                    "property": "Наименование"
                },
                {
                    "_tagName": "property",
                    "_childrenProperty": null,
                    "property": "Наименование",
                    "rate": "5",
                    "value": "ｶﾑｼｬﾌﾄｾｯﾃｨﾝｸﾞ ｵｲﾙ ｼｰﾙ"
                }
            ]
        }
    ]
}

```

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist pastuhov/php-xml2object
```

or add

```
"require-dev": {
    "pastuhov/php-xml2object": "~1.0.0"
    ...
```

to the require section of your `composer.json` file.

Usage
-----

```php
use pastuhov\xml2object\Parser;

$converter = new Parser();
$converter->xml = file_get_contents(__DIR__ . '/data/xml.xml');
$object = $converter->process();
```

Testing
-------

```bash
./vendor/bin/phpunit
```

Security
--------

If you discover any security related issues, please email pastukhov_k@sima-land.ru instead of using the issue tracker.
