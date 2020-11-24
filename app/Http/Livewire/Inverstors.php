<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Inverstor;

class Inverstors extends Component
{
    public $inverstors, $name, $email, $inverstor_id;
    public $isOpen = 0;
    public function render()
    {
        $this->inverstors = Inverstor::all();
        return view('livewire.inverstors');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->inverstor_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => ['required','email', 'unique:inverstor,email,{$inverstor_id}'],
        ]);

        Inverstor::updateOrCreate(['id' => $this->inverstor_id],[
            'name' => $this->name,
            'email' => $this->email
        ]);

        session()->flash('message', $this->inverstor_id ? 'Inverstor Updated Successfully.' : 'Investor Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $inverstor = Inverstor::findOrFail($id);
        $this->inverstor_id = $id;
        $this->name = $inverstor->name;
        $this->email = $inverstor->email;

        $this->openModal();
    }

    public function delete($id)
    {
        Inverstor::find($id)->delete();
        session()->flash('message', 'Inverstor Deleted Successfully.');
    }
}
