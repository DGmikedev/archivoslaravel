
<div>
Modifier 	Description <br>
.live 	Send updates as a user types<br>
.blur 	Only send updates on the blur event<br>
.change 	Only send updates on the the change event<br>
.lazy 	An alias for .change<br>
.debounce.[?]ms 	Debounce the sending of updates by the specified millisecond delay<br>
.throttle.[?]ms 	Throttle network request updates by the specified millisecond interval<br>
.number 	Cast the text value of an input to int on the server<br>
.boolean 	Cast the text value of an input to bool on the server<br>
.fill 	Use the initial value provided by a "value" HTML attribute on page-load<br>
    <table>
        <tr>
            <td>USUARIO:</td>
            <td>{{ $msg }}</td>
        </tr>
                <tr>
            <td>
                {{ $txt }}
            </td>
            <!-- .live, .lazy .debounce.1s-->
            <td><input type="text" wire:model.blur="txt" /></td>
        </tr>
        <tr>
            <td>
                <select wire:model.change = "cambio">
                    <option value="1">valor 1</option>
                    <option value="2">valor 2</option>
                    <option value="4">valor 4</option>
                    <option value="3">valor 3</option>
                </select>
            </td>
            <td>{{ $cambio }}</td>
        </tr>
    </table>
    
</div>
