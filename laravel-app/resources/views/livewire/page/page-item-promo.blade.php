<div>
    <div id="generic_price_table">
        <section>
            <div class="container">

                <!--BLOCK ROW START-->
                <div class="row">
                    @foreach ($promo as $item)
                        <div class="col-md-4">

                            <!--PRICE CONTENT START-->
                            <div class="generic_content active clearfix">

                                <!--HEAD PRICE DETAIL START-->
                                <div class="generic_head_price clearfix">

                                    <!--HEAD CONTENT START-->
                                    <div class="generic_head_content clearfix">

                                        <!--HEAD START-->
                                        <div class="head_bg"></div>
                                        <div class="head">
                                            <span>Promo</span>
                                        </div>
                                        <!--//HEAD END-->

                                    </div>
                                    <!--//HEAD CONTENT END-->

                                    <!--PRICE START-->
                                    <div class="generic_price_tag clearfix">
                                        <span class="price">
                                            <span class="sign">Promo</span>
                                            <span class="currency">{{$item->promo_nominal}}</span>
                                            <span class="cent">.99</span>
                                            <span class="month">{{$item->promo_persen}}</span>
                                        </span>
                                    </div>
                                    <!--//PRICE END-->

                                </div>
                                <!--//HEAD PRICE DETAIL END-->

                                <!--//FEATURE LIST END-->

                                <!--BUTTON START-->
                                <div class="generic_price_btn clearfix">
                                    <a class="" href="">{{$item->kode_promo}}</a>
                                </div>
                                <!--//BUTTON END-->

                            </div>
                            <!--//PRICE CONTENT END-->

                        </div>
                    @endforeach
                </div>
                <!--//BLOCK ROW END-->

            </div>
        </section>
    </div>
</div>
