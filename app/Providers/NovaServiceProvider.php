<?php

namespace App\Providers;

use App\Models\Event\Event;
use Coroowicaksono\NovaFullCalendar\FullCalendar;
use DigitalCreative\CollapsibleResourceManager\CollapsibleResourceManager;
use DigitalCreative\CollapsibleResourceManager\Resources\Group;
use DigitalCreative\CollapsibleResourceManager\Resources\TopLevelResource;
use Laravel\Nova\Nova;
use Coroowicaksono\NovaCarousel\Slider;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;
use Silvanite\NovaToolPermissions\NovaToolPermissions;
// use Coroowicaksono\ChartJsIntegration\BarChart;
use Illuminate\Support\Facades\DB;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, explode(',', env('NOVA_WHITELIST_NAS')));

            return $user->hasAnyRole(['reg-admin', 'system-admin', 'reg-head']);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        $events = Event::join('master_halaqahs', 'events.kode_halaqah', '=', 'master_halaqahs.kode_halaqah')
            ->select(DB::raw('events.id, CASE WHEN event_category="thausiyah" THEN CONCAT(nama_halaqah, " (",events.kode_halaqah,")") ELSE nama_kegiatan END as title, concat(tanggal_acara, " ", jam_acara) as date, concat(tanggal_acara, " ", jam_acara) as start, tanggal_acara as end'))
            ->get()
            ->toJson();

        return [
            (new Slider())
                ->card(array([
                    'h2'  => '<br/>Hi, '.\Auth::user()->nama_aslu,
                    'p' => 'Welcome to Administration Panel',
                ]))
                ->options([
                    'theme' => 'bg-4' // add some configuration here
                ])
                ->width('1/3'),
            (new FullCalendar())
                // ->resource(\App\Nova\Event\Thausiyah::class)
                ->series($events)
                ->options([
                    'headerToolbar' => [
                        'left' => 'prev,next today myCustomButton',
                        'center' => 'title',
                        'right' => 'dayGridMonth,timeGridWeek,timeGridDay'
                    ]
                ])
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            // new \Czemu\NovaCalendarTool\NovaCalendarTool,
            // ...
            new CollapsibleResourceManager([
                'navigation' => [
                    TopLevelResource::make([
                        'label' => 'Mobilitas Ummat',
                        'icon' => '<?xml version="1.0"?> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve" width="20px" height="20px"><g><script xmlns="" class="active-path" style=""/><script xmlns="" class="active-path"/><g> <g> <path d="M438.09,273.32h-39.596c4.036,11.05,6.241,22.975,6.241,35.404v149.65c0,5.182-0.902,10.156-2.543,14.782h65.461    c24.453,0,44.346-19.894,44.346-44.346v-81.581C512,306.476,478.844,273.32,438.09,273.32z" data-original="#000000" class="active-path" fill="var(--sidebar-icon)"/> </g> </g><g> <g> <path d="M107.265,308.725c0-12.43,2.205-24.354,6.241-35.404H73.91c-40.754,0-73.91,33.156-73.91,73.91v81.581    c0,24.452,19.893,44.346,44.346,44.346h65.462c-1.641-4.628-2.543-9.601-2.543-14.783V308.725z" data-original="#000000" class="active-path" fill="var(--sidebar-icon)"/> </g> </g><g> <g> <path d="M301.261,234.815h-90.522c-40.754,0-73.91,33.156-73.91,73.91v149.65c0,8.163,6.618,14.782,14.782,14.782h208.778    c8.164,0,14.782-6.618,14.782-14.782v-149.65C375.171,267.971,342.015,234.815,301.261,234.815z" data-original="#000000" class="active-path" fill="var(--sidebar-icon)"/> </g> </g><g> <g> <path d="M256,38.84c-49.012,0-88.886,39.874-88.886,88.887c0,33.245,18.349,62.28,45.447,77.524    c12.853,7.23,27.671,11.362,43.439,11.362c15.768,0,30.586-4.132,43.439-11.362c27.099-15.244,45.447-44.28,45.447-77.524    C344.886,78.715,305.012,38.84,256,38.84z" data-original="#000000" class="active-path" fill="var(--sidebar-icon)"/> </g> </g><g> <g> <path d="M99.918,121.689c-36.655,0-66.475,29.82-66.475,66.475c0,36.655,29.82,66.475,66.475,66.475    c9.298,0,18.152-1.926,26.195-5.388c13.906-5.987,25.372-16.585,32.467-29.86c4.98-9.317,7.813-19.946,7.813-31.227    C166.393,151.51,136.573,121.689,99.918,121.689z" data-original="#000000" class="active-path" fill="var(--sidebar-icon)"/> </g> </g><g> <g> <path d="M412.082,121.689c-36.655,0-66.475,29.82-66.475,66.475c0,11.282,2.833,21.911,7.813,31.227    c7.095,13.276,18.561,23.874,32.467,29.86c8.043,3.462,16.897,5.388,26.195,5.388c36.655,0,66.475-29.82,66.475-66.475    C478.557,151.509,448.737,121.689,412.082,121.689z" data-original="#000000" class="active-path" fill="var(--sidebar-icon)"/> </g> </g></g> </svg>',
                        'resources' => [
                            \App\Nova\User::class,
                            \App\Nova\LogNewUserUploader::class
                        ]
                    ]),
                    TopLevelResource::make([
                        'label' => 'Manajemen Keuangan',
                        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 400.9 400.9" style="enable-background:new 0 0 400.9 400.9;" xml:space="preserve"><g><script xmlns="" class="active-path"/><script xmlns="" class="active-path"/><g> <path d="M124.25,168.9c-3.7,3.1-8,4.3-14.1,4.9v-33c7.3,2.4,12.2,4.9,15.3,7.3c2.4,2.4,4.3,6.1,4.3,10.4   C129.151,162.8,127.351,166.4,124.25,168.9z M97.951,82.6c-5.5,0.6-9.8,2.4-12.9,4.9c-3.1,3.1-4.9,6.7-4.9,10.4   c0,4.3,1.2,7.3,3.7,9.8c2.4,2.4,7.3,4.9,14.1,7.3V82.6L97.951,82.6z M385.55,152.4v203.2c0,25.1-20.199,45.301-45.299,45.301   h-279.6c-25.1,0-45.3-20.201-45.3-45.301V45.3c0-25.1,20.2-45.3,45.3-45.3h175c17.699,0,26.299,4.9,37.299,16.5l95.5,96.7   C381.251,125.4,385.55,133.4,385.55,152.4z M184.25,107.1h67.299c8,0,14.102-6.1,14.102-13.5V83.2c0-7.3-6.102-13.5-14.102-13.5   H184.25V107.1z M97.951,137.7v36.1c-11-1.8-21.4-6.7-31.8-15.9l-13.5,15.9c13.5,11.6,28.8,18.4,45.3,20.2v13.4h11.6v-13.5   c12.9-0.6,22.6-4.3,30.6-11c7.3-6.7,11.6-15.9,11.6-26.3c0-11-3.1-19-9.8-24.5s-17.1-10.4-31.2-13.5h-0.6V83.7   c9.8,1.2,18.4,5.5,26.3,11l12.2-17.1c-12.2-8-25.1-12.9-38.6-13.5V53.7h-11.6v9.2c-11.6,0.6-21.4,4.3-28.8,11   c-7.3,6.7-11.6,15.9-11.6,26.3c0,10.4,3.7,18.4,9.8,24.5C74.051,129.7,83.851,134.6,97.951,137.7z M349.45,336   c0-7.301-6.1-13.5-14.1-13.5H64.25c-8,0-13.5,6.1-13.5,13.5v10.4c0,7.299,6.1,13.5,13.5,13.5h271.1c7.301,0,14.1-6.1,14.1-13.5V336   L349.45,336z M349.45,251.5c0-7.301-6.1-13.5-14.1-13.5H64.25c-8,0-13.5,6.1-13.5,13.5v10.4c0,7.299,6.1,13.5,13.5,13.5h271.1   c7.301,0,14.1-6.1,14.1-13.5V251.5L349.45,251.5z M349.45,167c0-7.3-6.1-13.5-14.1-13.5h-151.1v37.3h151.2   c7.301,0,14.1-6.1,14.1-13.5V167H349.45z" data-original="#000000" class="active-path" fill="var(--sidebar-icon)"/> </g></g> </svg>',
                        'resources' => [
                            // \App\Nova\Financial\FinancialInput::class,
                            // \App\Nova\LogNewUserUploader::class,
                            Group::make([
                                'label' => 'Pemasukan',
                                'expanded' => false,
                                'resources' => [
                                    \App\Nova\Financial\FinancialInputAlocation::class,
                                    \App\Nova\Financial\FinancialInputShadaqah::class
                                ]
                            ]),
                            Group::make([
                                'label' => 'Pengeluaran',
                                'expanded' => false,
                                'resources' => [
                                    \App\Nova\Financial\FinancialOutputAlocation::class
                                ]
                            ]),
                        ]
                    ]),
                    TopLevelResource::make([
                        'label' => 'Manajemen Kegiatan',
                        'icon' => '<svg id="Capa_1" enable-background="new 0 0 20 20"width="20px" height="20px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="var(--sidebar-icon)"><g><path d="m512 169c0-33.41 0-56.783 0-59 0-24.813-20.187-45-45-45h-6v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-36c-24.813 0-45 20.187-45 45v59z"/><path d="m0 199v243c0 24.813 20.187 45 45 45h422c24.813 0 45-20.187 45-45 0-6.425 0-146.812 0-243-9.335 0-506.836 0-512 0zm144 208h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15z"/></g></svg>',
                        'resources' => [
                            // \App\Nova\Financial\FinancialInput::class,
                            // \App\Nova\LogNewUserUploader::class,
                            Group::make([
                                'label' => 'Kegiatan',
                                'expanded' => false,
                                'resources' => [
                                    \App\Nova\Event\Thausiyah::class,
                                    \App\Nova\Event\NonThausiyah::class,
                                ]
                            ]),
                            Group::make([
                                'label' => 'Master',
                                'expanded' => false,
                                'resources' => [
                                    \App\Nova\Master\MasterHalaqah::class,
                                    \App\Nova\Master\MasterMudzakkir::class
                                ]
                            ]),
                        ]
                    ]),
                    TopLevelResource::make([
                        'label' => 'Pengaturan',
                        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 512.013 512.013" height="20px" viewBox="0 0 512.013 512.013" width="20px"><g><script xmlns="" class="active-path"/><script xmlns="" class="active-path"/><g><path d="m369.871 280.394-34.14 34.141-.001-.001-235.826-235.827 18.124-18.124-75.151-60.569-42.877 42.877 60.569 75.15 18.125-18.124 235.827 235.827-34.141 34.141 48.69 48.689 89.49-89.49z" data-original="#000000" class="active-path" fill="var(--sidebar-icon)"/><path d="m439.773 350.297-89.49 89.49 53.692 53.692c11.952 11.952 27.843 18.534 44.746 18.534 16.902 0 32.793-6.582 44.745-18.534 24.672-24.673 24.672-64.817 0-89.49z" data-original="#000000" class="active-path" fill="var(--sidebar-icon)"/></g><path d="m259.136 322.785-69.9-69.9-51.176 51.169c-37.59-11.78-78.61-1.94-106.9 26.36-20.09 20.09-31.16 46.799-31.16 75.22 0 28.41 11.07 55.13 31.16 75.22 20.74 20.74 47.98 31.11 75.22 31.11s54.49-10.37 75.22-31.11c28.3-28.29 38.14-69.31 26.36-106.9zm-128.406 107.188c-13.45 13.45-35.25 13.45-48.69 0-13.45-13.44-13.45-35.24 0-48.69 13.44-13.44 35.24-13.44 48.69 0 13.44 13.45 13.44 35.251 0 48.69z" data-original="#000000" class="active-path" fill="var(--sidebar-icon)"/><g><path d="m505.04 64.163-8.36-21.35-53.67 53.67-21.67-5.81-5.81-21.67 53.67-53.66-21.35-8.37c-37.43-14.66-79.97-5.78-108.38 22.63-26.02 26.02-35.66 63.91-25.82 98.86l-60.777 60.784 69.9 69.9 60.777-60.784c9.02 2.54 18.22 3.78 27.37 3.78 26.33-.01 52.18-10.29 71.49-29.6 28.41-28.409 37.29-70.949 22.63-108.38z" data-original="#000000" class="active-path" fill="var(--sidebar-icon)"/></g></g> </svg>',
                        // fill="var(--sidebar-icon)"
                        'resources' => [
                            Group::make([
                                'label' => 'Data Master',
                                'expanded' => false,
                                'resources' => [
                                    \App\Nova\Master\MasterSyubah::class,
                                    \App\Nova\Master\MasterFarah::class,
                                    \App\Nova\Master\MasterBank::class,
                                    \App\Nova\Master\MasterHijriyah::class,
                                    \App\Nova\Master\MasterAmaliyah::class
                                ]
                            ]),
                        ]
                    ]),
                ]
            ]),
            new NovaToolPermissions()
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
