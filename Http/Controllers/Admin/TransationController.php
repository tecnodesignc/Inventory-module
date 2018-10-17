<?php

namespace Modules\Inventary\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Inventary\Entities\Transation;
use Modules\Inventary\Http\Requests\CreateTransationRequest;
use Modules\Inventary\Http\Requests\UpdateTransationRequest;
use Modules\Inventary\Repositories\TransationRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class TransationController extends AdminBaseController
{
    /**
     * @var TransationRepository
     */
    private $transation;

    public function __construct(TransationRepository $transation)
    {
        parent::__construct();

        $this->transation = $transation;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$transations = $this->transation->all();

        return view('inventary::admin.transations.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventary::admin.transations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTransationRequest $request
     * @return Response
     */
    public function store(CreateTransationRequest $request)
    {
        $this->transation->create($request->all());

        return redirect()->route('admin.inventary.transation.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('inventary::transations.title.transations')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Transation $transation
     * @return Response
     */
    public function edit(Transation $transation)
    {
        return view('inventary::admin.transations.edit', compact('transation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Transation $transation
     * @param  UpdateTransationRequest $request
     * @return Response
     */
    public function update(Transation $transation, UpdateTransationRequest $request)
    {
        $this->transation->update($transation, $request->all());

        return redirect()->route('admin.inventary.transation.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('inventary::transations.title.transations')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Transation $transation
     * @return Response
     */
    public function destroy(Transation $transation)
    {
        $this->transation->destroy($transation);

        return redirect()->route('admin.inventary.transation.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('inventary::transations.title.transations')]));
    }
}
