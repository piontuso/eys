<?php

namespace Drupal\m_learning\Welcome;


use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class WelcomeListener implements EventSubscriberInterface
{
  /**
   * @var LoggerChannelFactoryInterface
   */
  private $loggerChannelFactory;

  public function __construct(LoggerChannelFactoryInterface $loggerChannelFactory)
  {
    $this->loggerChannelFactory = $loggerChannelFactory;
  }

  public function onKernelRequest(GetResponseEvent $event) {
    $request = $event->getRequest();
    $shouldWelcome = $request->query->get('test');

    if ($shouldWelcome) {
      $this->loggerChannelFactory->get('default')
        ->debug('Welcome requested!');
    }
  }
  /**
   * Returns an array of event names this subscriber wants to listen to.
   *
   * The array keys are event names and the value can be:
   *
   *  * The method name to call (priority defaults to 0)
   *  * An array composed of the method name to call and the priority
   *  * An array of arrays composed of the method names to call and respective
   *    priorities, or 0 if unset
   *
   * For instance:
   *
   *  * array('eventName' => 'methodName')
   *  * array('eventName' => array('methodName', $priority))
   *  * array('eventName' => array(array('methodName1', $priority), array('methodName2')))
   *
   * @return array The event names to listen to
   */
  public static function getSubscribedEvents()
  {
    return [
      KernelEvents::REQUEST => 'onKernelRequest'
    ];
  }

}