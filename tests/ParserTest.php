<?php

namespace pastuhov\xml2object\tests;

use pastuhov\xml2object\Parser;
use pastuhov\xml2object\tests\data\Object;
use yii\helpers\Json;

/**
 * Xml2Object test
 */
class ParserTest extends \PHPUnit_Framework_TestCase
{
    public function testProcess()
    {
        $converter = new Parser();
        $converter->xml = file_get_contents(__DIR__ . '/data/xml.xml');
        $object = $converter->process();

        $options = 320;
        $options |= JSON_PRETTY_PRINT;

        $this->assertJsonStringEqualsJsonString(
            $this->encodeJson(
                new Object(),
                $options
            ),
            $this->encodeJson(
                $object,
                $options
            )
        );
    }

    public function encodeJson($object, $options)
    {
        $json = json_encode($object, $options);

        return $json;
    }

}
