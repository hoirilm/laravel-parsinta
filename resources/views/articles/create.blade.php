@extends('layouts.master')

@section('title', 'Create new Article')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h4>Create New Article</h4>
        <hr>

        <form action="{{ route('articles.create') }}" method="post">
            @include('articles.partials.form', [
                // ditambahkan ini karena pada method create di controller tidak mengirim data $article. sedangkan untuk edit ada data
                // yang dikirim
                'article' => new App\Article, 
                'submit' => 'Create'
            ])
        </form>
    </div>
</div>

@endsection