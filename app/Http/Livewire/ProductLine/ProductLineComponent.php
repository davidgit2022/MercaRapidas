<?php

namespace App\Http\Livewire\ProductLine;

use Livewire\Component;
use App\ProductionsLine;

class ProductLineComponent extends Component
{
    public $name;

    public $production_lineId;

    protected function rules()
    {
        return[
            'name' => 'required',
        ];

    }

    protected $validationAttributes = [
        'name' => 'nombre'
    ];

    public function render()
    {
        $productions_lines = ProductionsLine::all();
        return view('livewire.product-line.product-line-component',[
            'productions_lines' => $productions_lines
        ]);
    }

    public function store()
    {
        $this->validate();

        $production_line = new ProductionsLine();

        $production_line->name = $this->name;

        $production_line->save();


        
        $this->emit('close-modal');
        $this->emit('alert',['type','success','message'=> 'Línea de producción creada correctamente.']);
    }

    public function edit ($id)
    {
        $this->production_lineId = $id;
        $this->production_line = ProductionsLine::where('id','=', $this->production_lineId)->first();

        $this->name = $this->production_line->name;
    }

    public function update()
    {
        $this->validate();

        if ($this->production_lineId !='')
        {
            $production_line = ProductionsLine::find($this->production_lineId);

            $production_line->name = $this->name;
            $production_line->update();

            $this->resetInputFields();
            $this->emit('close-modal');
            $this->emit('alert',['type','success','message' => 'Línea de producción actualizado correctamente.']);
        }
    }

    public function delete($id)
    {
        $this->production_lineId = $id;
    }

    public function destroy()
    {
        if ($this->production_lineId !='')
        {
            ProductionsLine::where('id','=',$this->production_lineId)->delete();

            $this->resetInputFields();
            $this->emit('close-modal');
            $this->emit('alert', ['type', 'success', 'message' => 'Producto eliminado correctamente.']);
        }
    }

    public function resetInputFields()
    {
        $this->name = '';
    }

    public function cancel()
    {
        $this->emit('close-modal');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetInputFields();
    }

}

