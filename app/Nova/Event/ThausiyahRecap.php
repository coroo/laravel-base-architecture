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

class ThausiyahRecap extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Event\Event';

    public static $group = 'Event';
    
    public static function label() {
        return 'Rekap Absensi Thausiyah';
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
                ->defaultValue('thausiyah')->onlyOnForms()->onlyOnDetail(),
            ID::make()->sortable()->hideFromIndex()->onlyOnDetail(),
            Date::make('Tanggal', 'tanggal_acara')->sortable()->onlyOnDetail(),
            TimeField::make('Jam', 'jam_acara')->onlyOnDetail(),
            BelongsTo::make('Bulan Hijriyah', 'bulanHijriyah', 'App\Nova\Master\MasterHijriyah')->onlyOnDetail(),
            BelongsTo::make('Tahun Amaliyah', 'tahunAmaliyah', 'App\Nova\Master\MasterAmaliyah')->onlyOnDetail(),
            BelongsTo::make('Halaqah', 'halaqah', 'App\Nova\Master\MasterHalaqah')->searchable()->onlyOnDetail(),
            BelongsTo::make('Mudzakkir', 'mudzakkir', 'App\Nova\Master\MasterMudzakkir')->searchable()->onlyOnDetail(),
            Text::make('Lokasi', 'lokasi')->hideFromIndex()->onlyOnDetail(),
            AttachMany::make('Peserta Hadir', 'participant', User::class)
                ->showCounts()
                ->showPreview()
                ->height('500px')
                ->fullWidth(),
            BelongsToMany::make('Peserta ', 'participant', User::class)->readonly()->sortable(),
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
