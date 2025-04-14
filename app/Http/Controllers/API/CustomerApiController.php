<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerApiController extends Controller
{
    // Fungsi untuk mendapatkan jumlah pengunjung
    public function getCustomerCount()
    {
        $count = Customer::count();
        return response()->json([
            'total_customer' => $count
        ]);
    }

    public function getAllCustomer()
    {
        $customers = Customer::with('produk')->get();
        return response()->json($customers);
    }

    public function form(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'produk' => 'required|exists:produk,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $customer = Customer::create([
            'id_produk' => $request->produk,
            'nama' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->phone
        ]);

        return response()->json(['message' => 'Customer berhasil ditambahkan', 'data' => $customer], 201);
    }
}