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

<h2>Update Blog</h2>

<form action="/blog/{{ $blog->id }}" method="post"> @csrf @method('patch')

	<input name="title" type="text" value="{{ $blog->title }}">
	<br><br>

	<textarea name="desc" rows="10" cols="50">{{ $blog->desc }}</textarea>
	<br><br>

	<button type="submit">Update</button>
	<button><a id="button" href="/blog/{{ $blog->id }}">Back</a></button>

</form>

@stop