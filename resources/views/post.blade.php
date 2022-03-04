<x-layout>
    <article class="container mx-auto">
        <h1>{!!$post->title!!}</h1>
        <p>
            Topping: <a href="#">{{$post->topping->name}}</a>
        </p>
        <div>
            {!! $post->body; !!}
        </div>
    </article>
    <a href="/">Go Back</a>
</x-layout>

