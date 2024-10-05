<?php

// app/Http/Controllers/VendorController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all(); // Retrieve all vendors
        return view('admin.vendors.index', compact('vendors'));
    }

    public function approve($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->is_approved = true; // Approve the vendor
        $vendor->save();

        return redirect()->back()->with('success', 'Vendor approved successfully.');
    }
}


