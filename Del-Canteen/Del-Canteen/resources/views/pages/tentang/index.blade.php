@extends('layouts.app')


@section('header')
    <div class="gdlr-page-title-wrapper">
        <div class="gdlr-page-title-overlay"></div>
        <div class="gdlr-page-title-container container">
            <h1 class="gdlr-page-title">Tentang</h1>
        </div>
    </div>
@endsection


@section('content')
    <div class="with-sidebar-wrapper">
        <section id="content-section-1">
            <div class="gdlr-color-wrapper  gdlr-show-all no-skin"
                style="background-color: #ffffff; padding-top: 70px; padding-bottom: 5px; ">
                <div class="container">


                    <div class="twelve columns">
                        <div class="gdlr-feature-media-ux gdlr-ux">
                            <div class="gdlr-item gdlr-feature-media-item gdlr-left" style="margin-bottom: 80px;">
                                <div class="feature-media-content-wrapper">
                                    <div class="gdlr-item-title-wrapper gdlr-item  pos-left gdlr-size-small ">
                                        <div class="gdlr-item-title-head">
                                            <h3 class="gdlr-item-title gdlr-skin-title gdlr-skin-border">Tentang Kami</h3>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="feature-media-content">
                                        <p>
                                            Kantin Del merupakan tempat yang disediakan oleh Institut Teknologi Del kepada mahasiswa, dosen, dan sivitas DEL sebagai tempat untuk makan baik pagi, siang , dan malam. Kantin Del dikelola langsung oleh Chef yang professional dan juga menghasilkan makanan yang sehat dan bergizi. Makanan yang tersedia di Kantin Del juga sudah melewati berbagai test kelayakan makanan yang ingin dikonsumsi. Adapun pelayan kantin Del sejumlah kurang lebih 30 orang . Setiap mahasiswa diwajibkan untuk makan di kantin tiga kali setiap harinya.
                                        </p>
                                        <div>
                                            Dalam pelaksanaan makan, mahasiswa dilatih juga untuk memiliki manner. Etika makan yang berlaku adalah sebagai berikut:
                                            <ol type="a">
                                                <li>Mahasiswa berpakaian rapi dan bersih.</li>
                                                <li>Mengikuti tata cara makan yang baik (table manner)</li>
                                                <li>Menggunakan sendok dan garpu.</li>
                                                <li>Mulut tertutup rapat pada saat mengunyah makanan.</li>
                                                <li>Tidak menimbulkan bunyi dari peralatan makan.</li>
                                                <li>Berbicara sewajarnya ( tidak terlalu keras sehingga tidak mengganggu orang lain).</li>
                                                <li>Mengambil makanan secukupnya dan menghabiskannya tanpa sisa.</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="three columns">
                        <div class="gdlr-skill-item-wrapper gdlr-skin-content gdlr-item">
                            <div class="gdlr-skill-item-title">{{ $total_makanan }}</div>
                            <div class="gdlr-skill-item-caption">Menu</div>
                        </div>
                    </div>
                    <div class="three columns">
                        <div class="gdlr-skill-item-wrapper gdlr-skin-content gdlr-item">
                            <div class="gdlr-skill-item-title">{{ $total_mahasiswa }}</div>
                            <div class="gdlr-skill-item-caption">Mahasiswa</div>
                        </div>
                    </div>
                    <div class="three columns">
                        <div class="gdlr-skill-item-wrapper gdlr-skin-content gdlr-item">
                            <div class="gdlr-skill-item-title">{{ $total_keasramaan }}</div>
                            <div class="gdlr-skill-item-caption">Keasramaan</div>
                        </div>
                    </div>
                    <div class="three columns">
                        <div class="gdlr-skill-item-wrapper gdlr-skin-content gdlr-item">
                            <div class="gdlr-skill-item-title">{{ $total_staff }}</div>
                            <div class="gdlr-skill-item-caption">Staff kantin</div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <br>
                    <br>

                </div>
            </div>
        </section>
    </div>
@endsection