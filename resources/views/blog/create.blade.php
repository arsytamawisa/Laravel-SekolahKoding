@extends('template')

@section('content')

<style>
	#button{
		text-decoration: none;
		color: black;
	}
	button:first-child {
		margin-left: 10px;
	}
</style>

<h2>Create New Blog</h2>

<form action="/blog" method="post" enctype="multipart/form-data"> @csrf

	<input name="title" type="text" placeholder="Title" value="{{ old('title') }}">
	@error('title')
	<br>
	{{ $message }}
	@enderror
	<br><br>

	<input name="img" type="file">
	@error('img')
	<br>
	{{ $message }}
	@enderror
	<br><br>

	<textarea name="desc" rows="10" cols="50" placeholder="Description">{{ old('desc') }}</textarea>
	@error('desc')
	<br>
	{{ $message }}
	@enderror
	<br><br>

	<button type="submit">Create</button>
	<button><a id="button" href="/blog">Back</a></button>

</form>

@stop