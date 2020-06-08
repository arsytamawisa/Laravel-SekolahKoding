@extends('template')

<style>
	#button{
		text-decoration: none;
		color: black;
	}

	form{
		display:inline; 
	}
</style>


@section('content')

<img src="{{ asset('storage/img/' . $blog->img) }}" width="250">
<h2>{{ $blog->title }}</h2>

<button><a id="button" href="/blog/{{ $blog->id }}/edit">Edit</a></button>	
<form action="{{ $blog->id }}" method="post">@method('delete') @csrf
	<button type="submit">Delete</button>
</form>

<p>{{ $blog->desc }}</p>

@endsection