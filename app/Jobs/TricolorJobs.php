<?php

namespace App\Jobs;

use App\Events\TaskFinished;
use App\Models\Tricolor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TricolorJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $status;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($status)
    {
        $this->status = $status;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $tricolor = Tricolor::all();
        $index = count($tricolor); // total tricolor
        $i = 0; // init index
        $datas = array(); // tmp data

        while($i < $index){
            $item = $tricolor[$i];

            if($i < $index - 1){
                $next = $i + 1;
            }else{
                $next = 0;
            }

            $next_item = $tricolor[$next];

            if($i % 2 == 0){
                if($item->green == 1 && $next_item->red == 1){
                    $data = array(
                        "green" => 0,
                        "yellow" => 1,
                        "red" => 0
                    );
                }

                if($item->yellow == 1 && $next_item->red == 1){
                    $data = array(
                        "green" => 0,
                        "yellow" => 0,
                        "red" => 1
                    );
                }

                if($item->red == 1 && $next_item->green == 1){
                    $data = array(
                        "green" => $item->green,
                        "yellow" => $item->yellow,
                        "red" => $item->red
                    );
                }

                if($item->red == 1 && $next_item->yellow == 1){
                    $data = array(
                        "green" => 1,
                        "yellow" => 0,
                        "red" => 0
                    );
                }
                
                
            }else{
                if($item->green == 1 && $next_item->red == 1){
                    $data = array(
                        "green" => 0,
                        "yellow" => 1,
                        "red" => 0
                    );
                }

                if($item->yellow == 1 && $next_item->red == 1){
                    $data = array(
                        "green" => 0,
                        "yellow" => 0,
                        "red" => 1
                    );
                }

                if($item->red == 1 && $next_item->green == 1){
                    $data = array(
                        "green" => $item->green,
                        "yellow" => $item->yellow,
                        "red" => $item->red
                    );
                }

                if($item->red == 1 && $next_item->yellow == 1){
                    $data = array(
                        "green" => 1,
                        "yellow" => 0,
                        "red" => 0
                    );
                }
            }

            array_push($datas, $data);

            $i++;
        }

        foreach($tricolor as $key => $item){
            $item->update($datas[$key]);
        }
        TricolorJobs::dispatch('status')->delay(now()->addMinutes(1));
        event(new TaskFinished());
    }
}
