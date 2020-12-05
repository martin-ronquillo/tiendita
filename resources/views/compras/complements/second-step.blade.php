<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="card">
        <div class="card-body">

            <div class="row">

                <div class="col-8">
                    <h3>¿Recomendarias al vendedor?</h3>
                    <br>
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="radio" name="tipo_usuario" id="exampleRadios4" value="Positivo">
                        <label class="form-check-label text-secondary" for="exampleRadios4">
                            Sí
                        </label>
                    </div>
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="radio" name="tipo_usuario" id="exampleRadios5" value="Neutral">
                        <label class="form-check-label text-secondary" for="exampleRadios5">
                            No estoy seguro
                        </label>
                    </div>
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="radio" name="tipo_usuario" id="exampleRadios6" value="Negativo">
                        <label class="form-check-label text-secondary" for="exampleRadios6">
                            No
                        </label>
                    </div>
                    <br>
                    <h4>Comparte tu opinión sobre el vendedor</h4>
                    <textarea name="opinion" cols="50" rows="3"></textarea>
                    <br>
                    <button type="submit" class="btn mr-3 text-light" wire:model="next" style="background-color: rgb(10, 10, 109);">
                        Continuar
                    </button>
                    <a href="javascript:history.back()" class="text-dark">Cancelar</a>
                </div>

                <div class="col-4">

                    <div class="card-body" style="background-color: rgba(128, 128, 128, 0.096); height: 200px;">

                        <div class="img-content-compras text-center">
                            <img class="img-compras" src="{{ $compras->productos->images->first()->url }}" alt="{{ $compras->productos->name }}">
                            <br>
                            <a href="{{ route('productos.show', $compras->productos->id) }}" target="_blank">{{ $compras->productos->name }}</a>
                            <br>
                            <p style="color: rgb(172, 11, 11);">U$S {{ $compras->productos->precio }}</p>
                            <em class="text-secondary">Vendedor: {{ $compras->productos->ventas->first()->users->name }} {{ $compras->productos->ventas->first()->users->apellido_pater }}</em>
                            <input type="hidden" name="user_opinion" value="{{ $compras->productos->ventas->first()->users->id }}">
                            <input type="hidden" name="user" value="{{ $compras->transaccions->first()->id }}">
                        </div>

                    </div>

                </div>

            </div>
            
        </div>
    </div>
</div>