<?php

namespace App\Nova\Event;

use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\User;
use Laraning\NovaTimeField\TimeField;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use NovaAttachMany\AttachMany;
use Outhebox\NovaHiddenField\HiddenField;

class NonThausiyah extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Event\Event';

    public static $group = 'Event';
    
    public static function label() {
        return 'Non Thausiyah';
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            HiddenField::make('event_category')
                ->defaultValue('nonthausiyah')->onlyOnForms(),
            ID::make()->sortable()->hideFromIndex(),
            Date::make('Tanggal', 'tanggal_acara')->sortable(),
            TimeField::make('Jam', 'jam_acara'),
            Text::make('Nama Kegiatan', 'nama_kegiatan'),
            BelongsTo::make('Bulan Hijriyah', 'bulanHijriyah', 'App\Nova\Master\MasterHijriyah'),
            BelongsTo::make('Tahun Amaliyah', 'tahunAmaliyah', 'App\Nova\Master\MasterAmaliyah'),
            Text::make('Ustadz', 'nama_ustadz'),
            Text::make('Lokasi', 'lokasi')->hideFromIndex(),
            AttachMany::make('Peserta ', 'participant', \App\Nova\User::class)
                ->showCounts()
                ->showPreview()
                ->height('500px')
                ->fullWidth(),
            BelongsToMany::make('Peserta ', 'participant', \App\Nova\User::class)->readonly()->sortable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
    
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('event_category','nonthausiyah');
    }
}
