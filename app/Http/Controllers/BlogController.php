<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Mail\BlogPosted;
use App\Events\BlogCreated;
use App\Jobs\SendAdminEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
	public function index()
	{
		$blogs = Blog::paginate(5);
		return view('blog/index', ['blogs' => $blogs]);
	}

	public function show(Blog $blog)
	{
		return view('blog/show', ['blog' => $blog]);
	}

	public function create()
	{
		return view('blog.create');
	}

	public function store(Request $request, Blog $blog)
	{
    		// Validating input data
		$request->validate([
			'title' => 'required',
			'desc'  => 'required',
			'img'  	=> 'required|mimes:jpeg,jpg,png|max:250',
		]);

		// Custom filename
		$filename 	= md5_file($request->file('img')->getRealPath());
		$extension 	= $request->file('img')->guessExtension();
		$img			= $filename.'.'.$extension;

		// Upload file to storage folder
		$request->file('img')->storeAs('public/img', $img);

        	// Create new data
		// Blog::create($request->all());
		$blog->title 		= $request->title;
		$blog->desc 		= $request->desc;
		$blog->img 		= $img;
		$blog->save();

		// Send Email with Queue (Send email to admin)
		// Mail::to('admin@gmail.com')->queue(new BlogPosted($blog));

		// Send Email basic (Send email to admin)
		// Mail::to('admin@gmail.com')->send(new BlogPosted($blog));

		// Event Listener (Send email to user)
		event(new BlogCreated($blog));

		// Queue (Send email to admin)
		SendAdminEmail::dispatch($blog);

		return redirect('/blog');
	}

	public function edit(Blog $blog)
	{
		return view('blog/edit', ['blog' => $blog]);
	}

	public function update(Request $request, Blog $blog)
	{
		$blog->update($request->all());
		return redirect('/blog/'.$blog->id);
	}

	public function destroy(Blog $blog)
	{
		Blog::destroy($blog->id);
		return redirect('/blog');
	}
}
