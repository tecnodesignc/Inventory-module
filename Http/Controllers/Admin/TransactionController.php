<?php

namespace Modules\Inventory\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Inventory\Entities\Transaction;
use Modules\Inventory\Http\Requests\CreateTransactionRequest;
use Modules\Inventory\Http\Requests\UpdateTransactionRequest;
use Modules\Inventory\Repositories\TransactionRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class TransactionController extends AdminBaseController
{
    /**
     * @var TransactionRepository
     */
    private $transaction;

    public function __construct(TransactionRepository $transaction)
    {
        parent::__construct();

        $this->transaction = $transaction;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $transactions = $this->transaction->all(20);

        return view('inventory::admin.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $transactions = $this->transaction->paginate(20);
        return view('inventory::admin.transactions.create',compact('transactions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTransactionRequest $request
     * @return Response
     */
    public function store(CreateTransactionRequest $request)
    {
        try{
            $this->transaction->create($request->all());

            return redirect()->route('admin.inventory.transaction.index')
                ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('inventory::transactions.title.transactions')]));

        }catch (\Exception $e){
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('inventory::transactions.title.transactions')]))->withInput($request->all());

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Transaction $transaction
     * @return Response
     */
    public function edit(Transaction $transaction)
    {
        $transactions = $this->transaction->paginate(20);
        return view('inventory::admin.transactions.edit', compact('transaction','transactions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Transaction $transaction
     * @param  UpdateTransactionRequest $request
     * @return Response
     */
    public function update(Transaction $transaction, UpdateTransactionRequest $request)
    {
        try{
            if(isset($request['options'])){
                $options=(array)$request['options'];
            }else{$options = array();}
            $request['options'] = json_encode($options);

            $this->transaction->update($transaction, $request->all());

            return redirect()->route('admin.inventory.transaction.index')
                ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('inventory::transactions.title.transactions')]));

        }catch (\Exception $e){
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('inventory::transactions.title.transactions')]))->withInput($request->all());


        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Transaction $transaction
     * @return Response
     */
    public function destroy(Transaction $transaction)
    {
        try{
            $this->transaction->destroy($transaction);

            return redirect()->route('admin.inventory.transaction.index')
                ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('inventory::transactions.title.transactions')]));

        }catch (\Exception $e){
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('inventory::transactions.title.transactions')]));

        }

    }
}
