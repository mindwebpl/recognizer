<?php
namespace Mindweb\Recognizer\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;

class AttributionEvent extends Event
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var array
     */
    private $attribution = array();

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function attribute($key, $value)
    {
        $this->attribution[$key] = $value;
    }

    /**
     * @return array
     */
    public function getAttribution()
    {
        return $this->attribution;
    }
} 