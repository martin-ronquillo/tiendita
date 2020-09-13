<p>
    <div 
    class="row responder" 
    id="oculto"
    >
        <div class="col-9">
            <textarea 
            wire:model="pregunta"
            placeholder="Escribe una respuesta..." 
            class="form-control"
            style="height: 38px;"
            >
            </textarea>
        </div>
        <div class="col-3">
            <button 
            wire:click="store"
            class="btn btn-primary btn-md"
            >
                Responder
            </button>
        </div>

    </div>
</p>