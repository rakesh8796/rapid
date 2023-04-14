<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetailerController extends Controller
{
    //
    public function index()
    {
        return view("retailer/dashboard");
    }
    public function orders()
    {
        return view("retailer/order");
    }
    public function bulkorder()
    {
        return view("retailer/bulk-order");
    }
    public function singleorder()
    {
        return view("retailer/single-order");
    }
    public function booksingleorder()
    {
        return view("retailer/book-single-order");
    }
    public function misorder()
    {
        return view("retailer/mis");
    }
    public function pincode()
    {
        return view("retailer/pincode");
    }
    public function tracking()
    {
        return view("retailer/order-tracking");
    }
    
    public function printlabel()
    {
        return view("retailer/print-shipping-labels");
    }
    public function wallet()
    {
        return view("retailer/wallet");
    }
    public function calculator()
    {
        return view("retailer/Calculator");
    }
}
