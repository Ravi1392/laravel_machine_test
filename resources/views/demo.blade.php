<!DOCTYPE html>
<html>
<head>
    <title>Add/remove multiple input fields dynamically with Jquery Laravel 5.8</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
   
<div class="container">
    <h2 align="center">Add/remove multiple input fields dynamically with Jquery Laravel 5.8</h2> 
   
    <form action="{{ route('addmorePost') }}" method="POST">
        @csrf
   
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
   
        @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif
   
        <table class="table table-bordered" id="dynamicTable">
            <tr>  
              <td><select name="education[0]['field']" class="form-control" style="height: 71% !important;background-color: #f2f2f2;" required>
                <option value="">Select Field</option>
                <option value="SSC">SSC</option>
                <option value="HSC">HSC</option>
                <option value="Graduation">Graduation</option>
                <option value="Master_Degree">Master Degree</option>
              </select></td>  
              <td><input type="text" class="form-control" name="education[0][university]" placeholder="Enter Board/University" value="{{old('education[0][university]')}}" required></td>  
              <td><input type="text" class="form-control" name="education[0][year]" value="{{old('education[0][year]')}}" placeholder="Enter Passing Year" required></td>
              <td><input type="text" class="form-control" name="education[0][percentage]" value="{{old('education[0][percentage]')}}" placeholder="Enter CGPA/Percentage" required></td>    
            </tr>  
             <tr>  
              <td><select name="education[1]['field']" class="form-control" style="height: 71% !important;background-color: #f2f2f2;" required>
                <option value="">Select Field</option>
                <option value="SSC">SSC</option>
                <option value="HSC">HSC</option>
                <option value="Graduation">Graduation</option>
                <option value="Master_Degree">Master Degree</option>
              </select></td>  
              <td><input type="text" class="form-control" name="education[1][university]" placeholder="Enter Board/University" value="{{old('education[1][university]')}}" required></td>  
              <td><input type="text" class="form-control" name="education[1][year]" value="{{old('education[1][year]')}}" placeholder="Enter Passing Year" required></td>
              <td><input type="text" class="form-control" name="education[1][percentage]" placeholder="Enter CGPA/Percentage" value="{{old('education[1][percentage]')}}" required></td>    
            </tr>
     <!--        <tr>
              <td class="check1" align="center"><input type="checkbox" id="check" class="selected" name="prog_language[0][prog_language]" value="PHP" style="width: 40px !important;">PHP</td>
              <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[0][php]" value="Beginner" style="width: 40px !important;">Beginner</td>
              <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[0][php]" value="Mediator" style="width: 40px !important;">Mediator </td>
              <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[0][php]" value="Expert" style="width: 40px !important;">Expert </td>
            </tr>
             <tr>
              <td class="check1" align="center"><input type="checkbox" id="check" class="selected" name="prog_language[1][prog_language]" value="Mysql" style="width: 40px !important;">Mysql</td>
              <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[1][mysql]" value="Beginner" style="width: 40px !important;">Beginner</td>
              <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[1][mysql]" value="Mediator" style="width: 40px !important;">Mediator </td>
              <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[1][mysql]" value="Expert" style="width: 40px !important;">Expert </td>
            </tr> -->
        <!-- <tr>
              <td class="check1" align="center"><input type="checkbox" id="check" class="selected" name="language[0][language]" value="English" style="width: 40px !important;">English</td>
              <td class="check1" align="center"><input type="checkbox" id="language" class="language" name="language[0][read]" value="Read" style="width: 40px !important;">Read</td>
              <td class="check1" align="center"><input type="checkbox" id="language" class="language" name="language[0][write]" value="Write" style="width: 40px !important;">Write</td>
              <td class="check1" align="center"><input type="checkbox" id="language" class="language" name="language[0][speak]" value="Speak" style="width: 40px !important;">Speak</td>
            </tr> 
             <tr>
              <td class="check1" align="center"><input type="checkbox" id="check" class="selected" name="language[1][language]" value="Hindi" style="width: 40px !important;">Hindi</td>
              <td class="check1" align="center"><input type="checkbox" id="language" class="language" name="language[1][read]" value="Read" style="width: 40px !important;">Read</td>
              <td class="check1" align="center"><input type="checkbox" id="language" class="language" name="language[1]['write']" value="Write" style="width: 40px !important;">Write</td>
              <td class="check1" align="center"><input type="checkbox" id="language" class="language" name="language[1]['speak']" value="Speak" style="width: 40px !important;">Speak</td>
            </tr>  -->
           <!--  <tr>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <tr>  
                <td><input type="text" name="addmore[0][name]" placeholder="Enter your Name" class="form-control" /></td>  
                <td><input type="text" name="addmore[0][qty]" placeholder="Enter your Qty" class="form-control" /></td>  
                <td><input type="text" name="addmore[0][price]" placeholder="Enter your Price" class="form-control" /></td>  
                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
            </tr>   -->
        </table> 
    
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
   
<script type="text/javascript">
   
    var i = 0;
       
    $("#add").click(function(){
   
        ++i;
   
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addmore['+i+'][qty]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="addmore['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   

    $(document).on('click', '.remove-tr', function(){  
           $(this).parents('tr').remove();
      });  
   
      $(document).ready(function() {
      $('.language').attr('disabled', true);

      $('.selected').change(function() {
        //find only the language in the same row as the selected checkbox
        $(this).closest('tr').find('.language').attr('disabled', !this.checked);
      });
    });
</script>
  
</body>
</html>