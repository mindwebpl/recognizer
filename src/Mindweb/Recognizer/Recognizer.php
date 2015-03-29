<?php
namespace Mindweb\Recognizer;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

abstract class Recognizer implements EventSubscriberInterface
{
    const RECOGNIZE_EVENT = 'tracker.recognize';

    const DEFAULT_PRIORITY = 10;

    /**
     * @param Event\AttributionEvent $attributionEvent
     */
    abstract public function recognize(Event\AttributionEvent $attributionEvent);

    /**
     * @return int
     */
    public static function getPriority()
    {
        return self::DEFAULT_PRIORITY;
    }

    /**
     * @inherited
     */
    public static function getSubscribedEvents()
    {
        return array(
            self::RECOGNIZE_EVENT => array(
                'recognize',
                self::getPriority()
            )
        );
    }
} 