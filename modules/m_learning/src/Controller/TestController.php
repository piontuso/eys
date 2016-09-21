<?php

namespace Drupal\m_learning\Controller;


use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Form\FormBuilder;
use Drupal\Core\Form\FormState;
use Drupal\Core\Logger\LoggerChannelFactory;
use Drupal\m_learning\Welcome\WelcomeGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class TestController extends ControllerBase {
  private $welcomeGenerator;
  protected $formBuilder;
  /**
   * @var LoggerChannelFactory
   */
  private $loggerChannelFactory;

  public function __construct(WelcomeGenerator $welcomeGenerator, LoggerChannelFactory $loggerChannelFactory, FormBuilder $formBuilder) {
    $this->welcomeGenerator = $welcomeGenerator;
    $this->loggerChannelFactory = $loggerChannelFactory;
    $this->formBuilder = $formBuilder;
  }

  public function content($name) {
    $response = $this->welcomeGenerator->getWelcome($name);
    $this->loggerChannelFactory->get('default')
      ->debug($response);

    return array(
      '#title' => t('Welcome'),
      '#markup' => $response,
    );
  }

  public function exampleForm() {
    $form = \Drupal::formBuilder()->getForm('Drupal\m_learning\Form\WelcomeForm');

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $welcomeGenerator = $container->get('m_learning.welcome_generator');
    $loggerChannelFactory = $container->get('logger.factory');
    $formBuilder = $container->get('form_builder');

    return new static($welcomeGenerator, $loggerChannelFactory, $formBuilder);
  }
}