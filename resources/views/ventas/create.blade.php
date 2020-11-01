@extends('layouts.app')

@section('title', 'Publicar')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/vender.css') }}">
@endsection

@section('content')
    
    <div class="container h-100">
        
        <div class="row justify-content-center h-100">
            
            <div class="col-2 mt-4">

            </div>
            <div class="col-5 mt-4 align-self-center">
                <h1>Empecemos completando algunos datos</h1>
            </div>
            <div class="col-4 mt-4">
                <img src="{{ asset('images/zapato_venta.gif') }}" alt="">
            </div>

            <div class="col-12 mt-5">
                @livewire('vender-component')
            </div>

        </div>
        {{--
        <!-- Grid row -->
            <div class="row mt-4 pt-5 d-flex justify-content-center">

                <!-- Grid column -->
                <div class="col-md-2 pl-5 pl-md-0 pb-5">

                <!-- Stepper -->
                    <div class="steps-form-3">
                        <div class="steps-row-3 setup-panel-3 d-flex justify-content-between">
                            <div class="steps-step-3">
                                <a href="#step-5" type="button" class="btn btn-info btn-circle-3 waves-effect ml-0" data-toggle="tooltip" data-placement="top" title="Basic Information"><i class="fa fa-folder-open-o" aria-hidden="true"></i></a>
                            </div>
                            <div class="steps-step-3">
                                <a href="#step-6" type="button" class="btn btn-pink btn-circle-3 waves-effect p-3" data-toggle="tooltip" data-placement="top" title="Basic Information"><i class="fa fa-user" aria-hidden="true"></i></a>
                            </div>
                            <div class="steps-step-3">
                                <a href="#step-7" type="button" class="btn btn-pink btn-circle-3 waves-effect" data-toggle="tooltip" data-placement="top" title="Basic Information"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                            <div class="steps-step-3 no-height">
                                <a href="#step-8" type="button" class="btn btn-pink btn-circle-3 waves-effect p-3" data-toggle="tooltip" data-placement="top" title="Basic Information"><i class="fa fa-check" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-9">

                    <div class="card shadow mb-4">

                        <div class="card-body">

                            <form role="form" action="" method="post">


                                <!-- First Step 
                                <div class="row setup-content-3" id="step-5">
                                    <div class="col-md-12">
                                        <div class="form-group md-form">
                                            <label for="yourEmail-3" data-error="wrong" data-success="right">
                                                <h5><b>Indica tu producto, marca y modelo</b></h5>
                                                <em style="color: rgba(128, 128, 128, 0.733);">
                                                    Este será el título. Ten en cuenta que cuando tengas ventas, no podrás editarlo.
                                                </em>
                                            </label>
                                            <input id="yourEmail-3" type="email" required="required" class="form-control validate">
                                        </div>
                                        <button class="btn btn-primary nextBtn-3 float-right" type="button">Siguiente</button>
                                    </div>
                                </div>-->

                                <!-- First Step -->
                                <div class="row setup-content-3" id="step-5">
                                    <div class="col-md-12">
                                        <h3 class="font-weight-bold pl-0 my-4"><strong>Informacion Basica</strong></h3>
                                        <div class="form-group md-form">
                                            <label for="yourUsername-3" data-error="wrong" data-success="right">Username</label>
                                            <input id="yourUsername-3" type="text" required="required" class="form-control validate">
                                        </div>
                                        <div class="form-group md-form mt-3">
                                            <label for="yourPassword-3" data-error="wrong" data-success="right">Password</label>
                                            <input id="yourPassword-3" type="password" required="required" class="form-control validate">
                                        </div>
                                        <div class="form-group md-form mt-3">
                                            <label for="repeatPassword-3" data-error="wrong" data-success="right">Repeat Password</label>
                                            <input id="repeatPassword-3" type="password" required="required" class="form-control validate">
                                        </div>
                                        <button class="btn btn-mdb-color btn-rounded nextBtn-3 float-right" type="button">Siguiente</button>
                                    </div>
                                </div>

                                <!-- Second Step -->
                                <div class="row setup-content-3" id="step-6">
                                    <div class="col-md-12">
                                        <h3 class="font-weight-bold pl-0 my-4"><strong>Personal Data</strong></h3>
                                        <div class="form-group md-form">
                                            <label for="yourName-3" data-error="wrong" data-success="right">First Name</label>
                                            <input id="yourName-3" type="text" required="required" class="form-control validate">
                                        </div>
                                        <div class="form-group md-form mt-3">
                                            <label for="secondName-3" data-error="wrong" data-success="right">Second Name</label>
                                            <input id="secondName-3" type="text" required="required" class="form-control validate">
                                        </div>
                                        <div class="form-group md-form mt-3">
                                            <label for="yourAddress-3" data-error="wrong" data-success="right">Address</label>
                                            <textarea id="yourAddress-3" type="text" required="required" rows="2" class="md-textarea validate form-control"></textarea>
                                        </div>
                                        <button class="btn btn-mdb-color btn-rounded prevBtn-3 float-left" type="button">Volver</button>
                                        
                                        <button class="btn btn-mdb-color btn-rounded nextBtn-3 float-right" type="button">Siguiente</button>
                                    </div>
                                </div>


                                <!-- Third Step -->
                                <div class="row setup-content-3" id="step-7">
                                    <div class="col-md-12">
                                        <h3 class="font-weight-bold pl-0 my-4"><strong>Terms and conditions</strong></h3>
                                        <div class="form-check">
                                            <input type="checkbox" id="checkbox115" class="form-check-input">
                                            <label for="checkbox115" class="form-check-label">I agree to the terms and conditions</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" id="checkbox114" class="form-check-input">
                                            <label for="checkbox114" class="form-check-label">I want to receive newsletter</label>
                                        </div>
                                        <button class="btn btn-mdb-color btn-rounded prevBtn-3 float-left" type="button">Volver</button>
                                        <button class="btn btn-mdb-color btn-rounded nextBtn-3 float-right" type="button">Siguiente</button>
                                    </div>
                                </div>


                                <!-- Fourth Step -->
                                <div class="row setup-content-3" id="step-8">
                                    <div class="col-md-12">
                                        <h3 class="font-weight-bold pl-0 my-4"><strong>Finish</strong></h3>
                                        <h2 class="text-center font-weight-bold my-4">Registration completed!</h2>
                                        <button class="btn btn-mdb-color btn-rounded prevBtn-3 float-left" type="button">Volver</button>
                                        <button class="btn btn-success btn-rounded float-right" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                    
                        </div>

                    </div>

                </div>
                <!-- Grid column -->

            </div>
        <!-- Grid row -->
        --}}
    </div>

@endsection