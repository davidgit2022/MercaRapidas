<?php

namespace App\Http\Livewire\Admin\FoodsRestrictions;

use Livewire\Component;
use App\FoodsRestriction;

class AdminFoodRestrictionComponent extends Component
{
    public $description, $details;

    public $foodRestrictionId;

    public function render()
    {
        $foodRestrictions = FoodsRestriction::all();
        return view('livewire.admin.foods-restrictions.admin-food-restriction-component',[
            'foodRestrictions' => $foodRestrictions
        ]);
    }

    public function store()
    {
        /* $this->validate(); */

        $foodRestriction = new FoodsRestriction();

        $foodRestriction->description = $this->description;
        $foodRestriction->details = $this->details;

        /* dd($foodRestriction); */
        $foodRestriction->save();

        $this->resetInputFields();
        $this->emit('close-modal');
        $this->emit('alert',['type','success','message'=> 'Línea de producción creada correctamente.']);
    }

    public function edit ($id)
    {
        $this->foodRestrictionId = $id;
        $foodRestriction = FoodsRestriction::find($this->foodRestrictionId);

        $this->description = $foodRestriction->description;
        $this->details = $foodRestriction->details;
    }

    public function update()
    {
        /* $this->validate(); */

        if ($this->foodRestrictionId !='')
        {
            $foodRestriction = FoodsRestriction::find($this->foodRestrictionId);


            $foodRestriction->description = $this->description;
            $foodRestriction->details = $this->details;
            $foodRestriction->update();

            $this->resetInputFields();
            $this->emit('close-modal');
            $this->emit('alert',['type','success','message' => 'Línea de producción actualizado correctamente.']);
        }
    }

    public function delete($id)
    {
        $this->foodRestrictionId = $id;
    }

    public function destroy()
    {
        if ($this->foodRestrictionId !='')
        {
            FoodsRestriction::where('id','=',$this->foodRestrictionId)->delete();

            $this->resetInputFields();
            $this->emit('close-modal');
            $this->emit('alert', ['type', 'success', 'message' => 'Producto eliminado correctamente.']);
        }
    }

    public function resetInputFields()
    {
        $this->description = '';
        $this->details = '';
    }

    public function cancel()
    {
        $this->emit('close-modal');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetInputFields();
    }

}
