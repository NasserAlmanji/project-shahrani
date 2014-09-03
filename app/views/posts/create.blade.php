@extends('layouts.master')


@section('styles')
	@parent

@stop

@section('content')



		<div id="container">
				{{ Form::open(array('url' => 'admin/post/create', 'class'=>'pure-form pure-form-aligned')) }}

			    <fieldset>
			        <div class="pure-control-group">
			            <label for="name" style="margin-bottom:10px;">أخبار الأسهم : </label>
			            <div>
			            	<textarea name="postBody" rows="5" placeholder="الجديد..." autofocus style="width:100%;" ></textarea>
			            </div>
			        </div>

  					<div class="pure-control-group">
			            <label for="companyID" style="margin-bottom:10px;">الشركة : </label>
						<div>
							<select name="companyID">
								@foreach ($companies as $company)
								  	<option value="{{ $company->id }}">{{ $company->name }}</option>
								@endforeach
							</select>
						</div>
			        </div>

			        <div class="pure-control-group">
			            <label for="postType" style="margin-bottom:10px;">التصنيف : </label>
						<div>
						<!--
							@foreach($PostTypesArabic as $PostTypeArabic)
									{{ print_r(array_keys($PostTypesArabic));}}		
    						@endforeach
    						-->
							<select name="postType">
									@foreach($PostTypesArabic as $key => $PostTypeArabic)
										  	<option value="{{$key}}"> {{$PostTypesArabic[$key]}} </option>
		    						@endforeach
								  	<!--<option value="recommendation"> توصية </option>
								  	<option value="information"> معلومة </option>
								  	<option value="warning"> تحذير </option>-->

							</select>
						</div>
			        </div>

			         <div class="pure-control-group">
			            <label for="investmentType" style="margin-bottom:10px;">نوع الاستثمار : </label>
						<div>

							<select name="investmentType">
									@foreach($InvenstmentTypesArabic as $key => $PostTypeArabic)
										  	<option value="{{$key}}"> {{$InvenstmentTypesArabic[$key]}} </option>
		    						@endforeach

							</select>
						</div>
			        </div>


		

			        <div id="controls" class="pure-controls">
			            <button type="submit" class="pure-button pure-button-primary">انشر</button>
			        </div>

			        
			    </fieldset>
			    {{ Form::close()}}
		</div>
@stop