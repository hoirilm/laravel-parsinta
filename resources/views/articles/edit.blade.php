@extends('layouts.master')

@section('title', 'Edit Article')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            {{-- short cut membuat class card dan isinya = .card>.card-header+.card-body --}}
            <div class="card">
                <div class="card-header">Edit Article: {{ $article->title }}</div>
                <div class="card-body">
                    <form action="{{ route('articles.edit', $article) }}" method="post">
                        @include('articles.partials.form', [
                            'submit' => 'Update',
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection