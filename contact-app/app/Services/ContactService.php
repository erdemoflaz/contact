<?php


namespace App\Services;


use App\Models\Contact;

class ContactService
{
    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function store($request)
    {
        if ($request->file('photo'))
            $photo = $request->file('photo')->store('photo', 'public');

        $contact = $this->contact->create([
            "name"      => $request->input('name'),
            "last_name" => $request->input('last_name'),
            "company"   => $request->input('company'),
            "photo"     => isset($photo) ? url('/storage/'.$photo) : null,
        ]);

        return response()->json([
            'message' => __('responses.successfully_created', $this->modelName($contact))
        ]);
    }

    public function show($contactUuid)
    {
        $contact = $this->contact->where('uuid', $contactUuid)->firstOrFail();

        return response()->json($contact);
    }

    public function update($request, $contactUuid)
    {
        $contact = $this->contact->where('uuid', $contactUuid)->firstOrFail();
        $contact->update($request->all());

        return response()->json([
            'message' => __('responses.successfully_updated', $this->modelName($contact))
        ]);
    }

    public function delete($contactUuid)
    {
        $contact = $this->contact->where('uuid', $contactUuid)->firstOrFail();
        $contact->delete();

        return response()->json([
            'message' => __('responses.successfully_deleted', $this->modelName($contact))
        ]);
    }

    public function modelName($record)
    {
        return ['name' => class_basename($record)];
    }
}
