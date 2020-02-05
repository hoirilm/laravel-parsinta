@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="row">
    @foreach ($articles as $article)
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <p><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></p>
                {{-- <P>{{ $article->created_at->format('d M Y') }}</P> --}}
                <div>{{ $article->created_at->diffForHumans() }}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<a href="{{ route('articles.index') }}" class="btn btn-danger">View More &raquo;</a>
@endsection