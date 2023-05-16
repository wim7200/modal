public $name;

protected $listeners = [
'RoleUpdate',
];

protected function rules()
{
return[
'name'=>'required',
];
}
public function mount (Role $role)
{
$this->role=$role;
$this->name=$role->name;
}
public function render()
{
return view('livewire.role.role-edit');
}

public function RoleUpdate()
{
$this->validate([
'name'=>'required',
]);

$this->role->update([
'name'=>$this->name,
]);

session()->flash('message','Role updated succesfully');
return redirect()->to('/role');
}
