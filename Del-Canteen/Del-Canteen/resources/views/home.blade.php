@extends('layouts.app')

@section('header')
<div class="gdlr-page-title-wrapper">
    <div class="gdlr-page-title-overlay"></div>
    <div class="gdlr-page-title-container container">
        <h1 class="gdlr-page-title">Menu Harian</h1>
    </div>
</div>
@endsection

@section('content')
<div class="with-sidebar-wrapper">
    <section id="content-section-1">
        <div class="gdlr-color-wrapper  gdlr-show-all no-skin" style="background-color: #ffffff; padding-top: 70px; padding-bottom: 5px; ">
            <div class="container">

                @for ($i=0; $i <= 1; $i++)
                    @if(isset($currentFoods[$i]))
                        <div class="three columns">
                            <div class="gdlr-item gdlr-content-item" style="margin-bottom: 55px;"></div>
                            <div class="gdlr-image-frame-item gdlr-item">
                                <div class="gdlr-frame frame-type-none">
                                    <div class="gdlr-image-link-shortcode">
                                        <img src="{{ $currentFoods[$i]->foto }}" alt="" width="250" height="250" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor



                <div class="six columns">
                    <div class="menu-item-wrapper menu-column-1 type-list" style="margin-bottom: 60px;" >
                        <div class="gdlr-item-title-wrapper gdlr-item  pos-left-divider gdlr-size-small ">
                            <div class="gdlr-item-title-head">
                                <h3 class="gdlr-item-title gdlr-skin-title gdlr-skin-border">Hari Ini <small>({{ date("d F Y") }})</small></h3>
                                <div class="gdlr-item-title-divider gdlr-right"></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="menu-item-holder">
                            <div class="gdlr-menu-list-wrapper">
                                @foreach ($currentFoods as $c)
                                    <div class="clear"></div>
                                    <div class="twelve columns">
                                        <div class="gdlr-menu-item gdlr-list-menu  with-price">
                                            <div class="gdlr-ux gdlr-list-menu-ux">
                                                <div class="gdlr-menu-item-content">
                                                    <h3 class="menu-title gdlr-skin-title gdlr-content-font">
                                                        {{ $c->nama }}
                                                    </h3>
                                                    <div class="menu-info menu-price gdlr-title-font gdlr-skin-link">
                                                        {{ $c->waktu }}
                                                    </div>
                                                    <div class="gdlr-list-menu-gimmick"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </section>


    @forelse ($arrTanggal as $a)

        @php
            if(sizeof($a->foods) <= 0) continue;
        @endphp

        <section id="content-section-2">
            <div class="gdlr-parallax-wrapper gdlr-background-image gdlr-show-all gdlr-skin-dark-skin" id="gdlr-parallax-wrapper-1" data-bgspeed="0.1" style="background-image: url('upload/bg-section-6.jpg'); padding-top: 170px; padding-bottom: 140px; ">
                <div class="container">
                    <div class="gdlr-item gdlr-content-item">
                        <h2 style="font-size: 75px; text-align: center;">{{ date('l, d F Y', strtotime($a->tanggal)) }}</h2>
                        <h5 style="text-align: center;">Pagi, Siang, dan Malam</h5>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </section>


        <section id="content-section-3">
            <div class="gdlr-color-wrapper  gdlr-show-all no-skin" style="background-color: #ffffff; padding-bottom: 25px; ">
                <div class="container">
                    <div class="menu-item-wrapper menu-column-3 type-classic" >
                        <div class="menu-item-holder">
                            <div class="gdlr-isotope" data-type="menu" data-layout="fitRows">

                                @foreach($a->foods as $f)
                                <div class="four columns">
                                    <div class="gdlr-item gdlr-menu-item gdlr-classic-menu with-price">
                                        <div class="gdlr-ux gdlr-classic-menu-ux">
                                            <div class="gdlr-menu-thumbnail">
                                                <a href="#"><img src="{{ $f->foto }}" alt="" width="400" height="300" /></a>
                                            </div>
                                            <div class="gdlr-menu-item-content">
                                                <h3 class="menu-title gdlr-skin-title gdlr-content-font">{{ $f->nama }}</h3>
                                                <div class="menu-info menu-ingredients-caption gdlr-skin-info"></div>
                                                {{-- <div class="menu-info menu-rating gdlr-skin-link"><i class="fa fa-star icon-star"></i><i class="fa fa-star icon-star"></i><i class="fa fa-star icon-star"></i><i class="fa fa-star icon-star"></i><i class="fa fa-star-half-full icon-star-half-full"></i></div> --}}
                                                <div class="menu-info menu-price gdlr-title-font gdlr-skin-link">{{ $f->waktu }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </section>


    @endforeach



</div>

@endsection
