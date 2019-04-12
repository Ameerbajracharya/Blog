@extends('layouts.app')

@section('content')

@include('admin.includes.errors')


<div class="panel panel-default">
	<div class="panel-heading">
		Edit Your Profile
	</div>
	<div class="panel-body">
		<form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label for="name">User's Name</label>

				<input type="text" name="name" value="{{ $user->name }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">Email</label>

				<input type="email" name="email" value="{{ $user->email }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">New Password</label>

				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">Upload New Avatar</label>

				<input type="file" name="avatar" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">facebook Profile</label>
				<input type="te4" name="facebook" value="{{ @$user->profile->facebook }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">Youtube Profile</label>

				<input type="text" name="youtube" value="{{ @$user->profile->youtube }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="about">
					About You
					<textarea name="about" id="
					about" cols="6" rows="6" class="form-control">{{ @$user->profile->about }}</textarea>
				</label>
				
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">
						Submit
					</button>
				</div>	
			</div>
		</form>
	</div>
</div>

@endsection
