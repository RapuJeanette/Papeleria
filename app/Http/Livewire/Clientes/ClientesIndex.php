<?php

namespace App\Http\Livewire\Clientes;

use App\Models\Clientes;
use Livewire\Component;
use Livewire\WithPagination;

class ClientesIndex extends Component
{
    use WithPagination;
    public $clientesindex, $ci_cliente, $nit_cliente, $nombre, $apellido, $email, $cel;
    public $isOpen = 0;
    public $buscar;

    public function crear()
    {
        $this->validate([
            'nit_cliente' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'cel' => 'required',
        ]);
        Clientes::create([
            'nit_cliente' => $this->nit_cliente,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'email' => $this->email,
            'cel' => $this->cel
        ]);
        session()->flash('message', $this->ci_cliente ? 'Cliente actualizado exitosamente' : 'Clientes creado existosamente');
        $this->closeModal();
        $this->resetInputFields();
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
        $this->ci_cliente = '';
        $this->nit_cliente = '';
        $this->nombre = '';
        $this->apellido = '';
        $this->email = '';
        $this->cel = '';
    }
    public function render()
    {
        $this->clientesindex = Clientes::all();
        return view('livewire..clientes.clientes-index');
    }
}
