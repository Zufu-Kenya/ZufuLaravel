<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class CustomerController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth:api')->except('register', 'login');
        $this->user = auth('api')->user();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('customer.index', [
            'customers' => Customer::latest('id')->paginate(50),
        ]);
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
    public function register(StoreCustomerRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        $customer = Customer::create($input);

        return response()->json(['customer' => $customer], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $token = $this->user->createToken('CustomerToken')->plainTextToken;

            return response()->json(['customer' => $this->user, 'token' => $token], 200);
        } else {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $input = $request->validated();

        if (!empty($request->password)) {
            $input['password'] = Hash::make($request->password);
        } else {
            $input = $request->except('password');
        }

        $customer->update($input);

        return response()->json(['customer' => $customer], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
