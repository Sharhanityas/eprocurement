<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function showPendingVendors()
    {
        $vendors = Vendor::where('status', 'pending')->get();
        return view('admin.pending_vendors', compact('vendors'));
    }

    public function approve(Vendor $vendor)
    {
        $vendor->update(['status' => 'approved']);
        return redirect()->back()->with('message', 'Vendor approved.');
    }

    public function reject(Vendor $vendor)
    {
        $vendor->update(['status' => 'rejected']);
        return redirect()->back()->with('message', 'Vendor rejected.');
    }
}
