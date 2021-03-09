<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="{{asset('assets')}}/bootstrap.min.css">
	    <title>Dashboard</title>
	</head>
	<body>
		<div class="container">
			<br>
			@include('alerts')
			<h2>Users List <a href="{{url('logout')}}" class="btn btn-sm btn-success" style="color: white;float: right;">Sign Out</a></h2>

			<hr>
			<div class="table-responsive" style="">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Address</th>
							<th>Designation</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(empty($users))
                          <tr>
                          	<td><?php echo "User Table Empty"; ?></td>
                          	
                          </tr>
						@else
						 <?php $i=1; ?>
						<!--  Foreach Loop For User Data Show -->
						@foreach($users as $user)
						<tr>
							<td><?php echo $i++; ?></td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->mobile}}</td>
							<td>{{$user->address}}</td>
							<td>
								@if($user->designation ==1)
                                <?php echo "Admin"; ?>
								@elseif($user->designation ==2)
								<?php echo "User"; ?>
								@endif
							</td>
							<td><?php echo Date("d-m-Y",strtotime($user->created_at)); ?></td>
							<td>
								<a href="{{url('edit')}}/{{$user->id}}" class="btn btn-sm btn-success" style="color: white;">Edit</a>
								<a href="{{url('delete')}}/{{$user->id}}" class="btn btn-sm btn-danger" style="color: white;">Delete</a>
							</td>
						</tr>
						@endforeach	
						@endif
					</tbody>
				</table>
			</div>
		</div>

    </body>
</html>