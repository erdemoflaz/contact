<?php

namespace App\Observers;

use App\Models\Information;

class InformationObserver
{
    /**
     * Handle the Information "created" event.
     *
     * @param \App\Models\Information $information
     * @return void
     */
    public function created(Information $information)
    {
        //
    }

    public function creating(Information $information)
    {
        $information->location_slug = self::slugify($information->location);
    }

    public function updating(Information $information)
    {
        $information->location_slug = self::slugify($information->location);
    }

    /**
     * Handle the Information "updated" event.
     *
     * @param \App\Models\Information $information
     * @return void
     */
    public function updated(Information $information)
    {
        //
    }

    /**
     * Handle the Information "deleted" event.
     *
     * @param \App\Models\Information $information
     * @return void
     */
    public function deleted(Information $information)
    {
        //
    }

    /**
     * Handle the Information "restored" event.
     *
     * @param \App\Models\Information $information
     * @return void
     */
    public function restored(Information $information)
    {
        //
    }

    /**
     * Handle the Information "force deleted" event.
     *
     * @param \App\Models\Information $information
     * @return void
     */
    public function forceDeleted(Information $information)
    {
        //
    }

    public static function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return (string)$text;
    }
}
