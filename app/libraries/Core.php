<?php
  /* 
   *  APP CORE CLASS
   *  Creates URL & Loads Core Controller
   *  URL Format - /controller/method/param1/param2
   */
  class Core {
    // Set Defaults
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      $url = $this->getUrl();

      if (isset($url)) {
        # code...
        if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
          $this->currentController = ucwords($url[0]);
          unset($url[0]);
        }
      }
      require_once('../app/controllers/' . $this->currentController . '.php');

      $this->currentController = new $this->currentController;
      if(isset($url[1])){

        if(method_exists($this->currentController, $url[1])){
          // Set current method if it exsists
          $this->currentMethod = $url[1];
          // Unset 1 index
          unset($url[1]);
        }
      }

      // Get params - Any values left over in url are params
      $this->params = $url ? array_values($url) : [];

      // Call a callback with an array of parameters
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // Construct URL From $_GET['url']
    public function getUrl(){
        if(isset($_GET['url'])){
          $url = rtrim($_GET['url'], '/');
          $url = filter_var($url, FILTER_SANITIZE_URL);
          $url = explode('/', $url);
          return $url;
        }
    }
  }