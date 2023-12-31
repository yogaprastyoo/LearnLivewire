<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{

    use WithPagination;


    #[Rule('required|min:3')]
    public $name = "";

    #[Rule('required|min:3')]
    public $description = "";

    public $search;

    public $editingTodoId;

    public $editingName;

    public $editingDesc;

    public function createNewTodo()
    {
        $this->validate();

        Todo::create([
            "name" => $this->name,
            "description" => $this->description,
        ]);

        $this->reset('name', 'description');
        session()->flash('success', 'Todo Created Successfully.');
    }

    public function delete($todoId)
    {
        Todo::find($todoId)->delete();
        session()->flash('successDelete', 'Todo Deleted Successfully');
    }

    public function toggle($todoId)
    {
        $todo = Todo::find($todoId);

        $todo->complated = !$todo->complated;

        $todo->save();
    }

    public function edit($todoId)
    {
        $this->editingTodoId = $todoId;
        $this->editingName = Todo::find($todoId)->name;
        $this->editingDesc = Todo::find($todoId)->description;
    }

    public function update()
    {
        $this->validate([
            "editingName" => 'required|min:3',
            "editingDesc" => 'required|min:3',
        ]);

        Todo::find($this->editingTodoId)->update([
            'name' => $this->editingName,
            'description' => $this->editingDesc
        ]);

        $this->reset('editingTodoId', 'editingName', 'editingDesc');
        session()->flash('success', 'Todo Updated Successfully');
    }

    public function cancelUpdate()
    {
        $this->reset('editingTodoId');
    }

    public function render()
    {
        $todos = Todo::latest()
            ->where('name', 'like', "%{$this->search}%")
            ->orWhere('description', 'like', "%{$this->search}%")
            ->paginate(5);
        return view('livewire.TodoList.todo-list', [
            "todos" => $todos
        ]);
    }
}
