@extends('layouts.master')

@section('styles')
	@parent

	.postBody {
		max-width: 500px;
		padding: 20px;
		background-color: white;
		border: 1px solid rgb(200,200,200);
		border-bottom:none;
		color: black;
		position:relative;
		z-index: -10;

	}

	.postDate {
		padding-top:15px;
		text-align:left;
	}

	#bigContainer {
		margin: 20px auto;
	}

	#container {
		border:none;
	}

	.post-type {
		position:relative;
		top:-15px;
		right:-21px;
		padding: 6px;
		color: white;
	}
	.post-type-recommendation {
		background-color: green;
	}

	.post-type-warning {
		background-color:orange;
	}

	.post-type-information {
		background-color: blue;
	}

	.post-type-reminder {
		background-color: brown;
	}
	
@stop

@section('content')

		<div id="container">
				@if (isset($count))
					<span class="badge"> @traverse_farsi($count) </span>
				@endif

				@foreach ($posts as $post)
  					<div class="postBody">
						@if(($post->type)!='0')
  							<span class="post-type post-type-{{$post->type}}">
									{{ $PostTypesArabic[$post->type]}}
							</span>
						@endif

  						<div> {{ $post->body }} </div>

						<div class="postDate"> 
	                        <div>
								<span style='color:rgba(100,100,100,0.7);'> @traverse_farsi($post->created_at->day) </span>
								<span style='color:rgba(200,200,200,0.5);'> \ </span> 
								<span style='color:rgba(100,100,100,0.7);'> @traverse_farsi($post->created_at->month) </span> 
								<span style='color:rgba(200,200,200,0.5);'> \ </span> 
								<span style='color:rgba(100,100,100,0.7);'> @traverse_farsi($post->created_at->year) </span> 
		                        @if (Sentry::getUser()->hasAccess('admin'))
		                        	<a class="pure-button button-error" style="float:left; padding:5px 5px 5px 5px; margin-right: 10px;" href="{{URL::to('admin/delete/'.$post->id);}}"> delete </a>
		                        @endif
	                        </div>
						</div>
  					</div>


				@endforeach
		</div>
@stop