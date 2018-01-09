<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Bunch;
use App\Http\Requests\SubscriberRequest;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($bunch_id)
    {
        $subscribers = Subscriber::orderBy('id', 'asc')->owned()->get();
        return view('subscriber.index', compact('bunch_id', 'subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $bunch_id
     * @return \Illuminate\Http\Response
     */
    public function create($bunch_id)
    {
        return view('subscriber.create', compact('bunch_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SubscriberRequest  $request
     * @param int $bunch_id
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriberRequest $request, $bunch_id)
    {
        $subscriber = Subscriber::create($request->all());
        if ($bunch_id) {
            $subscriber->bunches()->attach($bunch_id);
            $bunch = Bunch::find($bunch_id);
            return redirect()->route('bunch.editSubscribers', compact('bunch'));
        }
        return redirect()->route('subscriber.index', compact('bunch_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show($bunch_id, Subscriber $subscriber)
    {
        return view('subscriber.show', compact('bunch_id', 'subscriber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit($bunch_id, Subscriber $subscriber)
    {
//        dd($subscriber);
        return view('subscriber.edit', compact('bunch_id', 'subscriber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Subscriber $subscriber
     * @param  \App\Http\Requests\SubscriberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update($bunch_id, Subscriber $subscriber, SubscriberRequest $request)
    {
        $subscriber->update($request->all());
        if ($bunch_id) {
            $bunch = Bunch::find($bunch_id);
            return redirect()->route('bunch.editSubscribers', compact('bunch'));
        }
        return redirect()->route('subscriber.index', compact('bunch_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy($bunch_id, Subscriber $subscriber)
    {
        $bunches = $subscriber->bunches;
        if ($bunches->count()) {
            foreach ($bunches as $bunch) {
                $subscriber->bunches()->detach($bunch->id);
            }
        }
        $subscriber->delete();
        if ($bunch_id) {
            $bunch = Bunch::find($bunch_id);
            return redirect()->route('bunch.editSubscribers', compact('bunch'));
        }
        return redirect()->route('subscriber.index', compact('bunch_id'));
    }

    /**
     * Remove subscriber from specified bunch.
     *
     * @param  Subscriber    $subscriber
     * @param  Bunch    $bunch
     * @return \Illuminate\Http\Response
     */
    public function removeFromBunch($bunch_id, Subscriber $subscriber, Bunch $bunch)
    {
        $subscriber->bunches()->detach($bunch->id);
        return redirect()->route('subscriber.edit', compact('bunch_id', 'subscriber'));
    }

    /**
     * Add the specified subscriber to bunch.
     *
     * @param  Subscriber    $subscriber
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function addToBunch($bunch_id, Subscriber $subscriber, Request $request)
    {
        $subscriber->bunches()->attach($request->input('bunch_id'));
        return redirect()->route('subscriber.edit', compact('bunch_id', 'subscriber'));
    }
}