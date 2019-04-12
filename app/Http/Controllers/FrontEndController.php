<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;

class FrontEndController extends Controller
{
	public function index()
	{
		return view('index')
		->with('title', Setting::first()->site_name)
		->with('categories', Category::take(5)->get())
		->with('first_post', Post::orderBy('created_at', 'desc')->first())
		->with('second_post', Post::OrderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
		->with('third_post', Post::OrderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
		->with('hacking', Category::find(1))
		->with('tutorials', Category::find(4))
		->with('designing', Category::find(3))
		->with('settings', Setting::first())
		;
	}

	public function singlePost($slug)
	{
		$post = Post::where('slug', $slug)->first();

		$next_id = Post::where('id', '>' , $post->id)->min('id');
		$prev_id = Post::where('id', '<' , $post->id)->max('id');

		return view('single')
		->with('post', $post)
		->with('title', $post->title)
		->with('settings', Setting::first())
		->with('categories', Category::take(5)->get())
		->with('next', Post::find($next_id))
		->with('prev', Post::find($prev_id))
		->with('tags', Tag::all())
		;
	}

	public function category($id)
	{

		$category = Category::find($id);

		return view('category')
		->with('category', $category)
		->with('title', $category->name)
		->with('settings', Setting::first())
		->with('categories', Category::take(5)->get())
		;		
	}

	public function tag($id)
	{
		$tag = Tag::find($id);
		return view('tag')
		->with('tag', $tag)
		->with('title', $tag->tag)
		->with('settings', Setting::first())
		->with('categories', Category::take(5)->get())
		;

	}

	public function results(Request $req){
	
	$posts = \App\Post::where('title','like', '%'. request('query') .'%')->get();
	return view('results')
	->with('posts', $posts)
	->with('title', 'Search results:' . request('query'))
	->with('settings', \App\Setting::first())
	->with('categories', \App\Category::take(5)->get())
	->with('query', request('query'))
	;

	}
}
