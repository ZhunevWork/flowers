<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserEventRequest;
use App\Http\Requests\StoreUserEventRequest;
use App\Http\Requests\UpdateUserEventRequest;
use App\Models\User;
use App\Models\UserEvent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserEventController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userEvents = UserEvent::with(['user'])->get();

        return view('admin.userEvents.index', compact('userEvents'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userEvents.create', compact('users'));
    }

    public function store(StoreUserEventRequest $request)
    {
        $userEvent = UserEvent::create($request->all());

        return redirect()->route('admin.user-events.index');
    }

    public function edit(UserEvent $userEvent)
    {
        abort_if(Gate::denies('user_event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userEvent->load('user');

        return view('admin.userEvents.edit', compact('users', 'userEvent'));
    }

    public function update(UpdateUserEventRequest $request, UserEvent $userEvent)
    {
        $userEvent->update($request->all());

        return redirect()->route('admin.user-events.index');
    }

    public function show(UserEvent $userEvent)
    {
        abort_if(Gate::denies('user_event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userEvent->load('user');

        return view('admin.userEvents.show', compact('userEvent'));
    }

    public function destroy(UserEvent $userEvent)
    {
        abort_if(Gate::denies('user_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userEvent->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserEventRequest $request)
    {
        UserEvent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
