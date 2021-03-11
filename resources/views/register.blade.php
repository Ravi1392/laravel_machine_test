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
    @media (min-width: 576px){
    .jumbotron {
        padding: 1rem 1rem;
    }
    }
    .table td {
       /* padding: .75rem;*/
       padding: 0.1rem 0.75rem 0.25rem 0.75rem;
        vertical-align: top;
        border-top: 0px solid #dee2e6;
    }
    .table th {
       /* padding: .75rem;*/
       padding: 0.1rem 0.75rem 0.25rem 0.75rem;
        vertical-align: top;
        border-top: 0px solid #dee2e6;
    }
     .check1{

        display: inline-block;
    }
  </style>
</head>
<body style="background-color:#76b852;">
  <div class="container">
    @include('alerts')
    <h2 class="">Registration Form</h2>
    <form method="POST" action="{{url('regiter')}}">
      @csrf
      <div class="row jumbotron" style="background-color: white;">
        <div class="col-sm-12"><h3>Personal Information</h3><hr></div>
        <div class="col-sm-4 form-group">
          <label for="name-f">Name</label>
          <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter your Name" required>
        </div>
        <div class="col-sm-4 form-group">
          <label for="name-l">Mobile</label>
          <input type="text" id="edit1" size="10" maxlength="10" class="form-control" name="mobile" value="{{old('mobile')}}" placeholder="Enter your Mobile No" required>
        </div>
        <div class="col-sm-4 form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email" value="{{old('email')}}" required>
        </div>
        <div class="col-sm-4 form-group">
          <label for="address-1">Address</label>
          <input type="text" class="form-control" value="{{old('address')}}" name="address"  placeholder="Enter your Address" required>
        </div>

        <div class="col-sm-4 form-group">
          <label for="sex">Gender</label>
          <select name="gender" class="form-control browser-default custom-select" style="background-color: #f2f2f2;" required>
            <option value="">Select Gender</option>
            <option value="1">Male</option>
            <option value="2">Female</option>
            <option value="3">Other</option>
          </select>
        </div>
        <div class="col-sm-12"><h4>Education details</h4><hr></div>

          <table class="table" id="dynamicTable1">  
            <tr>
              <th style="font-weight: 400;">Select Field</th>
              <th style="font-weight: 400;">Board/University</th>
              <th style="font-weight: 400;">Year </th>
              <th style="font-weight: 400;">CGPA/Percentage </th>
              <th></th>
            </tr>
            <tr>  
              <td><select name="education[0][field]" class="form-control" style="height: 71% !important;background-color: #f2f2f2;" required>
                <option value="">Select Field</option>
                <option value="SSC">SSC</option>
                <option value="HSC">HSC</option>
                <option value="Graduation">Graduation</option>
                <option value="Master_Degree">Master Degree</option>
              </select></td>  
              <td><input type="text" class="form-control" name="education[0][university]" placeholder="Enter Board/University" value="{{old('education[0][university]')}}" required></td>  
              <td><input type="text" id="edit1" size="4" maxlength="4" class="form-control" name="education[0][year]" value="{{old('education[0][year]')}}" placeholder="Enter Passing Year" required></td>
              <td><input type="text" class="form-control" name="education[0][percentage]" value="{{old('education[0][percentage]')}}" placeholder="Enter CGPA/Percentage" required></td>  
              <td><button type="button" name="add" id="add1" class="btn btn-success">Add More</button></td>  
            </tr>  
            
          </table>

        <div class="col-sm-12"><h4>Work Experience</h4><hr></div>
        <table class="table" id="dynamicTable">  
          <tr>
            <th style="font-weight: 400;">Company Name</th>
            <th style="font-weight: 400;">Designation</th>
            <th style="font-weight: 400;">From </th>
            <th style="font-weight: 400;">To </th>
            <th></th>
          </tr>
          <tr>  
            <td><input type="text" class="form-control" name="addmore[0][company]" placeholder="Enter Company Name" class="form-control" /></td>  
            <td><input type="text" class="form-control" name="addmore[0][designation]" placeholder="Enter Designation" class="form-control" /></td>  
            <td><input type="date" class="form-control" name="addmore[0][from]" placeholder="Enter your Price"  /></td>
            <td><input type="date" class="form-control" name="addmore[0][to]" placeholder="Enter your Price"  /></td>  
            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
          </tr>  
        </table> 


        <div class="col-sm-12"><h4>Known Languages</h4><hr></div>
        <div class="col-sm-12 form-group">
          <table class="table" id="myTable">
            <tr>
              <td class="check1" align="center"><input type="checkbox" id="check" class="selected" name="language[0][language]" value="English" style="width: 40px !important;">English</td>
              <td class="check1" align="center"><input type="checkbox" id="language" class="language" name="language[0][read]" value="Read" style="width: 40px !important;">Read</td>
              <td class="check1" align="center"><input type="checkbox" id="language" class="language" name="language[0][write]" value="Write" style="width: 40px !important;">Write</td>
              <td class="check1" align="center"><input type="checkbox" id="language" class="language" name="language[0][speak]" value="Speak" style="width: 40px !important;">Speak</td>
            </tr>
            <tr>
              <td class="check1" align="center"><input type="checkbox" id="check" class="selected" name="language[1][language]" value="Hindi" style="width: 40px !important;">Hindi</td>
              <td class="check1" align="center"><input type="checkbox" id="language" class="language" name="language[1][read]" value="Read" style="width: 40px !important;">Read</td>
              <td class="check1" align="center"><input type="checkbox" id="language" class="language" name="language[1][write]" value="Write" style="width: 40px !important;">Write</td>
              <td class="check1" align="center"><input type="checkbox" id="language" class="language" name="language[1][speak]" value="Speak" style="width: 40px !important;">Speak</td>
            </tr>
            <tr>
              <td class="check1" align="center"><input type="checkbox" id="check" class="selected" name="language[2][language]" value="Marathi" style="width: 40px !important;">Marathi</td>
              <td class="check1" align="center"><input type="checkbox" id="language" class="language" name="language[2][read]" value="Read" style="width: 40px !important;">Read</td>
              <td class="check1" align="center"><input type="checkbox" id="language" class="language" name="language[2][write]" value="Write" style="width: 40px !important;">Write</td>
              <td class="check1" align="center"><input type="checkbox" id="language" class="language" name="language[2][speak]" value="Speak" style="width: 40px !important;">Speak</td>
            </tr>
          </table>
        </div>

        <div class="col-sm-12"><h4>Technical Experience</h4><hr></div>
          <div class="col-sm-12 form-group">
            <table class="table" id="myTable">
              <tr>
                <td class="check1" align="center"><input type="checkbox" id="check" class="selected" name="prog_language[0][prog_language]" value="PHP" style="width: 40px !important;">PHP</td>
                <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[0][php]" value="Beginner" style="width: 40px !important;">Beginner</td>
                <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[0][php]" value="Mediator" style="width: 40px !important;">Mediator </td>
                <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[0][php]" value="Expert" style="width: 40px !important;">Expert </td>
              </tr>
              <tr>
                <td class="check1" align="center"><input type="checkbox" id="check" class="selected" name="prog_language[1][prog_language]" value="Mysql" style="width: 40px !important;">Mysql</td>
                <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[1][php]" value="Beginner" style="width: 40px !important;">Beginner</td>
                <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[1][php]" value="Mediator" style="width: 40px !important;">Mediator </td>
                <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[1][php]" value="Expert" style="width: 40px !important;">Expert </td>
              </tr>
              <tr>
                <td class="check1" align="center"><input type="checkbox" id="check" class="selected" name="prog_language[2][prog_language]" value="Laravel" style="width: 40px !important;">Laravel</td>
                <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[2][php]" value="Beginner" style="width: 40px !important;">Beginner</td>
                <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[2][php]" value="Mediator" style="width: 40px !important;">Mediator </td>
                <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[2][php]" value="Expert" style="width: 40px !important;">Expert </td>
              </tr>
              <tr>
                <td class="check1" align="center"><input type="checkbox" id="check" class="selected" name="prog_language[3][prog_language]" value="Codeigniter" style="width: 40px !important;">Codeigniter</td>
                <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[3][php]" value="Beginner" style="width: 40px !important;">Beginner</td>
                <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[3][php]" value="Mediator" style="width: 40px !important;">Mediator </td>
                <td class="check1" align="center"><input type="radio" id="language" class="language" name="prog_language[3][php]" value="Expert" style="width: 40px !important;">Expert </td>
               
              </tr>
            </table>
          </div>
          <div class="col-sm-12"><h3>Preference</h3><hr></div>
            <div class="col-sm-4 form-group">
              <label for="sex">Preferred Location</label>
              <select name="pre_loc" class="form-control browser-default custom-select" style="background-color: #f2f2f2;" required>
                <option value="">Select Location</option>
                <option value="Dhule">Dhule</option>
                <option value="Nasik">Nasik</option>
                <option value="Pune">Pune</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Surat">Surat</option>
              </select>
            </div>
            <div class="col-sm-4 form-group">
              <label for="name-l">Current CTC</label>
              <input type="text" class="form-control" name="current_ctc" value="{{old('current_ctc')}}" placeholder="Enter your Current CTC" required>
            </div>
            <div class="col-sm-4 form-group">
              <label for="email">Expected CTC</label>
              <input type="text" class="form-control" name="expected_ctc" placeholder="Enter your Expected CTC" value="{{old('expected_ctc')}}" required>
            </div>
            <div class="col-sm-4 form-group">
              <label for="address-1">Notice Period</label>
              <input type="text" class="form-control" value="{{old('notice_period')}}" name="notice_period"  placeholder="Enter Your Notice Period" required>
            </div>

         

        <!--  <div class="col-sm-6 form-group">
            <label for="pass">Password</label>
            <input type="Password" name="password" class="form-control" placeholder="Enter your Password" required>
        </div> -->
        <!--  <div class="col-sm-6 form-group">
            <label for="pass2">Confirm Password</label>
            <input type="Password" name="cpassword" class="form-control" placeholder="Re-enter your Password" required>
        </div> -->
        <div class="col-sm-12 form-group mb-0">
          <button name="submit" class="btn btn-primary float-right">Submit</button>
        </div>
      </div>
    </form>    
  </div>
  <script src="{{asset('assets')}}/jquery.min.js" ></script>
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
  <script type="text/javascript">
   //for multiple Experiment
    var i = 0;
       
    $("#add").click(function(){
   
        ++i;
  
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][company]" placeholder="Enter Company Name" class="form-control" /></td><td><input type="text" name="addmore['+i+'][designation]" placeholder="Enter Designation" class="form-control" /></td><td><input type="date" name="addmore['+i+'][from]" class="form-control" /></td><td><input type="date" name="addmore['+i+'][to]"  class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
   
      $(document).on('click', '.remove-tr', function(){  
           $(this).parents('tr').remove();
      });

      //for multiple Education
    var i1 = 0;
    // var v1;  
    $("#add1").click(function(){
      ++i1;
     
        $("#dynamicTable1").append('<tr><td><select name="education['+i1+'][field]" class="form-control" style="height: 71% !important;background-color: #f2f2f2;" required><option value="">Select Field</option><option value="SSC">SSC</option><option value="HSC">HSC</option><option value="Graduation">Graduation</option><option value="Master_Degree">Master Degree</option></select></td><td><input type="text" class="form-control" name="education['+i1+'][university]" placeholder="Enter Board/University" required></td><td><input type="text" id="edit1" size="4" maxlength="4" class="form-control" name="education['+i1+'][year]" placeholder="Enter Passing Year" required></td><td><input type="text" class="form-control" name="education['+i1+'][percentage]" placeholder="Enter CGPA/Percentage" required></td><td><button type="button" class="btn btn-danger remove1-tr">Remove</button></td></tr>');
      
    });
      
      $(document).on('click', '.remove1-tr', function(){  
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
