@extends('layouts.child')
@section('content')

    <div id="content" style=" direction :@if(\Illuminate\Support\Facades\Session::get('local') == 'en') ltr @else rtl @endif " >

        <!-- Testimonials

        ============================================= -->
        <section class="padding-100" >
            <div class="container" id="printableArea">
                <div class="row">
                    <article class="blank-page">
            <span class="alert alert-danger text-center ">{{__('menu.receipt_empty_message')}}</span>
                    </article>
                </div>
            </div>

        </section>




    @endsection
