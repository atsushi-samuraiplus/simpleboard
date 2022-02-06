@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

<h1>Editing Post</h1>

<!--@if ($errors->any())
    <div class="alert alert-dangar">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif-->

<form method="POST" action="/posts/{{ $post->id }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <br>
        @if ($errors->has('title'))
            @foreach ($errors->get('title') as $message)
                {{ $message }}<br>
            @endforeach
        @endif
        
        <input type="text" class="form-control" aria-describedby="emailHelp" name="title" value="{{ old('title') == '' ? $post->title : old('title') }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Content</label>
        <br>
        @if ($errors->has('content'))
            @foreach ($errors->get('content') as $message)
                {{ $message }}<br>
            @endforeach
        @endif
        
        <textarea class="form-control" name="content">{{ old('content') == '' ? $post->content : old('content') }}</textarea>
    </div>
    <button type="submit" class="btn btn-outline-primary">Submit</button>
</form>

<a href="/posts/{{ $post->id }}">Show</a>
<a href="/posts">Back</a>

@endsection