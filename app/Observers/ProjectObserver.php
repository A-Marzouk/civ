<?php

namespace App\Observers;

use App\Project;

class ProjectObserver
{
    /**
     * Handle the project "created" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function created(Project $project)
    {
        //
    }

    /**
     * Handle the project "updated" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function updated(Project $project)
    {
        //
    }

    /**
     * Handle the project "deleted" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function deleted(Project $project)
    {
        $relatedImages = $project->images ;
        if(count($relatedImages) > 0){
            foreach ($relatedImages as $image){
                // remove image from the system if the file exists
                if (file_exists(public_path($image->src))) {
                    unlink(public_path($image->src));
                }

                // if image is saved in our storage.
                $imageSrc = storage_path('app/public/' . $image->getRawOriginal('src'));
                if (file_exists($imageSrc)) {
                    unlink($imageSrc);
                }
                // delete the image record:
                $image->delete();
            }
        }
    }

    /**
     * Handle the project "restored" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function restored(Project $project)
    {
        //
    }

    /**
     * Handle the project "force deleted" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function forceDeleted(Project $project)
    {
        //
    }
}
