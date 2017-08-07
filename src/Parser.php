<?php
namespace pastuhov\xml2object;

/**
 * XML to object parser.
 */
class Parser
{
    /**
     * XML content.
     *
     * @var string
     */
    public $xml;
    /**
     * Tag names for 'to property conversion'
     *
     * @var string[]
     */
    public $convertToAttribute = [
        'properties',
        'options',
        'features',
        'rows',
    ];
    /**
     * Children property.
     *
     * @var string
     */
    public $childrenProperty = 'children';
    /**
     * XML parser.
     *
     * @var \XMLReader
     */
    protected $reader;

    /**
     * Convert.
     *
     * @return Node
     */
    public function process()
    {
        $reader = $this->getReader();

        $recipientChain = [];

        while($reader->read())
        {
            $nodeType = $reader->nodeType;

            switch ($nodeType)
            {
                case \XMLReader::END_ELEMENT:
                    if (!in_array($reader->name, $this->convertToAttribute, true) && count($recipientChain) !== 1) {
                        $recipientChain = array_slice($recipientChain, 0, -1);
                    }

                    break;
                case \XMLReader::ELEMENT:
                    $recipient = end($recipientChain);
                    $isConverted = false;

                    if ($recipient && $recipient->_childrenProperty === null) {
                        if ($isConverted = in_array($reader->name, $this->convertToAttribute, true)) {
                            $recipient->_childrenProperty = $reader->name;

                            break;
                        } else {
                            $recipient->_childrenProperty = $this->childrenProperty;
                        }
                    }

                    $node = new Node();
                    $node->_tagName = $reader->name;

                    $hasAttributes = $reader->hasAttributes;
                    $isEmptyElement = $reader->isEmptyElement;

                    if ($hasAttributes) {
                        while($reader->moveToNextAttribute()) {
                            $node->{$reader->name} = $reader->value;
                        }
                    }

                    if ($recipient) {
                        $recipient->{$recipient->_childrenProperty}[] = $node;
                    }

                    if (!$isEmptyElement && !$isConverted) {
                        $recipientChain[] = $node;
                    }

                    break;
                case \XMLReader::TEXT:

                    break;
                case \XMLReader::ATTRIBUTE:

                    break;
            }
        }

        $reader->close();

        return $recipientChain[0];
    }

    /**
     * @return \XMLReader
     */
    protected function getReader()
    {
        $reader = new \XMLReader();
        $reader->XML($this->xml);

        return $reader;
    }

}
