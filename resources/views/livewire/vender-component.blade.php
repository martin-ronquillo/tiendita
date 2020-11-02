<div>
    {{--Row--}}
    <div class="row">

        <div class="col-2">

        </div>
        <div class="col-8">
            <form role="form" name="demoform" id="demoform" action="{{ route('ventas.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                
                <!-- First Step -->
                @include('livewire.vender.first-step')
                <div class="mb-5"></div>

                <!-- Second Step -->
                @include('livewire.vender.second-step')
                <div class="mb-5"></div>

                <!-- Third Step -->
                @include('livewire.vender.third-step')
                <div class="mb-5"></div>
                
                <!-- fourth Step -->
                @include('livewire.vender.fourth-step')
                <div class="mb-5"></div>

                <!-- fifth Step -->
                @include('livewire.vender.fifth-step')
                
            </form>
        </div>

    </div>
    {{--!Row--}}
</div>