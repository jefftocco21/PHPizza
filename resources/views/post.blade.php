@extends ('layout')

@section('content')
<article class="container mx-auto">
    <h1>{!!$post->title!!}</h1>

    <div>
        {!! $post->body; !!}
    </div>
</article>
<a href="/">Go Back</a>
@endsection
