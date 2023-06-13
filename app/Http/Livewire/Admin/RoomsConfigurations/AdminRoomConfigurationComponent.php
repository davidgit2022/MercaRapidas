<?php

namespace App\Http\Livewire\Admin\RoomsConfigurations;

use Livewire\Component;
use App\RoomsConfiguration;

class AdminRoomConfigurationComponent extends Component
{
    public $description, $capacity;

    public $roomConfigurationId;


    public function render()
    {
        $roomConfigurations = RoomsConfiguration::all();
        return view('livewire.admin.rooms-configurations.admin-room-configuration-component',[
            'roomConfigurations' => $roomConfigurations
        ]);
    }

    public function store()
    {
        /* $this->validate(); */

        $roomConfiguration = new RoomsConfiguration();

        $roomConfiguration->description = $this->description;
        $roomConfiguration->capacity = $this->capacity;

        /* dd($roomConfiguration); */
        $roomConfiguration->save();

        $this->resetInputFields();
        $this->emit('close-modal');
        $this->emit('alert',['type','success','message'=> 'Línea de producción creada correctamente.']);
    }

    public function edit ($id)
    {
        $this->roomConfigurationId = $id;
        $roomConfiguration = RoomsConfiguration::find($this->roomConfigurationId);

        $this->description = $roomConfiguration->description;
        $this->capacity = $roomConfiguration->capacity;
    }

    public function update()
    {
        /* $this->validate(); */

        if ($this->roomConfigurationId !='')
        {
            $roomConfiguration = RoomsConfiguration::find($this->roomConfigurationId);


            $roomConfiguration->description = $this->description;
            $roomConfiguration->capacity = $this->capacity;
            $roomConfiguration->update();

            $this->resetInputFields();
            $this->emit('close-modal');
            $this->emit('alert',['type','success','message' => 'Línea de producción actualizado correctamente.']);
        }
    }

    public function delete($id)
    {
        $this->roomConfigurationId = $id;
    }

    public function destroy()
    {
        if ($this->roomConfigurationId !='')
        {
            FoodsRestriction::where('id','=',$this->roomConfigurationId)->delete();

            $this->resetInputFields();
            $this->emit('close-modal');
            $this->emit('alert', ['type', 'success', 'message' => 'Producto eliminado correctamente.']);
        }
    }

    public function resetInputFields()
    {
        $this->description = '';
        $this->capacity = '';
    }

    public function cancel()
    {
        $this->emit('close-modal');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetInputFields();
    }
}
