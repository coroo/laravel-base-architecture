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
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use NovaButton\Button;
use Outhebox\NovaHiddenField\HiddenField;

class Thausiyah extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Event\Event';

    public static $group = 'Event';
    
    public static function label() {
        return 'Thausiyah';
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
                ->defaultValue('thausiyah')->onlyOnForms(),
            ID::make()->sortable()->hideFromIndex(),
            Date::make('Tanggal', 'tanggal_acara')->sortable(),
            TimeField::make('Jam', 'jam_acara'),
            BelongsTo::make('Bulan Hijriyah', 'bulanHijriyah', 'App\Nova\Master\MasterHijriyah'),
            BelongsTo::make('Tahun Amaliyah', 'tahunAmaliyah', 'App\Nova\Master\MasterAmaliyah'),
            BelongsTo::make('Halaqah', 'halaqah', 'App\Nova\Master\MasterHalaqah')->searchable(),
            BelongsTo::make('Mudzakkir', 'mudzakkir', 'App\Nova\Master\MasterMudzakkir')->searchable(),
            Text::make('Lokasi', 'lokasi')->hideFromIndex(),
            Button::make('Absensi')->style('success')->edit('App\Nova\Event\ThausiyahRecap', $this->id),
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
        return $query->where('event_category','thausiyah');
    }
}
