<?php

namespace App\Nova\Actions\Account;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

class DownloadUmmatList extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Indicates if this action is only available on the resource index view.
     *
     * @var bool
     */
    public $onlyOnIndex = true;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        return Action::openInNewTab(env('APP_URL').'/api/v1/export-ummat');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
