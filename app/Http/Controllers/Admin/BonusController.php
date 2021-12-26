<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBonuRequest;
use App\Http\Requests\StoreBonuRequest;
use App\Http\Requests\UpdateBonuRequest;
use App\Models\Bonu;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BonusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bonu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bonus = Bonu::with(['user'])->get();

        return view('admin.bonus.index', compact('bonus'));
    }

    public function create()
    {
        abort_if(Gate::denies('bonu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bonus.create', compact('users'));
    }

    public function store(StoreBonuRequest $request)
    {
        $bonu = Bonu::create($request->all());

        return redirect()->route('admin.bonus.index');
    }

    public function edit(Bonu $bonu)
    {
        abort_if(Gate::denies('bonu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bonu->load('user');

        return view('admin.bonus.edit', compact('users', 'bonu'));
    }

    public function update(UpdateBonuRequest $request, Bonu $bonu)
    {
        $bonu->update($request->all());

        return redirect()->route('admin.bonus.index');
    }

    public function show(Bonu $bonu)
    {
        abort_if(Gate::denies('bonu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bonu->load('user');

        return view('admin.bonus.show', compact('bonu'));
    }

    public function destroy(Bonu $bonu)
    {
        abort_if(Gate::denies('bonu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bonu->delete();

        return back();
    }

    public function massDestroy(MassDestroyBonuRequest $request)
    {
        Bonu::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
