<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Services\InformationService;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public $informationService;

    public function __construct(InformationService $informationService)
    {
        $this->informationService = $informationService;
    }

    public function store(Request $request, $contactUuid)
    {
        return $this->informationService->store($request, $contactUuid);
    }

    public function getNumberCountFromLocation(Request $request)
    {
        return Information::where('location_slug', self::slugify($request->location))->count();
    }
}
