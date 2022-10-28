<div>
    <h1>Hello</h1>
    @if ($start)
        <button wire:click="stop">stop</button>
    @else
        <button wire:click="start">start</button>
    @endif
    
    <table>
        @foreach ($tricolor as $index => $item)
           <tr>
               <td style="width: 100px; height: 50px; text-align: center; ">side {{ $index + 1 }}</td>
               <td style="width: 100px; height: 50px; text-align: center; background-color: red">{{ $item->red }}</td>
               <td style="width: 100px; height: 50px; text-align: center; background-color: yellow">{{ $item->yellow }}</td>
               <td style="width: 100px; height: 50px; text-align: center; background-color: green">{{ $item->green }}</td>
           </tr>
        @endforeach
    </table>

    <div wire:poll.1000ms="discount">
        {{ $count }}
    </div>
</div>
