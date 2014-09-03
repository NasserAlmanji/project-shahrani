<?php
class EmailQueue{
    public function fire($job, $data){

    	$emailData['activationCode'] = $data['activationCode'];
    	$username = $data['username'];
    	$emailData['email'] = $data['username'];
    	$firstName = $data['firstName'];

 		Mail::send('emails.auth.activationCodeSend', $emailData , function($message) use ($username,$firstName)
			{
	    		$message->to($username, $firstName)->subject($firstName.' activate your account at Ahleeen');
			});  

        $job->delete();
    }
}