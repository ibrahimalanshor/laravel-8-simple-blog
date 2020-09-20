<div class="shadow-sm vh-100 bg-dark sidebar sticky-top">
    <ul class="list-unstyled pt-4">
        <li class="px-3 py-2 text-center">
            <a href="{{ route('admin.home') }}" class="p-2 rounded {{ active('admin', 'dashboard') }}" title="All Post">
                <i class="icon ion-ios-home"></i>
            </a>
        </li>
        <li class="px-3 py-2 text-center">
            <a href="{{ route('admin.post.index') }}" class="p-2 rounded {{ active('admin','post') }}" title="All Post">
                <i class="icon ion-ios-list-box"></i>
            </a>
        </li>
        <li class="px-3 py-2 text-center">
            <a href="{{ route('admin.category.index') }}" class="p-2 rounded {{ active('admin','category') }}">
                <i class="icon ion-ios-albums" title="All Categories"></i>
            </a>
        </li>
        <li class="px-3 py-2 text-center">
            <a href="{{ route('admin.comment.index') }}" class="p-2 rounded {{ active('admin','comment') }}">
                <i class="icon ion-ios-chatboxes" title="All Comment"></i>
            </a>
        </li>
        <li class="px-3 py-2 text-center">
            <a href="{{ route('admin.media.index') }}" class="p-2 rounded {{ active('admin','media') }}">
                <i class="icon ion-ios-folder" title="All Media"></i>
            </a>
        </li>
        <li class="px-3 py-2 text-center">
            <a href="{{ route('admin.setting.index') }}" class="p-2 rounded {{ active('admin','setting') }}">
                <i class="icon ion-ios-cog" title="All Media"></i>
            </a>
        </li>
        <li class="px-3 py-2 text-center">
            <a href="{{ route('admin.user.index') }}" class="p-2 rounded {{ active('admin', 'user') }}">
                <i class="icon ion-ios-contact" title="Profile"></i>
            </a>
        </li>
        <li class="px-3 py-2 text-center">
            <form action="{{ route('admin.logout') }}" method="post" id="logout">
                @csrf
                <a href="" onclick="this.closest('form').submit(); return false" class="p-2 rounded">
                    <i class="icon ion-ios-log-out" title="Logout"></i>
                </a>
            </form>
        </li>
    </ul>
</div>