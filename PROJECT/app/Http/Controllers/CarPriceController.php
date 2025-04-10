<?php

namespace App\Http\Controllers;

use App\Models\CarPrice;
use Illuminate\Http\Request;

class CarPriceController extends Controller
{
    public function index()
    {
        $carPrices = CarPrice::all();
        return view('car_prices.index', compact('carPrices'));
    }

    public function create()
    {
        return view('car_prices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_name' => 'required|string|max:255',
            'price' => 'required|numeric'
        ]);

        CarPrice::create($request->all());

        return redirect()->route('car-prices.index')->with('success', 'Harga mobil berhasil ditambahkan.');
    }

    public function show(CarPrice $carPrice)
    {
        return view('car_prices.show', compact('carPrice'));
    }

    public function edit(CarPrice $carPrice)
    {
        return view('car_prices.edit', compact('carPrice'));
    }

    public function update(Request $request, CarPrice $carPrice)
    {
        $request->validate([
            'car_name' => 'required|string|max:255',
            'price' => 'required|numeric'
        ]);

        $carPrice->update($request->all());

        return redirect()->route('car-prices.index')->with('success', 'Data harga mobil berhasil diperbarui.');
    }

    public function destroy(CarPrice $carPrice)
    {
        $carPrice->delete();

        return redirect()->route('car-prices.index')->with('success', 'Data harga mobil berhasil dihapus.');
    }
}
