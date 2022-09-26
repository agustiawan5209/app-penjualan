<?php

namespace App\Http\Livewire\Setting;

use App\Models\Slide;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class SlideSetting extends Component
{
    use WithFileUploads;
    public $itemAdd = false,
        $itemEdit = false,
        $itemDelete = false;
    public $deskripsi, $thumbnail, $slide, $itemID;
    public function clearAll()
    {
        $this->itemAdd = false;
        $this->itemEdit = false;
        $this->itemDelete = false;
        $this->deskripsi = null;
        $this->thumbnail = null;
        $this->slide = null;
        $this->itemID = null;
    }
    public function render()
    {
        $slide_table = Slide::all();
        return view('livewire.setting.slide-setting', compact('slide_table'));
    }

    public function addModal()
    {
        $this->itemAdd = true;
    }

    public function create()
    {
        $slide = $this->validate([
            'slide' => ['required'],
            'deskripsi' => ['required', 'string'],
            'thumbnail' => ['required', 'image', 'mimes:jpg,png,jpeg'],
        ]);
        $randomName = 'slide-' . $this->thumbnail->getClientOriginalName();
        $slide = array_replace($slide, ['thumbnail' => $randomName]);
        // dd($slide);
        $this->thumbnail->storeAs('upload', $randomName);
        Slide::create($slide);
        Alert::success('Info', 'Berhasil Di Tambah');
        $this->clearAll();
    }
    public function editModal($id)
    {
        $slide = Slide::find($id);
        $this->deskripsi = $slide->deskripsi;
        $this->slide = $slide->slide;
        $this->thumbnail = $slide->thumbnail;
        $this->itemID = $id;
        $this->itemEdit = true;
    }

    public function edit($id)
    {
        $slide = $this->validate([
            'slide' => ['required'],
            'thumbnail' => ['required', 'image'],
            'deskripsi' => ['required', 'string'],
        ]);
        $randomName = 'slide-' . $this->thumbnail->getClientOriginalName();
        $slide = array_replace($slide, ['thumbnail' => $randomName]);
        // dd($slide);
        $this->thumbnail->storeAs('upload', $randomName);
        Slide::find($id)->update($slide);
        Alert::success('Info', 'Berhasil Di Edit');
        $this->clearAll();
    }
    public function deleteModal($id)
    {
        $this->itemID = $id;
        $this->itemDelete = true;
    }

    public function delete($id)
    {
        Slide::find($id)->delete();
        Alert::success('Info', 'Berhasil Di Hapus');
        $this->clearAll();
    }
}
