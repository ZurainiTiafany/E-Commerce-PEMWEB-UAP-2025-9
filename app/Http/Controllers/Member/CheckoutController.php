

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\ShippingType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $shippingTypes = ShippingType::all();

        return view('checkout.index', compact('product', 'shippingTypes'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'product_id'     => 'required',
            'shipping_type'  => 'required',
            'payment_method' => 'required', // wallet or va
        ]);

        $product = Product::findOrFail($request->product_id);

        // Hitung shipping
        $shippingType = ShippingType::find($request->shipping_type);

        $shippingCost = $shippingType->price;
        $total = $product->price + $shippingCost;

        // Simpan transaksi
        $transaction = Transaction::create([
            'code' => 'TRX' . time(),
            'buyer_id' => auth()->id(),
            'store_id' => $product->store_id,
            'shipping_type' => $shippingType->name,
            'shipping_cost' => $shippingCost,
            'grand_total' => $total,
            'payment_status' => 'unpaid',
        ]);

        // Simpan detail transaksi
        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'product_id' => $product->id,
            'qty' => 1,
            'subtotal' => $product->price,
        ]);

        // Jika bayar pakai VA → generate kode VA
        if ($request->payment_method === 'va') {
            $transaction->update([
                'va_number' => rand(1000000000, 9999999999)
            ]);
        }

        return redirect()->route('payment.page', $transaction->id);
    }
}
