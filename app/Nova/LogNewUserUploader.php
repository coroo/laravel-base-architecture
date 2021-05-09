<?php

namespace App\Nova;

use DateTime;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Silvanite\NovaToolPermissions\Nova\AccessControl;

class LogNewUserUploader extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Account\LogNewUserUploader';

    public static $group = 'Account';
    
    public static function label() {
        return 'Unggah Ummat Baru';
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
            AccessControl::make(),
            ID::make()->sortable(),
            File::make('Upload File', 'uploaded_file')
                ->disk('public')
                ->path('log-new-user-uploader'),
            Heading::make('You can download template <a href="'.env('APP_URL').'/template/ummat-baru-template.xlsx" style="text-decoration:none;font-weight:bold">here</a>.')->onlyOnForms()->asHtml(),
            Text::make('Status', 'status')->displayUsing(function ($value) {
                return ucwords($value);
            })->sortable()->readonly()->hideWhenCreating()->hideWhenUpdating(),
            Code::make('Result Info', function () {
                    if($this->result_info == null){
                        return "data belum di eksekusi";
                    } else {
                        return $this->result_info;
                    }
                })
                ->json()->hideWhenCreating()->hideWhenUpdating(),
            BelongsTo::make('User Id', 'user', \App\Nova\User::class)
            ->withMeta(['name' => 'nama_aslu'])
            ->hideWhenCreating()->hideWhenUpdating(),
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
        return [
            new \App\Nova\Actions\Account\UploadNewUserData($request->resourceId),
        ];
    }
}
