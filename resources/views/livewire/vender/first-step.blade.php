<div class="card shadow mb-4 h-100 w-100">

    <div class="card-body">

        <div class="col-md-12">
            <div class="form-group">
                <label class="mt-3">
                    <h5><b>Indica tu producto, marca y modelo</b></h5>
                    <em style="color: rgba(128, 128, 128, 0.733);">
                        Este será el título. Ten en cuenta que cuando tengas ventas, no podrás editarlo.
                    </em>
                </label>
                <input
                    class="form-control steps-input mt-5 mb-5"
                    type="text" 
                    name="name"
                    id="name"
                    wire:model="name"
                    required="required" 
                    placeholder="Ej: Celular Samsung Galaxy S9 64GB negro"
                >
                @error('name') 
                    <span class="error text-danger">{{ $message }}</span> 
                @enderror
            </div>
            <hr/>
            @if (@$next1)
                <a class="btn btn-primary float-right mt-3 step2" href="#second-step">Siguiente</a>
            @else
                <button class="btn btn-primary float-right mt-3" disabled>Siguiente</button>
            @endif
        </div>

    </div>

</div>