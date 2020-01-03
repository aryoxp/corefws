<?php

class Core {

  private static $instance;

  private $autoloader;
  private $config;
  private $uri;
  private $message;

  private function __construct() {
    // load the autoloader class file manually...
    require_once CORE_LIBRARY . 'CoreAutoloader.php';

    // instantiate core-class objects
    $this->autoloader = new CoreAutoloader();
    $this->config = CoreConfig::instance();
    $this->uri = CoreUri::instance();
    $this->message = CoreMessage::instance();
  }

  public static function instance() {
    if (Core::$instance == null) Core::$instance = new Core();
    return Core::$instance;
  }

  public function getUri($type = null) {
    switch ($type) {
      case CoreUri::CONTROLLER:
        return $this->uri->getController();
      case CoreUri::METHOD:
        return $this->uri->getMethod();
      case CoreUri::ARGS:
        return $this->uri->getArgs();
      case CoreUri::SCHEME:
        return $this->uri->getScheme();
      case CoreUri::HOST:
        return $this->uri->getHost();
      case CoreUri::PORT:
        return $this->uri->getPort();
      case CoreUri::SCRIPT:
        return $this->uri->getScript();
      case CoreUri::QUERY_STRING:
        return $this->uri->getQueryString();
    }
    return $this->uri;
  }

  // Config handling

  public function getConfig($key) {
    return $this->config->get($key);
  }

  // Message handling
  public function setMessage($message, $type) {

  }

}