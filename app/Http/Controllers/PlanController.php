<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::orderBy('name')->get();

        return view('plans.index', compact('plans'));
    }

    public function create()
    {
        return view('plans.create', [
            'priceDisplay' => $this->formatPriceDisplay(old('price')),
        ]);
    }

    public function store(Request $request)
    {
        $this->normalizePrice($request);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration_months' => 'required|integer|min:1',
        ]);

        Plan::create($data);

        return redirect()->route('plans.index')->with('success', 'Plano criado.');
    }

    public function edit(Plan $plan)
    {
        return view('plans.edit', [
            'plan' => $plan,
            'priceDisplay' => $this->formatPriceDisplay(old('price', $plan->price)),
        ]);
    }

    public function update(Request $request, Plan $plan)
    {
        $this->normalizePrice($request);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration_months' => 'required|integer|min:1',
        ]);

        $plan->update($data);

        return redirect()->route('plans.index')->with('success', 'Plano atualizado.');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()->route('plans.index')->with('success', 'Plano excluído.');
    }

    private function normalizePrice(Request $request): void
    {
        $price = $request->input('price');
        if ($price === null || $price === '') {
            return;
        }

        $normalized = str_replace('.', '', (string) $price);
        $normalized = str_replace(',', '.', $normalized);

        $request->merge(['price' => $normalized]);
    }

    private function formatPriceDisplay(mixed $value): string
    {
        if ($value === null || $value === '') {
            return '';
        }

        if (is_string($value) && str_contains($value, ',')) {
            return $value;
        }

        return number_format((float) $value, 2, ',', '.');
    }
}
