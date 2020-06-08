@extends('template')

@section('title','Laravel | Blog')

@section('content')
<h2>This is blog page</h2>
<a href="/blog/create">Create New Blog</a>

@foreach($blogs as $blog)
<ul>
<li><a href="/blog/{{ $blog->id }}">{{ $blog->title }}</a></li>
</ul>
@endforeach

{{ $blogs->links() }}

@endsection