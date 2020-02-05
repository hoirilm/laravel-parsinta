@csrf
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
        value="{{ $article->title }}">
    {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
</div>

<div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror"
        rows="10">{{ $article->content }}</textarea>
    {!! $errors->first('content', '<span class="invalid-feedback">:message</span>') !!}
</div>

<button type="submit" class="btn btn-warning">{{ $submit }}</button>