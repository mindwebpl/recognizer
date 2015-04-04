<?php
namespace Mindweb\Recognizer;

use Mindweb\Subscriber\Subscriber;

abstract class Recognizer implements Subscriber
{
    const RECOGNIZE_EVENT = 'tracker.recognize';

    /**
     * @return string
     */
    public final function getEventName()
    {
        return self::RECOGNIZE_EVENT;
    }

    /**
     * @return array
     */
    public function register()
    {
        return array(
            array('recognize', $this->getPriority())
        );
    }

    /**
     * @param Event\AttributionEvent $attributionEvent
     */
    abstract public function recognize(Event\AttributionEvent $attributionEvent);

    /**
     * @return int
     */
    protected function getPriority()
    {
        return 10;
    }
} 