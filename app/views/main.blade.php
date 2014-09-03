@extends('layouts.master')

@section('title')
@parent
@stop

@section('styles')
  @parent

  #theme {
      min-height:500px;
      background-color: rgba(50,50,50,0.9);
      width:100%;
    }
    
    #bePart {
      margin: 0px auto;
      max-width: 500px;
      //background-color: red;
      text-align:center;
      padding-top: 200px;
    }
    .azrar {
      width:200px; 
      height:30px;
      line-height:30px;
      font-size: 20px;
      color: white;
    }

    .button-success {
        padding: 0.5em 1em;
    }

    #bigContainer {
        max-width: 100%;
        margin: 0px 0px;
    }

    #container {
      padding: 0px;
      border :none
    }


    #menu {
      display: none;  
    }

    #frontImage {
      height: 350px;
    }
    @media only screen and (max-width: 480px) {
      #frontImage {
          height: 150px;  
        }

      #bePart {
        padding-top : 200px; 
      }

      #theme {
        min-height:400px;
        background-color: rgba(50,50,50,0.9);
        width:100%;
      }

    }
    

@stop

@section('content')
  
      <div id="theme">
          <div id="bePart">
              <div>
                  <a  class="pure-button pure-button-primary azrar" href="{{URL::to('login')}}">دخول</a>
              </div>
                  <br>
                  <a class="pure-button button-success azrar" href="{{URL::to('signup')}}">تسجيل</a>
          </div>
      </div>

      <div id="frontImage"> 
        <img width="100%" height="100%" src="http://gulfbusiness.motivate.netdna-cdn.com/wp-content/uploads/SX107_0EAE_9-620x310.jpg">
      </div>

@stop
