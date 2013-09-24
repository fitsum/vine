<?php 
        // create curl resource 
        $ch = curl_init(); 

        // set url and post parameters 
		$data = array('username' => 'fitsumbelay@gmail.com', 'password' => '8JeuKHvR');
        curl_setopt($ch, CURLOPT_URL, "https://api.vineapp.com/users/authenticate"); 
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
 //       echo $output;

        // close curl resource to free up system resources 
        curl_close($ch); 

        $joutput = json_decode($output);
        $key = $joutput->{'data'}->{'key'};



        // create curl resource 
        $ch = curl_init(); 
        $curl_headers = "vine-session-id:".$key;

        // set url and headers 
        curl_setopt($ch, CURLOPT_URL, "https://api.vineapp.com/timelines/popular"); 
		curl_setopt($ch, CURLOPT_HTTPHEADER,array($curl_headers));

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $vine_request = curl_exec($ch); 
		$vine_request = str_replace('\n', '', $vine_request);
        echo $vine_request;

        // close curl resource to free up system resources 
        curl_close($ch); 









?>