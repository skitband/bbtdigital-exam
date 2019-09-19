<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>BBTDigital - Exam</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    	<div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="{{ route('add.customer') }}">Add Customer</a>
                    <a href="{{ route('get.premium') }}">Get Premium</a>
                </div>
                <div>
                	
	                <div class="alert alert-danger" id="add-premium-errors">
	                    <span id="add-premium-errors"></span>
	                </div>
	                <div class="alert alert-success" id="add-success-bag">
	                	<input type="text" name="premium">
	                </div>
	                <form id="getPremium">
	                <div class="form-group">
	                    <label>
	                        Client Email
	                    </label>
	                    <input class="form-control" id="client_email" name="client_email" required type="email">
	                    </input>
	                </div>
	                <button class="btn btn-info" id="btn-premium" type="button" value="add">
	                    Submit
	                </button>
            	</div>
            </div>
        </div>
    </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
<script type="text/javascript">
$(document).ready(function(){
	$("#add-success-bag").hide();
	$("#btn-premium").click(function(){
		var email = $("#client_email").val();
	    $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
	    $.ajax({
	        type: 'GET',
	        url: '/api/clients/' + email,
	        dataType: 'json',
	        success: function(data){
	            $("#add-success-bag input[name=premium]").val(data.premium.premium);
	            $("#add-success-bag").show();
	        	$("#add-premium-errors").hide();
	        },
	        error: function(data){
	        	var errors = $.parseJSON(data.responseText);
	        	$("#add-premium-errors").show();
	        	$("#add-success-bag").hide();
	            $('#add-premium-errors').html(errors.messages.messages);
	            
	        }
	    });
	});
});
</script>
</html>
