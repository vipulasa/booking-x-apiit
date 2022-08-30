<ul class="nav justify-content-center border-bottom pb-3 mb-3">
    <li class="nav-item">
        <a href="/" class="nav-link px-2 text-muted">Home</a>
    </li>
    @foreach ($pages as $page)
        <li class="nav-item">
            <a href="{{ route('page.show', $page->url) }}" class="nav-link px-2 text-muted">{{ $page->title }}</a>
        </li>
    @endforeach
</ul>
