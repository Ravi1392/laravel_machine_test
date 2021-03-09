 @if ($errors->any())
    <br>
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check-circle"></i> {{ $error }}</h5>
        </li>
      @endforeach
    </ul>
  </div>
  @endif

  @if ($message = Session::get('success'))
   <br>
  <div class="alert alert-success alert-dismissible">  
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><i class="icon fa fa-check-circle"></i>{{ $message }}</p>
  </div>
  @endif


  @if ($message = Session::get('error'))
   <br>
   <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><i class="icon fa fa-times-circle"></i>{{ $message }}</p>            
  </div>
   @endif