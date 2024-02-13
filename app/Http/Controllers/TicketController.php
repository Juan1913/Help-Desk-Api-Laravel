<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Ticket;
use App\Http\Resources\TicketCollection;
use App\Filters\TicketFilter;
use Illuminate\Http\Request;
use App\Http\Resources\TicketResource;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new TicketFilter();
        $queryItems = $filter->transform($request);
        $includeComments = $request->query('includeComments');
        $tickets = Ticket::where($queryItems);
        if($includeComments){
            $tickets = $tickets->with('comments');
        }
        return new TicketCollection($tickets->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        

        try{

            
            $ticket = Ticket::create($request->all());
            return response()->json(['message' => 'Ticket creado correctamente'], 201);

        }catch(\Exception $e){
            return response()->json(['error'=> $e->getMessage()],500);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $includeComments = request()->query('includeComments');
        if($includeComments){
            return new TicketResource($ticket->loadMissing('comments'));
        }
        return new TicketResource($ticket);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        try{
             $ticket ->update($request->all());
             return response()->json(['Ticket actualizado correctamente'], 200);
        }catch(\Exception $e){

            return response()->json(['error'=>$e->getMessage()], 500);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        try {
            $ticket->delete();
    
            return response()->json(['message' => 'Ticket eliminado correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    //funciones para graficos


    public function totalTickets()
{
    return Ticket::count();
}

public function totalTicketsAbiertos()
{
    return Ticket::where('status', 'Abierto')->count();
}

public function totalTicketsCerrados()
{
    return Ticket::where('status', 'Cerrado')->count();
}

public function ticketsPorCategoria()
{
    return Ticket::select('categories.category', DB::raw('COUNT(tickets.id) as count'))
        ->join('categories', 'tickets.category_id', '=', 'categories.id')
        ->groupBy('categories.category')
        ->get();
}

}
