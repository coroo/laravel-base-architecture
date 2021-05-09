<?php

namespace App\Nova\Financial;

use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\User;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Outhebox\NovaHiddenField\HiddenField;

class FinancialInputShadaqah extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Financial\Financial';

    public static $group = 'Financial';
    
    public static function label() {
        return 'Pemasukan Dana Shadaqah';
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
            HiddenField::make('debit_kredit')
                ->defaultValue('debit')->onlyOnForms(),
            HiddenField::make('financial_input_type')
                ->defaultValue('shadaqah')->onlyOnForms(),
            ID::make()->sortable()->hideFromIndex(),
            Text::make('financial_input_type')
                ->displayUsing(function ($value) {
                    return ucwords(str_replace('-', ' ', $value));
                })
                ->hideWhenCreating()->hideWhenUpdating(),
            Select::make('tipe_alokasi_pendanaan', 'financial_tipe_alokasi_pendanaan')
                ->options(\App\Models\Financial\FinancialTypeAlocationInput::where('shadaqah_alokasi', 'shadaqah')->pluck('nama_finansial_alokasi_input', 'kode_finansial_alokasi_input'))
                ->displayUsing(function ($value) {
                    return ucwords(str_replace('-', ' ', $value));
                }),
            Select::make('financial_struktur', 'financial_struktur')
                ->options(\App\Models\Financial\FinancialStructure::pluck('nama_finansial_struktur', 'kode_finansial_struktur'))
                ->displayUsing(function ($value) {
                    return ucwords(str_replace('-', ' ', $value));
                }),
            Date::make('tanggal_finansial', 'tanggal_finansial')->sortable(),
            Select::make('bulan_finansial', 'bulan_finansial')->options([
                    'ramadhan'      =>	'Ramadhan',
                    'syawal'        =>	'Syawal',
                    'dzulqaidah'    =>	'Dzulqa\'idah',
                    'dzulhijjah'    =>	'Dzulhijjah',
                    'muharram'      =>	'Muharram',
                    'shafar'        =>	'Shafar',
                    'rabiul awal'   =>	'Rabi\'ul Awal',
                    'rabiul akhir'  =>	'Rabi\'ul Akhir',
                    'jumadil awal'  =>	'Jumadil Awal',
                    'jumadil akhir' =>	'Jumadil Akhir',
                    'rajab'         =>	'Rajab',
                    'syaban'        =>	'Sya\'ban'
                ])->displayUsing(function ($value) {
                    return ucwords(str_replace('-', ' ', $value));
                }),
            Select::make('tahun_finansial', 'tahun_finansial')->options([
                    '40/41' =>	'40/41',
                    '41/42' =>	'41/42',
                    '42/43' =>	'42/43',
                    '43/44' =>	'43/44',
                    '44/45' =>	'44/45',
                    '45/46' =>	'45/46',
                    '46/47' =>	'46/47',
                    '47/48' =>	'47/48',
                    '48/49' =>	'48/49',
                    '49/50' =>	'49/50',
                    '50/52' =>	'50/52',
                    '52/52' =>	'52/52'
                ])->displayUsing(function ($value) {
                    return ucwords(str_replace('-', ' ', $value));
                }),
            BelongsTo::make('User', 'user', 'App\Nova\User')->searchable(),
            Select::make('metode_finansial', 'metode_finansial')->options([
                    'transfer'  =>	'Transfer',
                    'cash'      =>	'Cash'
                ])->displayUsing(function ($value) {
                    return ucwords(str_replace('-', ' ', $value));
                }),
            Currency::make('nominal_finansial')->format('%.2n')->onlyOnForms(),
            Text::make('nominal_finansial', 'nominal_finansial', function () {
                return !is_null($this->nominal_finansial) ? number_format($this->nominal_finansial, 2) : 0;
            })->hideWhenCreating()->hideWhenUpdating()->textAlign('right'),
            Textarea::make('catatan')->hideFromIndex(),
            Select::make('status_finansial', 'status_finansial')->options([
                    'pending'   =>	'Belum Terverifikasi',
                    'verified'  =>	'Telah Terverifikasi',
                    'reject'    =>	'Verifikasi Gagal'
                ])->displayUsing(function ($value) {
                    return ucwords(str_replace('-', ' ', $value));
                })->hideFromIndex(),
            BelongsTo::make('Approval', 'approval', \App\Nova\User::class)
                ->withMeta(['name' => 'approval'])
                ->hideWhenCreating()->hideWhenUpdating()
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
        return $query->where('debit_kredit','debit')
            ->where('financial_input_type', 'shadaqah');
    }
}
