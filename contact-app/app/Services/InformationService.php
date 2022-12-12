<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\Information;

class InformationService extends CommonService
{
    public $information;

    public function __construct(Information $information)
    {
        $this->information = $information;
    }

    public function store($request, $contactUuid)
    {
        $contact = Contact::where('uuid', $contactUuid)->firstOrFail();

        if (is_null($contact->information)) {
            $information = new Information();
            $information->phone = $request->phone;
            $information->email = $request->email;
            $information->location = $request->location;

            $contact->information()->save($information);
        } else {
            $contact->information->update($request->all());
        }

        return response()->json([
            'message' => __('responses.successfully_created', ['name' => 'Information'])
        ]);
    }
}
