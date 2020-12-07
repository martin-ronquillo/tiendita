@if ($empty === 1)
    
    <div id="pregunta{{$pregunta->id}}" class="collapse show" aria-labelledby="pregunta{{$pregunta->id}}">
        <div class="card-body">
            <div class="row">

                <div class="col-12">
                    <span class="text-secondary" style="font-size: 11px;">
                        {{ $pregunta->users->name }} {{ $pregunta->users->apellido_pater }} ({{ $pregunta->users->email }})
                    </span>
                    <p class="mt-1">
                        <b>{{ $pregunta->pregunta }}</b>
                    </p>
                </div>

                <div class="col-12 mt-3">
                    <div class="row">
                        
                        <div class="col-8">
                            <textarea 
                            name="respuesta" 
                            cols="70" 
                            rows="2" 
                            wire:model.debounce.2000s="respuesta"
                            placeholder="Intenta responder con detalle a la pregunta" 
                            style="
                            border: solid 1px rgba(128, 128, 128, 0.342);
                            border-radius: 5px;
                            padding: 10px;
                            ">
                            </textarea>
                            <br>
                            @error('respuesta')
                                <span class="text-danger">{{ $message }}</span>
                                <br>
                            @enderror
                        </div>

                        <div class="col-4">
                            <button class="btn btn-primary btn-lg mt-2" wire:click="store({{$pregunta->id}})" style="margin-left: -60px;">
                                Responder
                            </button>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

@else
    
    <div id="pregunta{{$pregunta->id}}" class="collapse" aria-labelledby="pregunta{{$pregunta->id}}">
        <div class="card-body">
            <div class="row">

                <div class="col-12">
                    <span class="text-secondary" style="font-size: 11px;">
                        {{ $pregunta->users->name }} {{ $pregunta->users->apellido_pater }} ({{ $pregunta->users->email }})
                    </span>
                    <p class="mt-1">
                        <b>{{ $pregunta->pregunta }}</b>
                    </p>
                </div>

                <div class="col-12 mt-3">
                    <div class="row">
                        
                        <div class="col-8">
                            <textarea 
                            name="respuesta" 
                            cols="70" 
                            rows="2" 
                            wire:model.debounce.2000s="respuesta"
                            placeholder="Intenta responder con detalle a la pregunta" 
                            style="
                            border: solid 1px rgba(128, 128, 128, 0.342);
                            border-radius: 5px;
                            padding: 10px;
                            ">
                            </textarea>
                            <br>
                            @error('respuesta')
                                <span class="text-danger">{{ $message }}</span>
                                <br>
                            @enderror
                        </div>

                        <div class="col-4">
                            <button class="btn btn-primary btn-lg mt-2" wire:click="store({{$pregunta->id}})" style="margin-left: -60px;">
                                Responder
                            </button>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

@endif