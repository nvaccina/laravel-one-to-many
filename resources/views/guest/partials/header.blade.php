<header class="px-5 py-3 bg-secondary-subtle mb-4 border-bottom border-black">
    <ul class="nav nav-underline">
        <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName() === 'home' ? 'active' : ''}}" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName() === 'contacts' ? 'active' : ''}}" href="{{route('contacts')}}">Contacts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName() === 'news' ? 'active' : ''}}" href="{{route('news')}}">News</a>
        </li>
    </ul>
</header>
