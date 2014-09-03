@extends('layouts.master')

@section('styles')
	@parent
@stop

@section('content')

		<div id="container">
				{{ Form::open(array('url' => 'signup', 'class'=>'pure-form pure-form-aligned')) }}

			    <fieldset>
			        <div class="pure-control-group">
			            <label for="name">اسم المستخدم</label>
			            <input type="email" name="email" id="name" placeholder="بريدك الالكتروني" autofocus required>
			        </div>

			          <div class="pure-control-group">
			            <label for="firstName">الاسم</label>
			            <input name="firstName" id="firstName" type="text" placeholder="الاسم" >
			        </div>

			        <div class="pure-control-group">
			            <label for="password">كلمة المرور</label>
			            <input name="password" id="password" type="password" placeholder="كلمة المرور">
			        </div>


			        <div class="pure-control-group">
			            <label for="password">كلمة المرور</label>
			            <input name="password_retyped" id="password" type="password" placeholder="تأكيد كلمة المرور" >
			        </div>

			        <div id="controls" class="pure-controls">
			            <button type="submit" class="pure-button pure-button-primary">سجّل</button>
			        </div>
			    </fieldset>
			    {{ Form::close()}}
    	</div>
@stop