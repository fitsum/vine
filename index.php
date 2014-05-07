<!DOCTYPE html>
<html>
        <head>
                <meta name="viewport" content="width=device-width, initial-scale=1"> 
                <style type="text/css">
                        video{
                                width: 100%;
                                height: auto;
                        }
                </style>                
        </head>
        <body>



        <?php 
                // create curl resource 
                $ch = curl_init(); 

                // set url and post parameters 
        	$data = array('username' => 'xxx', 'password' => 'xxx');
                curl_setopt($ch, CURLOPT_URL, "https://api.vineapp.com/users/authenticate"); 
        	curl_setopt($ch, CURLOPT_POST, 1);
        	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

                //return the transfer as a string 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

                // $output contains the output string 
                $auth = curl_exec($ch);
                $auth = json_decode($auth);
                $key = $auth->data->key;





                // create curl resource 
        //        $ch = curl_init(); 
                $curl_headers = "vine-session-id:".$key;

                // set url and headers 
                curl_setopt($ch, CURLOPT_URL, "https://api.vineapp.com/timelines/popular"); 
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');        
        	curl_setopt($ch, CURLOPT_HTTPHEADER,array($curl_headers));

                //return the transfer as a string 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

                // $output contains the output string 
                $v = curl_exec($ch); 
                $v = json_decode($v);
                foreach($v->data->records as $item){     
                        
                        echo "<video controls src='".$item->videoLowURL."'></video>";
                }

                // close curl resource to free up system resources 
                curl_close($ch); 

        ?>
        </body>
</html>
