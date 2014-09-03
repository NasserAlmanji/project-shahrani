<?php

return array(

/*'driver' => 'smtp',
'from' => array('address' => 'no-reply@ahleeen.com', 'name' => 'Ahleeen Team'),
'host' => 'smtp.mandrillapp.com',
'port' => 587,
'encryption' => 'tls',
'username' => getenv('MANDRILL_USER'),
'password' => getenv('MANDRILL_PASSWORD'),*/

'driver' => 'smtp',
'host' => 'smtp.gmail.com',
'port' => 465,
'from' => array('address' => 'no-reply@ahleeen.com', 'name' => 'Ahleeen Team'),
'encryption' => 'ssl',
'username' => getenv('GMAIL_USER'),
'password' => getenv('GMAIL_PASSWORD'),


);
