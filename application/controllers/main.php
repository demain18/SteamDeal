<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Main extends CI_Controller
  {
      function __construct()
      {
        parent::__construct();
      }

      function index()
      {

        echo 'This is index.';

      }
  }
?>
