@props(['active' => false])

@php
    $classes = "block text-left leading-5 hover:bg-gray-300 focus:bg-gray-300";

    if($active) $classes = " text-left bg-blue-400 text-white ";
@endphp

<a {{$attributes(['class'=> $classes])}}>{{$slot}}</a>
