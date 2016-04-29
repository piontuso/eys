<?php

namespace Drupal\m_learning\Controller;


use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Logger\LoggerChannelFactory;
use Drupal\m_learning\Welcome\WelcomeGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class TestController extends ControllerBase
{
  private $welcomeGenerator;
  /**
   * @var LoggerChannelFactory
   */
  private $loggerChannelFactory;

  public function __construct(WelcomeGenerator $welcomeGenerator, LoggerChannelFactory $loggerChannelFactory)
  {
    $this->welcomeGenerator = $welcomeGenerator;
    $this->loggerChannelFactory = $loggerChannelFactory;
  }

  public function content($name)
  {
    $response = $this->welcomeGenerator->getWelcome($name);
    $this->loggerChannelFactory->get('default')
      ->debug($response);

    return array(
      '#title' => t('Welcome'),
      '#markup' => $response,
    );
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container)
  {
    $welcomeGenerator = $container->get('m_learning.welcome_generator');
    $loggerChannelFactory = $container->get('logger.factory');

    return new static($welcomeGenerator, $loggerChannelFactory);
  }

}