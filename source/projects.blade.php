@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="Projects {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="Software and Marketing projects I've worked on recently." />
@endpush

@section('body')
    <div>
        <h1>Projects</h1>
        <p>A few recent projects I've worked on and learned from recently.</p>

        <div class="my-8">
          <h2 class="mb-2">reddit-top-posts</h2>
          <a
          href="http://gavinmarsh.co.uk:8000"
          class="inline-block bg-grey-light hover:bg-blue-lighter leading-loose tracking-wide text-grey-darkest uppercase text-xs font-semibold rounded mr-4 my-2 px-3 pt-px"
          >
          App
          </a>
          <p>
              A Flask web-app that uses Reddits api to collect top weekly posts of my faverioute topics.
              The application uses a MVC setup. The model being a MongoDB Atlas collection for data storage,
              the view is handled but the Jinja2 library with Flask and the Controller is pure python code.
          </p>
        </div>

        <div class="my-8">
          <h2 class="mb-2">rex</h2>
            <a
            href="http://gavinmarsh.co.uk:9000/"
            class="inline-block bg-grey-light hover:bg-blue-lighter leading-loose tracking-wide text-grey-darkest uppercase text-xs font-semibold rounded mr-4 my-2 px-3 pt-px"
            >
            Repo/App
            </a>
          <p>
              This is web-app to aid in enterprise-sales. The application is called
              The Referral Exchange (rex for short). It is a platform for sales
              professionals to share meeting referals.
          </p>
        </div>
        <p class="text-3xl">
            <a
            href="/contact"
            class="ml-6 text-blue-dark hover:text-blue-darker {{ $page->isActive('/contact') ? 'active text-blue-dark' : '' }}">
            &#8594; Need help on a project?
            </a>
        </p>
    </div>
@endsection
