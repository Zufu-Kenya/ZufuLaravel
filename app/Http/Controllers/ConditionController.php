<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConditionRequests\StoreConditionRequest;
use App\Http\Requests\ConditionRequests\UpdateConditionRequest;
use App\Models\Condition;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ConditionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-condition|edit-condition|delete-condition', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-condition', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-condition', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-condition', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('conditions.index', [
            'conditions' => Condition::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('conditions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConditionRequest $request): RedirectResponse
    {
        Condition::create($request->all());

        return redirect()->route('conditions.index')->withSuccess('Condition Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Condition $condition): View
    {
        return view('conditions.show', [
            'condition' => $condition,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Condition $condition): View
    {
        return view('conditions.edit', [
            'condition' => $condition,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConditionRequest $request, Condition $condition)
    {
        $condition->update($request->all());

        return redirect()->back()->withSuccess('Condition Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Condition $condition)
    {
    }
}
