<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ContactController extends Controller
{
    public $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contacts = Redis::get('contact:data');

        if (is_null($contacts)) {
            $contacts = Contact::all();
            Redis::set('contact:data', json_encode($contacts));
            Redis::expire('contact:data', 60); // cache için 60 sn'lik TTL koydum

            return json_decode(Redis::get('contact:data'));
        } else {
            return json_decode($contacts);
        }
    }

    public function store(Request $request)
    {
        return $this->contactService->store($request);
    }

    public function show($contactUuid)
    {
        return $this->contactService->show($contactUuid);
    }

    public function update(Request $request, $contactUuid)
    {
        return $this->contactService->update($request, $contactUuid);
    }

    public function delete($contactUuid)
    {
        return $this->contactService->delete($contactUuid);
    }
}
