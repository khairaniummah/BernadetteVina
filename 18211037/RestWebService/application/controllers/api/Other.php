<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Other extends REST_Controller
{
	function player_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

        $players = $this->Otherplayer->get_array();
    	/*$players = array(
			1 => array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com', 'fact' => 'Loves swimming'),
			2 => array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com', 'fact' => 'Has a huge face'),
			3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => 'Is a Scott!', array('hobbies' => array('fartings', 'bikes'))),
		);
		*/
         $ide = $this->get('id') - 1;
        $player = @$players['players'][$ide];
        $playerreturn['players'] = $player ;
    	
        if($player)
        {
            $this->response($playerreturn, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'player could not be found'), 404);
        }
    }
    
    
    
    function players_get()
    {
         $players = $this->Otherplayer->get_array();
        
        if($players)
        {
            $this->response($players, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any players!'), 404);
        }
    }

    function player_post()
    {
        //$this->some_model->updateplayer( $this->get('id') );
        $message = array('id' => $this->get('id'), 'name' => $this->post('name'), 'email' => $this->post('email'), 'message' => 'ADDED!');
        
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
    function player_delete()
    {
        //$this->some_model->deletesomething( $this->get('id') );
        $message = array('id' => $this->get('id'), 'message' => 'DELETED!');
        
        $this->response($message, 200); // 200 being the HTTP response code
    }

        public function send_post()
    {
        var_dump($this->request->body);
    }


    public function send_put()
    {
        var_dump($this->put('foo'));
    }

}