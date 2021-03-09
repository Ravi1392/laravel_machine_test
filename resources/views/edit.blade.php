<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/bootstrap.min.css">
    <title>Registration From</title>
    <style type="text/css">
    	.jumbotron input ,select {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
    </style>
</head>
<body style="background-color:#76b852;">

    <div class="container">
    	@include('alerts')
    	 <h2 class="">Edit User</h2>
        <form method="POST" action="{{url('update')}}">
        	@csrf
        <div class="row jumbotron" style="background-color: white;">
            <div class="col-sm-6 form-group">
                <label for="name-f">Name</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Enter your Name" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="name-l">Mobile</label>
                <input type="text" id="edit1" size="10" maxlength="10" class="form-control" name="mobile" value="{{$user->mobile}}" placeholder="Enter your Mobile No" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your Email" value="{{$user->email}}" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="address-1">Address</label>
                <input type="text" class="form-control" value="{{$user->address}}" name="address"  placeholder="Enter your Address" required>
            </div>

            <div class="col-sm-6 form-group">
                <label for="sex">Designation</label>
                <select name="designation" class="form-control browser-default custom-select" style="background-color: #f2f2f2;" required>
	               @if($user->designation == 1)
	                <option selected value="1">Admin</option>
	                <option value="2">User</option>
	               @else
					<option  value="1">Admin</option>
	                <option selected value="2">User</option>
	               @endif
	            </select>
            </div>
          
            <div class="col-sm-12 form-group mb-0">
            	<input type="hidden" name="id" value="{{$user->id}}">
               <button name="submit" class="btn btn-primary float-right">Update</button>
            </div>
            
        </div>
        </form>
         
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script type="text/javascript">
          $(document).ready(function () {
         $('[id^=edit1]').keypress(validateNumber);
         
       });

        function validateNumber(event) {
            var key = window.event ? event.keyCode : event.which;
            if (event.keyCode === 8 || event.keyCode === 46) {
                return true;
            } else if ( key < 48 || key > 57 ) {
                return false;
            } else {
            	return true;
            }
        }
    </script>
</body>
</html>
