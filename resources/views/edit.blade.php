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
    <h2 class="">Edit User Information</h2>
    <form method="POST" action="{{url('update')}}">
      @csrf
      <div class="row jumbotron" style="background-color: white;">
        <div class="col-sm-12"><h3>Personal Information</h3><a href="{{url('dashboard')}}" class="btn btn-primary float-right" style="    margin-top: -43px;">Home</a><hr></div>
        <div class="col-sm-4 form-group">
          <label for="name-f">Name</label>
          <input type="text" class="form-control" name="name" value="{{$user_info->name}}"  >
        </div>
        <div class="col-sm-4 form-group">
          <label for="name-l">Mobile</label>
          <input type="text" id="edit1" size="10" maxlength="10" class="form-control" name="mobile" value="{{$user_info->mobile}}" >
        </div>
        <div class="col-sm-4 form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" value="{{$user_info->email}}" >
        </div>
        <div class="col-sm-4 form-group">
          <label for="address-1">Address</label>
          <input type="text" class="form-control" value="{{$user_info->address}}" name="address"  >
        </div>
         <div class="col-sm-4 form-group">
          <label for="address-1">Gender</label>
           <select name="gender" class="form-control browser-default custom-select" style="background-color: #f2f2f2;" required>
          @if($user_info->gender==1)
            <option value="1" selected>Male</option>
            <option value="2">Female</option>
            <option value="3">Other</option>
          @elseif($user_info->gender==2)
            <option value="1">Male</option>
            <option value="2" selected>Female</option>
            <option value="3">Other</option>
          @elseif($user_info->gender==3)
            <option value="1">Male</option>
            <option value="2">Female</option>
            <option value="3" selected>Other</option>
          @endif
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
            <?php $i=0; $edu_info = DB::table('education_details')->where('user_id',$user_info->id)->get(); ?>
            @foreach($edu_info as $edu)
            <tr>  
               
  <td><input type="text" class="form-control" name="education[{{$i}}][field]"  value="{{$edu->field}}" ></td>
              <td><input type="text" class="form-control" name="education[{{$i}}][university]"  value="{{$edu->university}}" ></td>  
              <td><input type="text" id="edit1" size="4" maxlength="4" class="form-control" name="education[{{$i}}][year]" value="{{$edu->year}}" ></td>
              <td><input type="text" class="form-control" name="education[{{$i}}][percentage]" value="{{$edu->percentage}}" ></td>  
              <input type="hidden" class="form-control" value="{{$edu->id}}" name="education[{{$i}}][id]"  > 
            </tr> 
             <?php $i++; ?> 
            @endforeach
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
           <?php $i1=0; $exp_info = DB::table('work_exp')->where('user_id',$user_info->id)->get(); ?>
            @foreach($exp_info as $exp)
          <tr>  
            <td><input type="text" class="form-control" value="{{$exp->company}}" name="addmore[{{$i1}}][company]"  class="form-control" ></td>  
            <td><input type="text" class="form-control" value="{{$exp->designation}}" name="addmore[{{$i1}}][designation]" class="form-control" ></td>  
            <td><input type="date" class="form-control" value="{{$exp->from_date}}" name="addmore[{{$i1}}][from]" /></td>
            <td><input type="date" class="form-control" value="{{$exp->to_date}}" name="addmore[{{$i1}}][to]"  /></td> 
            <input type="hidden" class="form-control" value="{{$exp->id}}" name="addmore[{{$i1}}][id]"  > 
          </tr>
          <?php $i1++; ?>
          @endforeach  
        </table> 


        <div class="col-sm-12"><h4>Known Languages</h4><hr></div>
        <div class="col-sm-12 form-group">
          <table class="table" id="myTable">
             <?php $i=0; $know_lang = DB::table('know_language')->where('user_id',$user_info->id)->get(); ?>
            @foreach($know_lang as $lang)
            <tr>
              <td class="check1" align="center"><input type="checkbox" id="check" class="selected" name="language[{{$i}}][language]" checked value="{{$lang->language}} " style="width: 40px !important;" >{{$lang->language}}</td>
              <td class="check1" align="center">
                @if($lang->read_lang == "Read")
                <input type="checkbox" id="language" class="language" name="language[{{$i}}][read]" value="Read" checked  style="width: 40px !important;">
               @else
               <input type="checkbox" id="language" class="language" name="language[{{$i}}][read]" value="Read"  style="width: 40px !important;">
               @endif
              Read</td>
              <td class="check1" align="center">
                @if($lang->write_lang == "Write")
                <input type="checkbox" id="language" class="language" name="language[{{$i}}][write]" value="Write" checked  style="width: 40px !important;">
              @else
                <input type="checkbox" id="language" class="language" name="language[{{$i}}][write]" value="Write"  style="width: 40px !important;">
              @endif
              Write</td>
              <td class="check1" align="center">
                 @if($lang->speak == "Speak")
                <input type="checkbox" id="language" class="language" name="language[{{$i}}][speak]" value="Speak" checked style="width: 40px !important;" >
                @else
                <input type="checkbox" id="language" class="language" name="language[{{$i}}][speak]" value="Speak"  style="width: 40px !important;" >
                @endif
              Speak</td>
              <input type="hidden" class="form-control" value="{{$lang->id}}" name="language[{{$i}}][id]"  >
            </tr>
            <?php $i++; ?>
            @endforeach
          
          </table>
        </div>

        <div class="col-sm-12"><h4>Technical Experience</h4><hr></div>
          <div class="col-sm-12 form-group">
             <table class="table" id="myTable">
               <?php $i=0; $technical_exp = DB::table('technical_exp')->where('user_id',$user_info->id)->get(); ?>
            @foreach($technical_exp as $tech)
              <tr>
                <td class="check1" align="center"><input type="checkbox" id="check" class="selected" name="prog_language[{{$i}}][prog_language]" checked value="{{$tech->prog_lang}}" style="width: 40px !important;">{{$tech->prog_lang}} </td>
                
                <td class="check1" align="center">
                 @if($tech->ability == "Beginner")
                  <input type="radio" id="language" class="language" name="prog_language[{{$i}}][{{$tech->prog_lang}}]" value="Beginner" checked style="width: 40px !important;">
                 @else
                  <input type="radio" id="language" class="language" name="prog_language[{{$i}}][{{$tech->prog_lang}}]" value="Beginner" style="width: 40px !important;">
                 @endif
                Beginner</td>
                <td class="check1" align="center">
                   @if($tech->ability == "Mediator")
                  <input type="radio" id="language" class="language" name="prog_language[{{$i}}][{{$tech->prog_lang}}]" value="Mediator" checked style="width: 40px !important;">
                  @else
                  <input type="radio" id="language" class="language" name="prog_language[{{$i}}][{{$tech->prog_lang}}]" value="Mediator" style="width: 40px !important;">
                  @endif
                Mediator </td>
                <td class="check1" align="center">
                @if($tech->ability == "Expert")
                  <input type="radio" id="language" class="language" name="prog_language[{{$i}}][{{$tech->prog_lang}}]" value="Expert" checked style="width: 40px !important;">
                @else
                  <input type="radio" id="language" class="language" name="prog_language[{{$i}}][{{$tech->prog_lang}}]" value="Expert" style="width: 40px !important;">
                @endif
                Expert </td>
                <input type="hidden" class="language" name="prog_language[{{$i}}][id]" value="{{$tech->id}}" >
              </tr>
              <?php $i++; ?>
            @endforeach
            </table>
          </div>
          <div class="col-sm-12"><h3>Preference</h3><hr></div>
            <div class="col-sm-4 form-group">
              <label >Preferred Location</label>
              <input type="text" class="form-control" name="pre_loc" value="{{$user_info->pre_loc}}" >
            </div>
            <div class="col-sm-4 form-group">
              <label >Current CTC</label>
              <input type="text" class="form-control" name="current_ctc" value="{{$user_info->current_ctc}}" >
            </div>
            <div class="col-sm-4 form-group">
              <label >Expected CTC</label>
              <input type="text" class="form-control" name="expected_ctc" value="{{$user_info->expected_ctc}}" >
            </div>
            <div class="col-sm-4 form-group">
              <label >Notice Period</label>
              <input type="text" class="form-control" value="{{$user_info->notice_period}}" name="notice_period"  >
            </div>
           <div class="col-sm-12 form-group mb-0">
            <input type="hidden" class="form-control" value="{{$user_info->id}}" name="id"  >
          <button name="submit" class="btn btn-primary float-right">Update</button>
        </div>
      </div>
    </form>    
  </div>
  <script src="{{asset('assets')}}/jquery.min.js" ></script>
  
 
</body>
</html>
