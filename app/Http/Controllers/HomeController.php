<?php

namespace App\Http\Controllers;

use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $cheapest = $this->productRepository->cheapest();
        $expensive = $this->productRepository->mostExpensive();

        return view('welcome', compact('cheapest', 'expensive'));
    }
}
