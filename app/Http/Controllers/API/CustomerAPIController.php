<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAPIController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth:api')->except(['register', 'login']);
        $this->user = auth('api')->user();
    }

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

    public function logout(Request $request)
    {
        $this->user->tokens()->delete();

        return response()->json(['message' => 'logged out successfully'], 200);
    }

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

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
