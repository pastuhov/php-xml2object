<?php
namespace pastuhov\xml2object\tests\data;

use pastuhov\xml2object\Node;

/**
 * Structural identical to ./xml.xml.
 */
class Object extends Node
{
    public $_tagName = 'root';
    public $_childrenProperty = 'children';

    public function __construct()
    {
        $property0 = new Node();
        $property0->_tagName = 'property';
        $property0->code = 'Name';
        $property0->detailpropertyid = '6086730';
        $property0->locale = 'en_US';
        $property0->property = 'Наименование';

        $property1 = new Node();
        $property1->_tagName = 'property';
        $property1->property = 'Наименование';
        $property1->rate = '5';
        $property1->value = 'ｶﾑｼｬﾌﾄｾｯﾃｨﾝｸﾞ ｵｲﾙ ｼｰﾙ';

        $property2 = new Node();
        $property2->_tagName = 'property';
        $property2->rate = '5';
        $property2->value = '0.035 кг';

        $detail = new Node();
        $detail->_tagName = 'detail';
        $detail->_childrenProperty = 'properties';
        $detail->detailid = '3721899';
        $detail->formattedoem = '90311-71001';
        $detail->manufacturer = 'TOYOTA';
        $detail->properties = [
            $property0,
            $property1,
            $property2,
        ];

        $detail1 = new Node();
        $detail1->_tagName = 'detail';
        $detail1->_childrenProperty = 'properties';
        $detail1->detailid = '4445210';
        $detail1->formattedoem = '20621-71001';
        $detail1->manufacturer = 'TOYOTA';
        $detail1->properties = [
            $property0,
            $property1,
        ];


        $this->children = [
            $detail,
            $detail1,
        ];
    }
}