@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="About {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="A little bit about {{ $page->siteName }}" />
@endpush

@section('body')
    <div>
        <h1>Is Skydiving dangerous?</h1>
        <p>blah blah blah </p>
        <p>blah blah blah</p>
        <iframe class="my-4 block" width="560" height="315" src="https://www.youtube.com/embed/PzoH8enWdZo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        <a href="https://app.managedmissions.com/MyTrip/woods" class="mt-4 text-3xl underline">Go here to give online &rarr;</a>

        <h2>blah blah blah</h2>
        <p>blah blah blah</p>

        <h2>blah blah blah</h2>

        <img src="/assets/img/peru-1.png" alt="How are we spending our time?" />

        <ul>
            <li>blah blah blah</li>
            <li>blah blah blah</li>
            <li>blah blah blah</li>
            <li>blah blah blah</li>
        </ul>

        <h2>blah blah blah</h2>
        <h3>1) blah blah blah</h3>
        <p>blah blah blah:</p>
        <ul>
          <li>blah blah blah</li>
          <li>blah blah blah</li>
          <li>blah blah blah</li>
        </ul>

        <h3>2) blah blah blah</h3>
        <p>blah blah blah</p>
        <p>blah blah blah <a href="mailto:mw@mattwoods?subject=Peru Trip">email us</a> blah blah blah</p>

        <a href="https://app.managedmissions.com/MyTrip/woods" class="mt-4 text-3xl underline">blah blah blah &rarr;</a>

        <h2>blah blah blah</h2>
        <p>blah blah blah.</p>

        <p>blah blah blah</p>

        <p>blah blah blah</p>

        <p>- Gavin Marsh</p>

        @include('_components.newsletter-signup')

@endsection
