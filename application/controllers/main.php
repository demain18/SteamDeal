<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Main extends CI_Controller
  {
      function __construct()
      {
        parent::__construct();
        $this->load->database();
      }
      function userinfo_statement()
      {
        $this->load->view('Steamdeal_privaty_notice.html');
      }
      /* StealDeal/... index, dashboard, item, sell */
      function index()
      {
        $this->load->library('javascript');
        $this->load->library('javascript/jquery');

        // $userdata_get = $this->topic_model->userdata_get();

        $data['style_sheet_index'] = "index.css";
        // echo 'This is index.';
        $this->load->view('Header', $data);
        $this->load->view('Index');
        $this->load->view('Footer');
      }

      function userinfo()
      {
        $data['style_sheet_index'] = "userinfo.css";
        $this->load->view('Header', $data);
        $this->load->view('Userinfo');
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
        $data['style_sheet_index'] = "sell.css";
        // $game_calc = $this->load->view('Game_calc');
        $this->load->view('Header', $data);
        $this->load->view('Sell');
        $this->load->view('Footer_gamecalc_part1');
        $this->load->view('Game_calc');
        $this->load->view('Footer_gamecalc_part2');
      }

      function modify_sell()
      {
        $data['style_sheet_index'] = "sell.css";

        $this->load->view('Header', $data);
        $this->load->view('Modify_sell');
        $this->load->view('Footer_gamecalc_part1');
        $this->load->view('Game_calc');
        $this->load->view('Footer_gamecalc_part2');
      }

      function ex()
      {
        $data['style_sheet_index'] = "example.css";
        $this->load->view('Header', $data);
        $this->load->view('Example');
        $this->load->view('Footer');
      }
  }
?>
