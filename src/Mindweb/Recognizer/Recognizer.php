<?php
namespace Mindweb\Recognizer;

use Mindweb\Subscriber\Subscriber;
use Symfony\Component\Config\Definition\ConfigurationInterface;

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
     * @return null|ConfigurationInterface
     */
    public function getConfiguration()
    {
        return null;
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