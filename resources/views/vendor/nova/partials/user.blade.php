<dropdown-trigger class="h-9 flex items-center" slot-scope="{toggle}" :handle-click="toggle">
    @isset($user->username)
        <img src="{{ Auth::user()->getMedia('avatars')->last() ? Auth::user()->getMedia('avatars')->last()->getUrl() : 'img/avatar.png' }}"
            class="rounded-full w-8 h-8 mr-3"
        />
    @endisset

    <span class="text-90">
        {{ $user->nama_aslu ?? $user->username ?? __(env('APP_NAME').' User') }}
    </span>
</dropdown-trigger>

<dropdown-menu slot="menu" width="200" direction="rtl">
    <ul class="list-reset">
        <li>
            <a href="{{ route('nova.logout') }}" class="block no-underline text-90 hover:bg-30 p-3">
                {{ __('Logout') }}
            </a>
        </li>
    </ul>
</dropdown-menu>
