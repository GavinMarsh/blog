@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="About {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="A little bit about {{ $page->siteName }}" />
@endpush

@section('body')
    <div>
        ##Is Skydiving actually dangerous?

        </p>some text<p>


        <iframe class="my-4 block" width="560" height="315" src="https://www.youtube.com/embed/PzoH8enWdZo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </p>some text<p>


        <iframe class="my-4 block" width="560" height="315" src="https://youtu.be/nQvdpFguOvc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </p>some text<p>

        If you would like to know more on how to get involved then drop me an email <a href="mailto:gm@gavinmarsh.co.uk?subject=Skydiving Skydiving questions">email me</a>

    </div>
    @include('_components.newsletter-signup')

@endsection
