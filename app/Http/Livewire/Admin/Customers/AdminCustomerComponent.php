<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Country;
use App\Customer;
use Livewire\Component;

class AdminCustomerComponent extends Component
{
    public $name, $phone, $address, $countryId ;

    public $customerId;

    protected function rules()
    {
        return[
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'countryId' => 'required',
        ];

    }

    public function render()
    {
        $countries = Country::all();
        $customers = Customer::select('customers.*', 'countries.name as name_customer')
        ->leftjoin('countries','countries.id', '=', 'customers.country_id')->get();
        return view('livewire.admin.customers.admin-customer-component',[
            
            'countries' => $countries,
            'customers' => $customers
        ]);
    }

    public function store()
    {
        $this->validate();

        $customer = new Customer();

        $customer->name = $this->name;
        $customer->phone = $this->phone;
        $customer->address = $this->address;
        $customer->country_id = $this->countryId;
        /* dd($customer); */
        $customer->save();

        $this->resetInputFields();
        $this->emit('close-modal');
        $this->emit('alert',['type','success','message'=> 'Línea de producción creada correctamente.']);
    }

    public function edit ($id)
    {
        $this->customerId = $id;
        $customer = Customer::find($this->customerId);

        $this->name = $customer->name;
        $this->phone = $customer->phone;
        $this->address = $customer->address;
        $this->countryId = $customer->country_id;
    }

    public function update()
    {
        $this->validate();

        if ($this->customerId !='')
        {
            $customer = Customer::find($this->customerId);


            $customer->name = $this->name;
            $customer->phone = $this->phone;
            $customer->address = $this->address;
            $customer->country_id = $this->countryId;
            $customer->update();

            $this->resetInputFields();
            $this->emit('close-modal');
            $this->emit('alert',['type','success','message' => 'Línea de producción actualizado correctamente.']);
        }
    }

    public function delete($id)
    {
        $this->customerId = $id;
    }

    public function destroy()
    {
        if ($this->customerId !='')
        {
            Customer::where('id','=',$this->customerId)->delete();

            $this->resetInputFields();
            $this->emit('close-modal');
            $this->emit('alert', ['type', 'success', 'message' => 'Producto eliminado correctamente.']);
        }
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->phone = '';
        $this->address = '';
        $this->countryId = '';
    }

    public function cancel()
    {
        $this->emit('close-modal');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetInputFields();
    }

}
