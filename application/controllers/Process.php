<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Process extends CI_Controller
  {
      function __construct()
      {
        parent::__construct();
        $this->load->database();
      }

      function scraping()
      {
        require('module/simplehtmldom/simple_html_dom.php');
        $param1 = substr($_POST['param1'], 23);
        $param1 = urldecode($param1);
        if(!$param1) {
          throw new exception('param1 값이 없습니다.');
        }

        $html = file_get_html($param1);
        foreach($html->find('script') as $element)
        $str = $element->innertext;
        $res = strstr($str, 'var rgGames');
        if (preg_match('/var rgGames =(.*?)var rgChangingGames = /', $res, $result)) {
            $result = $result[1];
        }
        $gamelist = substr($result, 0, -5);
        // echo $gamelist;
        $result = array();
        $result['success']	= true;
        $result['data']		= $gamelist;
        echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
      }

      function autocomplete_search()
      {
        header("Content-Type: application/json");

        /*
    		$query = $this->db->get('games');
    			foreach ($query->result() as $row)
    			{
    				$tmp1 = $row->name;
    				echo '"'.$tmp1.'", ';
    			}
        */
        $term = $_GET['term'];
        $item	= array();
        $query = $this->db->query("SELECT * FROM `games` WHERE `name` LIKE '%$term%' LIMIT 8");
    		foreach ($query->result() as $row)
    		{
    			$tmp1 = $row->name;
    			// echo '"'.$tmp1.'", ';
          array_push($item, $tmp1);
    		}
        echo json_encode($item);
        // print_r ($item);
        /*
        $cities = array("서울","부산","대구","광주","울산");
        $term = $_GET['term'];
        $result = [];
        foreach($cities as $city) {
            if(strpos($city, $term) !== false) {
                $result[] = array("label" => $city);
            }
        }
        */
        // echo json_encode($result);
      }

  }
?>
