<?php

return array(

'driver' => 'smtp',
'from' => array('address' => 'no-reply@ahleeen.com', 'name' => 'Ahleeen Team'),
'host' => 'smtp.mandrillapp.com',
'port' => 587,
'encryption' => 'tls',
'username' => 'nhm919@hotmail.com',
'password' => getenv('MANDRILL_PASSWORD'),

);
