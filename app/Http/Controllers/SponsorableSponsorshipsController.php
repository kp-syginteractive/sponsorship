<?php

namespace App\Http\Controllers;

use App\Sponsorable;
use Illuminate\Http\Request;

class SponsorableSponsorshipsController extends Controller
{
    public function new($slug)
    {
    	$sponsorable = Sponsorable::findOrFailBySlug($slug);
    	$sponsorableSlots = $sponsorable->slots()
    							->purchasable()
    							->orderBy('publish_date')->get();
    	return view('sponsorable-sponsorships.new', [
    		'sponsorableSlots' => $sponsorableSlots,
    		'sponsorable' => $sponsorable,
    	]);
    }
}
