<?php
namespace pastuhov\xml2object;

/**
 * Tree element.
 */
class Node extends \stdClass
{
    /**
     * XML tag name.
     *
     * @var string
     */
    public $_tagName;
    /**
     * Property name.
     *
     * If empty - no children.
     *
     * @var string
     */
    public $_childrenProperty;
}
