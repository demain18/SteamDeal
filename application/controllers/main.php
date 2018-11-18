<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Main extends CI_Controller
  {
      function __construct()
      {
        parent::__construct();
        $this->load->database();
      }
      /* StealDeal/... index, dashboard, item, sell */
      function index()
      {
        $this->load->library('javascript');
        $this->load->library('javascript/jquery');

        $data['style_sheet_index'] = "index.css";
        // echo 'This is index.';
        $this->load->view('Header', $data);
        $this->load->view('Index');
        $this->load->view('Footer');
      }

      function dashboard()
      {
        $data['style_sheet_index'] = "dashboard.css";
        // echo 'This is index.';
        $this->load->view('Header', $data);
        $this->load->view('Dashboard');
        $this->load->view('Footer');
      }

      function item()
      {
        $data['style_sheet_index'] = "item.css";
        // echo 'This is index.';
        $this->load->view('Header', $data);
        $this->load->view('Item');
        $this->load->view('Footer');
      }

      function sell()
      {
        $this->load->library('javascript');
        $this->load->library('javascript/jquery');
        $data['style_sheet_index'] = "sell.css";
        $game_calc = $this->load->view('Game_calc');

        $this->load->view('Header', $data);
        $this->load->view('Sell');
        $this->load->view('Footer', $game_calc);
      }
  }
?>
