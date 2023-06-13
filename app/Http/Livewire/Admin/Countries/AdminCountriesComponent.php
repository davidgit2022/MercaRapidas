<?php

namespace App\Http\Livewire\Admin\Countries;

use App\Country;
use Livewire\Component;

class AdminCountriesComponent extends Component
{
    public $name;

    public $countryId;

    /* protected function rules()
    {
        return[

            'name' => 'required|unique:countries,name',
        ];

    } */

    public function render()
    {
        $countries = Country::all();
        return view('livewire.admin.countries.admin-countries-component',[
            'countries' => $countries
        ]);
    }

    public function store()
    {
        /* $this->validate(); */
        $validatedData = $this->validate([
            'name' => 'required|unique:countries,name',
        ]);

        $country = new Country();

        $country->name = $this->name;

        $country->save();

        $this->resetInputFields();
        $this->emit('close-modal');
        $this->emit('alert',['type','success','message'=> 'Línea de producción creada correctamente.']);
    }

    public function edit ($id)
    {
        $this->countryId = $id;
        $country = Country::find($this->countryId);

        $this->name = $country->name;
    }

    public function update()
    {
        /* $this->validate(); */
        $validatedData = $this->validate([
            'name' => 'required|unique:countries,name' . $this->countryId,
            /* 'email' => 'unique:users,email_address,' . $userId, */
        ]);

        if ($this->countryId !='')
        {
            $country = Country::find($this->countryId);

            $country->name = $this->name;
            $country->update();

            $this->resetInputFields();
            $this->emit('close-modal');
            $this->emit('alert',['type','success','message' => 'Línea de producción actualizado correctamente.']);
        }
    }

    public function delete($id)
    {
        $this->countryId = $id;
    }

    public function destroy()
    {
        if ($this->countryId !='')
        {
            Country::where('id','=',$this->countryId)->delete();

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



