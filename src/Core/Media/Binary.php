<?php
/**
 * @license see LICENSE
 */

namespace Serps\Core\Media;

class Binary extends AbstractMedia
{

    protected $data;

    /**
     * Binary constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function asString()
    {
        return $this->data;
    }
}
