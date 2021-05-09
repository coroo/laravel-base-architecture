<?php

namespace App\Nova;

use App\Models\Event\Event;
use App\Models\Master\MasterFarah as MasterMasterFarah;
use App\Models\Master\MasterSyubah as MasterMasterSyubah;
use App\Nova\Account\UserAchievement;
use App\Nova\Account\UserEducation;
use App\Nova\Account\UserFamilies;
use App\Nova\Account\UserJob;
use App\Nova\Actions\Account\DownloadUmmatList;
use App\Nova\Master\MasterFarah;
use App\Nova\Master\MasterSyubah;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use Silvanite\NovaToolPermissions\Role;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\User';

    public static $group = 'Account';
    
    public static function label() {
        return 'Data Ummat';
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    // public static $title = 'nama_aslu';
    public function title()
    {
        $syubah = MasterMasterSyubah::where('id', $this->syubah)->first();
        $namaSyubah = isset($syubah->nama_syubah) ? $syubah->nama_syubah .' | ' : '';

        $farah = MasterMasterFarah::where('id', $this->farah)->first();
        $namaFarah = isset($farah->nama_farah) ? $farah->nama_farah .' | ' : '';
        return $namaSyubah . $namaFarah . $this->nama_aslu;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'syubah', 'farah', 'username', 'nama_aslu', 'nama_hijrah'
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
            // ID::make()->sortable(),

            // Gravatar::make(),
            Text::make('NAS', 'username')
                ->sortable()
                ->rules('required', 'max:254')
                ->creationRules('unique:users'),
            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),
            Text::make('syubah', 'syubah')->onlyOnIndex(),
            Text::make('farah', 'farah')->onlyOnIndex(),
            Image::make('foto', 'image_path')->sortable()->readonly(),
            Text::make('nama_aslu', 'nama_aslu')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('nama_hijrah', 'nama_hijrah')
                ->sortable()
                ->rules('required', 'max:255'),
            Select::make('jenis_kelamin', 'jenis_kelamin')->options([
                'male' => 'Laki-Laki',
                'female'  => 'Perempuan'
            ])->displayUsing(function ($value) {
                if($value=='male'){ return 'Laki-Laki';
                } else if($value=='female'){ return 'Perempuan';
                 }else { return ucfirst($value); }
            })->hideFromIndex(),
            Text::make('tempat_lahir', 'tempat_lahir')->hideFromIndex(),
            Date::make('tanggal_lahir', 'tanggal_lahir')->hideFromIndex(),
            Select::make('status_keumatan', 'status_keumatan')->options([
                '1.Dewasa'  => '1.Dewasa',
                '2.Ghilman' => '2.Ghilman',
                '3.Fityan'  => '3.Fityan',
                '4.Shibyan' => '4.Shibyan',
            ])->displayUsing(function ($value) {
                return ucfirst($value);
            })->hideFromIndex(),
            Select::make('golongan_darah', 'golongan_darah')->options([
                'A' => 'A',
                'B'  => 'B',
                'AB'  => 'AB',
                'O'  => 'O'
            ])->displayUsing(function ($value) {
                return ucfirst($value);
            })->hideFromIndex(),
            Select::make('status_kawin', 'status_kawin')->options([
                'S' => 'Single',
                'M' => 'Menikah',
                'D'  => 'Janda/Duda'
            ])->displayUsing(function ($value) {
                if($value=='S'){ return 'Single';
                } else if($value=='M'){ return 'Menikah';
                } else if($value=='D'){ return 'Janda/Duda';
                 }else { return ucfirst($value); }
            })->hideFromIndex(),
            Text::make('ayah_kode_nas', 'ayah_kode_nas')->hideFromIndex(),
            Text::make('ayah_nama_hijrah', 'ayah_nama_hijrah')->hideFromIndex(),
            Text::make('ibu_kode_nas', 'ibu_kode_nas')->hideFromIndex(),
            Text::make('ibu_nama_hijrah', 'ibu_nama_hijrah')->hideFromIndex(),
            Text::make('wali_kode_nas', 'wali_kode_nas')->hideFromIndex(),
            Text::make('wali_nama_hijrah', 'wali_nama_hijrah')->hideFromIndex(),
            Text::make('email', 'email')->hideFromIndex(),
            Text::make('alamat', 'alamat')->hideFromIndex(),
            Text::make('kelurahan', 'kelurahan')->hideFromIndex(),
            Text::make('kecamatan', 'kecamatan')->hideFromIndex(),
            Text::make('kabupaten', 'kabupaten')->hideFromIndex(),
            Text::make('provinsi', 'provinsi')->hideFromIndex(),
            Text::make('kode_pos', 'kode_pos')->hideFromIndex(),
            Text::make('no_telepon', 'no_telepon')->hideFromIndex(),
            Text::make('whatsapp', 'whatsapp')->hideFromIndex(),
            Text::make('pin_bb', 'pin_bb')->hideFromIndex(),
            Text::make('nama_akun_fb', 'nama_akun_fb')->hideFromIndex(),
            Text::make('entrance_channel', 'entrance_channel')->withMeta(
            [
                'value' => (function () {
                return $this->entrance_channel ?? 'admin-page';
                })(),
            ])->hideFromIndex()->readonly(),
            Text::make('entrance_desc', 'entrance_desc')->hideFromIndex()->readonly(),
            Select::make('golongan_darah', 'golongan_darah')->options([
                'A' => 'A',
                'B'  => 'B',
                'AB'  => 'AB',
                'O'  => 'O'
            ])->displayUsing(function ($value) {
                return ucfirst($value);
            })->hideFromIndex(),

            BelongsTo::make('Syubah', 'masterSyubah', MasterSyubah::class),
            BelongsTo::make('Farah', 'masterFarah', MasterFarah::class),

            HasMany::make('Pendidikan', 'userEducations', UserEducation::class),
            HasMany::make('Susunan Keluarga', 'userFamilies', UserFamilies::class),
            HasMany::make('Riwayat Pekerjaan', 'userJobs', UserJob::class),
            HasMany::make('Prestasi', 'userAchievements', UserAchievement::class),

            BelongsToMany::make('Roles', 'roles', Role::class)
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
        return [
            new \App\Nova\Filters\Account\SyubahFilter(),
            new \App\Nova\Filters\Account\FarahFilter(),
        ];
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
            (new DownloadUmmatList())
        ];
    }

    public static function relatableQuery(NovaRequest $request, $query)
    {
        $resource = $request->route('resource');
        if($resource == 'thausiyah-recaps'){
            $resourceId = $request->route('resourceId');
            $eventDetail = Event::with('halaqah.user')->find($resourceId);
            return $query->whereIn('id', $eventDetail->halaqah->user->pluck('id'));
        }
        return $query->whereNotNull('id');
    } 
}
