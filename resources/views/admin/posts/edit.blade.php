@extends('layouts.app')

@section('content')
@include('admin.includes.errors')


<div class="panel panel-default">
	<div class="panel-heading">
		Edit post: {{ $post->title }}
	</div>
	<div class="panel-body">
		<form action="{{ route('post.update',['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label for="title">Title</label>

				<input type="text" name="title" class="form-control" value="{{ $post->title}}">
			</div>
			<div class="form-group">
				<label for="featured">Featured image</label>
				<input type="file" name="featured" class="form-control">
			</div>
			<div class="form-group">
				<label for="category">
					Select a Category
				</label>
				<select name="category_id" class="form-control" id="category">
					@foreach($categories as $category)
					<option value="{{ $category->id }}"
						@if($post->category->id == $category->id)
						selected
						@endif
						>{{ $category->name }}</option>
					@endforeach
				</select>

			</div>
			<div class="form-group">
				<label for="tags">Select Tags:</label>
				@foreach($tags as $tag)
				<div class="checkbox">
					<label>
						<input type="checkbox" name="tags[]" value="{{ $tag->id }}"
						@foreach($post->tags as $t)
						@if($tag->id == $t->id)
						checked
						@endif
						@endforeach
						>{{ $tag->tag }}
						
					</label>
				</div>
					
				</label>
				@endforeach
				
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<input type="content" name="content" id="content" cols="5" row="5" class="form-control" value="{{ $post->content }}">
				
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success">
						Update post
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection
