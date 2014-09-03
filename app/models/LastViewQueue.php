<?php
class LastViewQueue{
    public function fire($job, $data){
        //$query = DB::insert('INSERT INTO queue (timestamp) VALUES(NOW())');
        //$ucp = UserCountPost();
		$ucp = UserCountPost::firstOrNew(array('user_id' => $data['id']));

        $ucp->user_id = $data['id'];
        $ucp->lastview = $data['time']['date'];
		$ucp->save();
		//var_dump($data);
        $job->delete();
    }
}