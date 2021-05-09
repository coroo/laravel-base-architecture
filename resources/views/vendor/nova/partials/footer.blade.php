<p class="mt-8 text-center text-xs text-80">
    {{ env('APP_NAME'), 'Application Name' }}
    <span class="px-1">&middot;</span>
    &copy; {{ date('Y') }} - <a href="https://www.github.com/coroo" class="text-primary dim no-underline">By Kuncoro Wicaksono</a>.
    <span class="px-1">&middot;</span>
    v{{ \Laravel\Nova\Nova::version() }}
</p>
