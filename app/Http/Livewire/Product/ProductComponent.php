<?php

namespace App\Http\Livewire\Product;

use App\Product;
use Livewire\Component;
use App\ProductionsLine;

class ProductComponent extends Component
{
    public $name, $count, $purchese_value, $sale_value, $status, $product_lineId, $date_created;
    public $productId;
    public $totalProducts, $totalPurchaseCost, $totalProfitSale;
    public $from, $to, $productName, $lineProduct;
    public $unitGain, $totalGain, $profitPercentage;


    protected function rules (){
        return [
            'name' => 'required',
            'count' => 'required|numeric|min:0',
            'purchese_value' => 'required|numeric|min:0',
            'sale_value' => 'required|numeric|min:0',
            'product_lineId' => 'required',
            'date_created' => 'required|date',
        ];
    }

    protected $validationAttributes = [
        'name' => 'nombre',
        'count' => 'cantidad',
        'purchese_value' => 'precio de compra',
        'sale_value' => 'precio de venta',
        'product_lineId' => 'línea de producción',
        'date_created' => 'fecha de compra',
    ];

    public function mount()
    {
        $products = Product::all();
        foreach ($products as $product)
        {
            $this->totalProducts = $this->totalProducts + $product->count;
        }
    }

    public function render()
    {
        $products_lines=ProductionsLine::all();

        $products = Product::select('products.*', 'productions_lines.name as name_production')
        ->leftjoin('productions_lines','productions_lines.id', '=', 'products.product_lineId')
        ->when($this->from, function ($query, $from){
            if ($this->to != '')
            {
                $query->whereBetween('products.date_created', [$from, $this->to]);
            }
        })
        ->when($this->productName, function($query, $productName){
            return $query->where('products.name', 'like', '%'. $productName . '%');
        })
        ->when($this->lineProduct, function($query, $lineProduct){
            return $query->where('products.product_lineId', $lineProduct);
        })
        ->get();

        return view('livewire.product.product-component',[
            'products' => $products,
            'products_lines'=>$products_lines
        ]);
    }

    public function store()
    {
        $this->validate();

        $product = new Product();

        $product->name = $this->name;
        $product->count = $this->count;
        $product->purchese_value = $this->purchese_value;
        $product->sale_value = $this->sale_value - $this->purchese_value;
        $product->product_lineId = $this->product_lineId;
        $product->date_created = $this->date_created;
        $product->save();

        $this->resetInputFields();
        $this->emit('close-modal');
        $this->emit('alert',['type','success','message'=> 'Producto creado correctamente.']);
    }

    public function edit($id)
    {
        $this->productId = $id;
        $product = Product::where('id','=',$this->productId)->first();

        $this->name = $product->name;
        $this->count = $product->count;
        $this->purchese_value = $product->purchese_value;
        $this->sale_value = $product->sale_value;
        $this->product_lineId = $product->product_lineId;
        $this->date_created = $product->date_created;
    }

    public function update()
    {
        $this->validate();

        if ($this->productId !='')
        {
            $product = Product::find($this->productId);

            $product->name = $this->name;
            $product->count = $this->count;
            $product->purchese_value = $this->purchese_value;
            $product->sale_value = $this->sale_value;
            $product->product_lineId = $this->product_lineId;
            $product->date_created = $this->date_created;
            $product->update();

            $this->resetInputFields();
            $this->emit('close-modal');
            $this->emit('alert',['type','success','message' => 'Producto actualizado correctamente.']);
        }
    }

    public function showTotal($id)
    {
        $this->productId = $id;
        $this->product = Product::where('id','=',$this->productId)->first();

        $this->name = $this->product['name'];


        $this->unitGain = $this->product['sale_value'] - $this->product['purchese_value'];
        $this->totalGain = ($this->product['sale_value'] - $this->product['purchese_value']) * $this->product['count'];
        $this->profitPercentage = ($this->product['purchese_value'] / $this->product['sale_value'] ) * 100;


        $this->totalPurchaseCost = $this->product['count'] * $this->product['purchese_value'];
        $this->totalProfitSale = $this->product['count'] * $this->product['sale_value'];
    }

    public function addCant($id)
    {
        $this->productId = $id;
        /* $product = Product::where('id','=',$this->productId)->first(); */
        $product = Product::find($this->productId);

        $product->count = $product->count + 1;

        $product->update();
    }

    public function diminishCant($id)
    {
        $this->productId = $id;
        /* $product = Product::where('id', '=', $this->productId)->first(); */
        $product = Product::find($this->productId);

        $product->count = $product->count - 1;

        $product->update();

    }

    public function delete($id)
    {
        $this->productId = $id;
    }

    public function destroy()
    {
        Product::where('id','=', $this->productId)->delete();

        $this->resetInputFields();
        $this->emit('close-modal');
        $this->emit('alert',['type','success','message'=> 'Producto eliminado correctamente.' ]);
    }

    public function resetFilter()
    {
        $this->from = '';
        $this->to = '';
        $this->productName = '';
        $this->lineProduct = '';


    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->count = '';
        $this->purchese_value = '';
        $this->sale_value = '';
        $this->product_lineId= '';
        $this->date_created= '';
    }

    public function cancel()
    {
        $this->emit('close-modal');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetInputFields();
    }
}
