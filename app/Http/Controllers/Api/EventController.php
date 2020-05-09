<?php

namespace App\Http\Controllers\Api;

use App\Event;
use Facades\App\Facades\EventFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Traits\HasApiResponse;

class EventController extends Controller
{
    use HasApiResponse;

    public function allEvents()
    {
        $events = EventFacade::listFilter();

        return $this->apiSuccess($events);
    }

    public function userEvents()
    {
        $events = request()->user()->events()->get();

        return $this->apiSuccess($events);
    }

    public function show(Event $event)
    {
        return $this->apiSuccess($event);
    }

    public function create(EventRequest $request)
    {
        $event = request()->user()
            ->events()
            ->create($request->validated());

        return $this->apiCreated($event);
    }

    public function update(EventRequest $request, Event $event)
    {
        $event->update($request->validated());

        return $this->apiSuccess($event);
    }

    public function delete(Event $event)
    {
        return $this->apiDeleted($event->delete());
    }
}
