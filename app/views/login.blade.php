@extends('layouts.master')

@section('styles')
	@parent

@stop

@section('content')

		<div id="container">
				{{ Form::open(array('url' => 'login', 'class'=>'pure-form pure-form-aligned')) }}

			    <fieldset>
			        <div class="pure-control-group">
			            <label for="name">المستخدم</label>
			            <input type='email' name="email" id="name" placeholder="بريدك الالكتروني" autofocus>
			        </div>

			        <div class="pure-control-group">
			            <label for="password">كلمة المرور</label>
			            <input name="password" id="password" type="password" placeholder="كلمة المرور">
			        </div>

			        <div id="controls" class="pure-controls">
			            <label for="cb" class="pure-checkbox">
			                <input name="rememberme" id="cb" type="checkbox"> حفظ المستخدم
			            </label>

			            <button type="submit" class="pure-button pure-button-primary">دخول</button>
			        </div>
			    </fieldset>
			    {{ Form::close()}}
		</div>
@stop