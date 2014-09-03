<?php
class MyQueue{
    public function fire($job, $data){
        $query = DB::insert('INSERT INTO queue (timestamp) VALUES(NOW())');
        
    	$emailData['activationCode'] = '12345677890';
        $username = 'alminji@me.com';
    	$emailData['email'] = $username;

        $firstName = 'oman';
        Mail::send('emails.auth.activationCodeSend', $emailData , function($message) use ($username,$firstName)
			{
	    		$message->to($username, $firstName)->subject($firstName.' activate your account at Ahleeen');
			});

        var_dump($data);
        $job->delete();


    }
}