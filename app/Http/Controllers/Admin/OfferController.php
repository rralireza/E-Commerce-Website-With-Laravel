<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.offers.index', [
           'offers' => Offer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferRequest $request)
    {
        Offer::query()->create([
            'code' => $request->get('code'),
            'start_at' => $request->get('start_at'),
            'expired_at' => $request->get('expired_at')
        ]);

        Session::flash('success_message' , 'New offer has created successfully!');
        return redirect(route('createOffer'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        return view('admin.offers.edit', [
           'offer' => $offer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer)
    {

        $codeIsNotUnique = Offer::query()
            ->where('code', $request->get('code'))
            ->where('id', '!=', $offer->id)
            ->exists();


        if ($codeIsNotUnique) {
            return redirect()->back()->withErrors(['code' => 'Code has already been used!']);
        }
        $this->validate($request, [
            'code' => ['required'],
            'start_at' => ['required' , 'before:expired_at'],
            'expired_at' => ['required' , 'after:starts_at']
        ]);

        $offer->update([
            'code' => $request->get('code'),
            'start_at' => $request->get('start_at'),
            'expired_at' => $request->get('expired_at')
        ]);

        Session::flash('success_update_message' , 'Offer has updated successfully!');
        return redirect(route('showOffers'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
