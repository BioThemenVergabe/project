<span id="close_open_button">
    @if($status=="open")
        <button id="wahl_schliessen_button" type="button"
                class="btn btn-primary btn-block icon icon-block"
                data-toggle="modal" data-target="#Wahl_schließen" onclick="toggle()"> @lang('fields.closeElect')
        </button>
    @else
        <button id="wahl_öffnen_button" type="button"
                class="btn btn-primary btn-block icon icon-controller-play"
                data-toggle="modal" data-target="#Wahl_öffnen" onclick="toggle()"> @lang('fields.openElect')
        </button>
    @endif
</span>