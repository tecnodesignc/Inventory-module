<?php

namespace Modules\Inventary\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Inventary\Entities\Account;
use Modules\Inventary\Http\Requests\CreateAccountRequest;
use Modules\Inventary\Http\Requests\UpdateAccountRequest;
use Modules\Inventary\Repositories\AccountRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class AccountController extends AdminBaseController
{
    /**
     * @var AccountRepository
     */
    private $account;

    public function __construct(AccountRepository $account)
    {
        parent::__construct();

        $this->account = $account;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$accounts = $this->account->all();

        return view('inventary::admin.accounts.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventary::admin.accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAccountRequest $request
     * @return Response
     */
    public function store(CreateAccountRequest $request)
    {
        $this->account->create($request->all());

        return redirect()->route('admin.inventary.account.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('inventary::accounts.title.accounts')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Account $account
     * @return Response
     */
    public function edit(Account $account)
    {
        return view('inventary::admin.accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Account $account
     * @param  UpdateAccountRequest $request
     * @return Response
     */
    public function update(Account $account, UpdateAccountRequest $request)
    {
        $this->account->update($account, $request->all());

        return redirect()->route('admin.inventary.account.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('inventary::accounts.title.accounts')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Account $account
     * @return Response
     */
    public function destroy(Account $account)
    {
        $this->account->destroy($account);

        return redirect()->route('admin.inventary.account.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('inventary::accounts.title.accounts')]));
    }
}
