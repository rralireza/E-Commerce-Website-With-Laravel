<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use SoapClient;

class OrderController extends Controller
{
    public function create()
    {
        return view('client.orders.create', [
            'categories' => Category::all(),
            'items' => Cart::getItems(),
            'totalAmount' => Cart::totalAmount(),
            'totalItems' => Cart::totalItems()
        ]);
    }

    /**
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $order = Order::query()->create([
            'amount' => Cart::totalAmount(),
            'address' => $request->get('address')
        ]);

        foreach (Cart::getItems() as $item) {
            $product = $item['product'];
            $productQty = $item['quantity'];

            $order->details()->create([
                'product_id' => $product->id,
                'unit_amount' => $product->cost_with_discount,
                'count' => $productQty,
                'total_amount' => $productQty * $product->cost_with_discount
            ]);
        }

        $invoice = (new Invoice)->amount($order->amount);

//        dd($client = new SoapClient('http://localhost:8000/orders/payment/callback'));

        Cart::removeAll();

        return Payment::purchase($invoice, function ($driver , $transaction_id) use ($order) {
            $order->update([
                'transaction_id' => $transaction_id
            ]);
        })->pay()->render();

//        return redirect(route('showCart'));
    }

    //This method will auth payment
    public function callback(Request $request)
    {
        $order = Order::query()->where('transaction_id', $request->get('Authority'))->first();

        $order->update([
            'payment_status' => $request->get('Status')
        ]);

        return redirect(route('showOrder' , $order));
    }

    public function show(Order $order)
    {
        return view('client.orders.show', [
            'order' => $order
        ]);
    }
}
