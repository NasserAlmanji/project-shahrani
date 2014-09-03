<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		if (Sentry::check()) {

			$ucp = UserCountPost::where('user_id','=',Sentry::getUser()->id)->first();
			if ($ucp == null) {
				$latest_time = 0;
			} else {
				$latest_time = $ucp->lastview;
			}

			//echo ($latest_time);
			$count = Post::where("created_at",">",$latest_time)->get()->count();
			if ($count>0) {
				$old['count'] = $count;
			} else {
				$count = 0;
			}

			$posts = Post::orderBy('created_at','desc')->get();
			$message = Session::get('message');
			$Messagetype = Session::get('Messagetype');
			$old['message'] = $message;
			$old['Messagetype'] = $Messagetype;
			$old['posts'] = $posts;
			Queue::push("LastViewQueue",array('id'=>Sentry::getUser()->id,'time'=>Carbon::now()));
			return View::make('posts.index')->with($old);
		} else {
			//return View::make('nonsubscribers_home');
			return Redirect::to('login');
		}

		
	}

	public function createIndex() {
		$companies = Company::orderBy('name','asc')->get();
		$old['companies'] = $companies;

        return View::make('posts.create')->with($old);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$postBody = Input::get('postBody');
		$companyID = Input::get('companyID');
		$postType = Input::get('postType');

		$post = new Post();
		$post->body = $postBody;
		$post->company_id = $companyID;
		$post->type = $postType;
		$post->save();

		return Redirect::to('home')->with(array('Messagetype'=>'success','message'=> 'post was successfully published'));

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);
		$post->delete();
		return Redirect::to('home')->with(array('Messagetype'=>'warning','message'=> 'post with id #'.$id.' was deleted'));

	}


}
