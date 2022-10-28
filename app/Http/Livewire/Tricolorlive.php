<?php

namespace App\Http\Livewire;

use App\Events\TaskFinished;
use App\Http\Controllers\TricolorController;
use App\Models\Tricolor;
use Livewire\Component;

class Tricolorlive extends Component
{
    public $tricolor;
    public $start = false;
    public $count = 60;

    protected $listeners = ['echo:TaskTricolor,.task-finish' => 'eventlisten'];

    // public function getListeners(){
    //     return [
    //         'echo:TaskTricolor,TaskFinished' => 'eventlisten'
    //     ];
    // }

    public function start(){
        $this->start = true;
        $tricolors = new TricolorController();
        $this->tricolor = $tricolors->start();
    }

    public function stop(){
        $this->start = false;
        $tricolors = new TricolorController();
        $this->tricolor = $tricolors->stop();
    }

    public function refresh(){
        $tricolors = new TricolorController();
        $this->tricolor = $tricolors->start();
    }

    public function eventlisten(){
        $this->count = 60;
        $tricolors = new TricolorController();
        $this->tricolor = $tricolors->all();
        // $this->refresh();
    }

    public function discount(){
        if($this->count > 0 && $this->start == true){
            $this->count = $this->count - 1;
        }
    }


    public function red(){

    }

    public function green(){
        
    }

    public function yellow(){
        
    }

    public function mount($tricolor){
        $this->tricolor = $tricolor;
        if($this->start == false){
            $tricolors = new TricolorController();
            $this->tricolor = $tricolors->stop();
        }
    }

    public function render()
    {
        return view('livewire.tricolorlive');
    }
}
