<nav class="hidden lg:flex items-center justify-end text-lg">
    <a title="{{ $page->siteName }} Articles" href="/blog"
        class="ml-6 text-grey-darker hover:text-blue-dark {{ $page->isActive('/blog') ? 'active text-blue-dark' : '' }}">
        Articles
    </a>

    <a title="{{ $page->siteName }} Picks" href="/picks"
        class="ml-6 text-grey-darker hover:text-blue-dark {{ $page->isActive('/picks') ? 'active text-blue-dark' : '' }}">
        Picks
    </a>

    <a title="{{ $page->siteName }} Notes" href="/notes"
        class="ml-6 text-grey-darker hover:text-blue-dark {{ $page->isActive('/notes') ? 'active text-blue-dark' : '' }}">
        Notes
    </a>

    <a title="{{ $page->siteName }} Picks" href="/projects"
        class="ml-6 text-grey-darker hover:text-blue-dark {{ $page->isActive('/projects') ? 'active text-blue-dark' : '' }}">
        Projects
    </a>

    <a title="{{ $page->siteName }} Contact" href="/contact"
        class="ml-6 text-grey-darker hover:text-blue-dark {{ $page->isActive('/contact') ? 'active text-blue-dark' : '' }}">
        Contact
    </a>
</nav>
