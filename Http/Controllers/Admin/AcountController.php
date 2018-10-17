<?php

namespace Modules\Inventary\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Inventary\Entities\Acount;
use Modules\Inventary\Http\Requests\CreateAcountRequest;
use Modules\Inventary\Http\Requests\UpdateAcountRequest;
use Modules\Inventary\Repositories\AcountRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class AcountController extends AdminBaseController
{
    /**
     * @var AcountRepository
     */
    private $acount;

    public function __construct(AcountRepository $acount)
    {
        parent::__construct();

        $this->acount = $acount;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$acounts = $this->acount->all();

        return view('inventary::admin.acounts.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventary::admin.acounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAcountRequest $request
     * @return Response
     */
    public function store(CreateAcountRequest $request)
    {
        $this->acount->create($request->all());

        return redirect()->route('admin.inventary.acount.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('inventary::acounts.title.acounts')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Acount $acount
     * @return Response
     */
    public function edit(Acount $acount)
    {
        return view('inventary::admin.acounts.edit', compact('acount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Acount $acount
     * @param  UpdateAcountRequest $request
     * @return Response
     */
    public function update(Acount $acount, UpdateAcountRequest $request)
    {
        $this->acount->update($acount, $request->all());

        return redirect()->route('admin.inventary.acount.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('inventary::acounts.title.acounts')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Acount $acount
     * @return Response
     */
    public function destroy(Acount $acount)
    {
        $this->acount->destroy($acount);

        return redirect()->route('admin.inventary.acount.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('inventary::acounts.title.acounts')]));
    }
}
