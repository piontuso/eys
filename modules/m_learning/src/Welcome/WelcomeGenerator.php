<?php

namespace Drupal\m_learning\Welcome;

use Drupal\Core\KeyValueStore\KeyValueFactory;

class WelcomeGenerator
{
  /**
   * @var KeyValueFactory
   */
  private $keyValueFactory;
  private $useCache;

  public function __construct(KeyValueFactory $keyValueFactory, $useCache)
  {
    $this->keyValueFactory = $keyValueFactory;
    $this->useCache = $useCache;
  }

  public function getWelcome($name) {
    $key = 'welcome_' . $name;
    $store = $this->keyValueFactory->get('welcome');

    if ($this->useCache && $store->has($key)) {
      return $store->get($key);
    }

    sleep(2);

    $string = 'Welcome ' . $name . ' on first drupal 8 page.';
    if ($this->useCache) {
      $store->set($key, $string);
    }

    return $string;
  }
}