<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserEventRequest;
use App\Http\Requests\UpdateUserEventRequest;
use App\Http\Resources\Admin\UserEventResource;
use App\Models\UserEvent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserEventApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserEventResource(UserEvent::with(['user'])->get());
    }

    public function store(StoreUserEventRequest $request)
    {
        $userEvent = UserEvent::create($request->all());

        return (new UserEventResource($userEvent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UserEvent $userEvent)
    {
        abort_if(Gate::denies('user_event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserEventResource($userEvent->load(['user']));
    }

    public function update(UpdateUserEventRequest $request, UserEvent $userEvent)
    {
        $userEvent->update($request->all());

        return (new UserEventResource($userEvent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UserEvent $userEvent)
    {
        abort_if(Gate::denies('user_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userEvent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
