<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::id() === 1) {

            $tickets = Ticket::with('user')->orderBy('created_at', 'asc')->get();

        } else {

            $tickets = Ticket::where('user_id', 11)->orderBy('created_at', 'asc')->get();

        }

        return view('modules.ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateTicket $request)
    {
        if ($ticket = $request->persist()) {

            return redirect()->to('/ticket')->with('success', 'Your Ticket Has been created successfully');

        }
        return redirect()->back()->with('error', 'your ticket is not created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::whereId($id)->first();

        return view('modules.ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::whereId($id)->first();

        return view('modules.ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::whereId($id)->first();

        $updated = $ticket->update($request->except(['_method', '_token']));

        return redirect()->route('ticket.show', $id)->with('success', 'you edited the ticket successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::id === 1) {

            $ticket = Ticket::whereId($id)->first();

        } else {

            $ticket = Ticket::where(['id' => $id, 'user_id' => Auth::id()])->first();

        }

        if ($ticket) {

            $ticket->delete();

            return redirect()->to('/ticket')->with('success', 'Your Ticket Has been deleted');
        }

        return redirect()->to('/ticket')->with('error', 'you cant delete');

    }

    public function changeStatus($id, $status)
    {
        $ticket = Ticket::whereId($id)->first();

        $updated = $ticket->update(['closed' => $status]);

        return redirect()->back()->with('success', 'Your updated status');
    }
}
