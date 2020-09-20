<div class="shadow-sm vh-100 bg-dark sidebar sticky-top">
    <ul class="list-unstyled pt-4">
        <li class="px-3 py-2 text-center">
            <a href="{{ route('user.home') }}" class="p-2 rounded {{ active('user', 'dashboard') }}" title="All Post">
                <i class="icon ion-ios-home"></i>
            </a>
        </li>
        <li class="px-3 py-2 text-center">
            <a href="{{ route('user.post.index') }}" class="p-2 rounded {{ active('user', 'post') }}" title="All Post">
                <i class="icon ion-ios-list-box"></i>
            </a>
        </li>
        <li class="px-3 py-2 text-center">
            <a href="{{ route('user.category.index') }}" class="p-2 rounded {{ active('user', 'category') }}">
                <i class="icon ion-ios-albums" title="All Categories"></i>
            </a>
        </li>
        <li class="px-3 py-2 text-center">
            <a href="{{ route('user.comment.index') }}" class="p-2 rounded {{ active('user', 'comment') }}">
                <i class="icon ion-ios-chatboxes" title="All Comment"></i>
            </a>
        </li>
        <li class="px-3 py-2 text-center">
            <a href="{{ route('user.media.index') }}" class="p-2 rounded {{ active('user', 'media') }}">
                <i class="icon ion-ios-folder" title="All Media"></i>
            </a>
        </li>
        <li class="px-3 py-2 text-center">
            <a href="{{ route('user.profile.index') }}" class="p-2 rounded {{ active('user', 'profile') }}">
                <i class="icon ion-ios-contact" title="Profile"></i>
            </a>
        </li>
        <li class="px-3 py-2 text-center">
            <form action="{{ route('logout') }}" method="post" id="logout">
                @csrf
                <a href="" onclick="this.closest('form').submit(); return false" class="p-2 rounded">
                    <i class="icon ion-ios-log-out" title="Logout"></i>
                </a>
            </form>
        </li>
    </ul>
</div>