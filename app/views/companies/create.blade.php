@extends('layouts.master')

@section('styles')
	@parent

@stop

@section('content')



		<div id="container">
				{{ Form::open(array('url' => 'admin/company/create', 'class'=>'pure-form pure-form-aligned')) }}

			    <fieldset>
			        <div class="pure-control-group">
			            <label for="name" style="margin-bottom:10px;">اسم الشركة: </label>
			            <div>
			            	<input name="companyName" placeholder="اسم الشركة" autofocus style="width:100%;" ></input>
			            </div>
			        </div>


			        <div id="controls" class="pure-controls">
			            <button type="submit" class="pure-button pure-button-primary">أضف</button>
			        </div>


			    </fieldset>
			    {{ Form::close()}}
		</div>
@stop