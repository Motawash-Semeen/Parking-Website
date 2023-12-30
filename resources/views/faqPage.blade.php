@extends('master')
@section('frontend.content')
    @include('frontend.partials.secondHead')
    <style>
        .acrodion-img {
            background-image: url('frontend/assets/img/faq.png');
            background-repeat: no-repeat;
            background-position: center;
            width: 100%;
            height: 350px;
        }
    </style>
    <div class="acrodion-img">
    </div>

    <!-- resources/views/faqs.blade.php -->
<div class="accordion container mb-5" id="accordionExample">
    @foreach($faqs as $faq)
        <div class="accordion-item rounded-3 mt-4">
            <h2 class="accordion-header">
                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }} rounded-3" 
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $loop->iteration }}" 
                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}" 
                        aria-controls="collapse{{ $loop->iteration }}">
                    {{ $faq->question }}
                </button>
            </h2>
            <div id="collapse{{ $loop->iteration }}" 
                 class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" 
                 data-bs-parent="#accordionExample">
                <hr class="my-0 mx-3">
                <div class="accordion-body">
                    {{ $faq->answer }}
                </div>
            </div>
        </div>
    @endforeach
</div>

    @include('frontend.partials.contact')
@endsection
