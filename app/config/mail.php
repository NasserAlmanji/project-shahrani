<?php

return array(

'driver' => 'smtp',
'from' => array('address' => 'no-reply@ahleeen.com', 'name' => 'Ahleeen Team'),
'host' => 'smtp.mandrillapp.com',
'port' => 587,
'username' => getenv('MANDRILL_USER'),
'password' => getenv('MANDRILL_PASSWORD'),

/*'driver' => 'smtp',
'host' => 'smtp.gmail.com',
'port' => 465,
'from' => array('address' => 'no-reply@ahleeen.com', 'name' => 'Ahleeen Team'),
'encryption' => 'ssl',
'username' => getenv('GMAIL_USER'),
'password' => getenv('GMAIL_PASSWORD'),*/

/*'driver' =>'smtp',
'host' => 'smtp.mailgun.org',
'port' => 587,
'from' => array('address' => 'no-reply@ahleeen.com', 'name' => 'Ahleeen Team'),
'username' => getenv('MAILGUN_USER'),
'password' => getenv('MAILGUN_PASSWORD'),*/

);
