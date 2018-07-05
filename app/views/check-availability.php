<?php $prefix = 'gg_'; ?>
<style>
<?php echo file_get_contents( RUTA_PLUGIN_BOOKING . 'app/css/booking-system-common-styles.css', true ); ?>
/*! * Datepicker for Bootstrap v1.6.4 (https://github.com/eternicode/bootstrap-datepicker) */
.datepicker{padding:4px;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;direction:ltr}.datepicker-inline{width:220px}.datepicker.datepicker-rtl{direction:rtl}.datepicker.datepicker-rtl table tr td span{float:right}.datepicker-dropdown{top:0;left:0}.datepicker-dropdown:before{content:'';display:inline-block;border-left:7px solid transparent;border-right:7px solid transparent;border-bottom:7px solid #999;border-top:0;border-bottom-color:rgba(0,0,0,.2);position:absolute}.datepicker-dropdown:after{content:'';display:inline-block;border-left:6px solid transparent;border-right:6px solid transparent;border-bottom:6px solid #fff;border-top:0;position:absolute}.datepicker-dropdown.datepicker-orient-left:before{left:6px}.datepicker-dropdown.datepicker-orient-left:after{left:7px}.datepicker-dropdown.datepicker-orient-right:before{right:6px}.datepicker-dropdown.datepicker-orient-right:after{right:7px}.datepicker-dropdown.datepicker-orient-bottom:before{top:-7px}.datepicker-dropdown.datepicker-orient-bottom:after{top:-6px}.datepicker-dropdown.datepicker-orient-top:before{bottom:-7px;border-bottom:0;border-top:7px solid #999}.datepicker-dropdown.datepicker-orient-top:after{bottom:-6px;border-bottom:0;border-top:6px solid #fff}.datepicker table{margin:0;-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.datepicker td,.datepicker th{text-align:center;width:20px;height:20px;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;border:none}.table-striped .datepicker table tr td,.table-striped .datepicker table tr th{background-color:transparent}.datepicker table tr td.day.focused,.datepicker table tr td.day:hover{background:#eee;cursor:pointer}.datepicker table tr td.new,.datepicker table tr td.old{color:#999}.datepicker table tr td.disabled,.datepicker table tr td.disabled:hover{background:0 0;color:#999;cursor:default}.datepicker table tr td.highlighted{background:#d9edf7;border-radius:0}.datepicker table tr td.today,.datepicker table tr td.today.disabled,.datepicker table tr td.today.disabled:hover,.datepicker table tr td.today:hover{background-color:#fde19a;background-image:-moz-linear-gradient(to bottom,#fdd49a,#fdf59a);background-image:-ms-linear-gradient(to bottom,#fdd49a,#fdf59a);background-image:-webkit-gradient(linear,0 0,0 100%,from(#fdd49a),to(#fdf59a));background-image:-webkit-linear-gradient(to bottom,#fdd49a,#fdf59a);background-image:-o-linear-gradient(to bottom,#fdd49a,#fdf59a);background-image:linear-gradient(to bottom,#fdd49a,#fdf59a);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fdd49a', endColorstr='#fdf59a', GradientType=0);border-color:#fdf59a #fdf59a #fbed50;border-color:rgba(0,0,0,.1) rgba(0,0,0,.1) rgba(0,0,0,.25);filter:progid:DXImageTransform.Microsoft.gradient(enabled=false);color:#000}.datepicker table tr td.today.active,.datepicker table tr td.today.disabled,.datepicker table tr td.today.disabled.active,.datepicker table tr td.today.disabled.disabled,.datepicker table tr td.today.disabled:active,.datepicker table tr td.today.disabled:hover,.datepicker table tr td.today.disabled:hover.active,.datepicker table tr td.today.disabled:hover.disabled,.datepicker table tr td.today.disabled:hover:active,.datepicker table tr td.today.disabled:hover:hover,.datepicker table tr td.today.disabled:hover[disabled],.datepicker table tr td.today.disabled[disabled],.datepicker table tr td.today:active,.datepicker table tr td.today:hover,.datepicker table tr td.today:hover.active,.datepicker table tr td.today:hover.disabled,.datepicker table tr td.today:hover:active,.datepicker table tr td.today:hover:hover,.datepicker table tr td.today:hover[disabled],.datepicker table tr td.today[disabled]{background-color:#fdf59a}.datepicker table tr td.today.active,.datepicker table tr td.today.disabled.active,.datepicker table tr td.today.disabled:active,.datepicker table tr td.today.disabled:hover.active,.datepicker table tr td.today.disabled:hover:active,.datepicker table tr td.today:active,.datepicker table tr td.today:hover.active,.datepicker table tr td.today:hover:active{background-color:#fbf069\9}.datepicker table tr td.today:hover:hover{color:#000}.datepicker table tr td.today.active:hover{color:#fff}.datepicker table tr td.range,.datepicker table tr td.range.disabled,.datepicker table tr td.range.disabled:hover,.datepicker table tr td.range:hover{background:#eee;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0}.datepicker table tr td.range.today,.datepicker table tr td.range.today.disabled,.datepicker table tr td.range.today.disabled:hover,.datepicker table tr td.range.today:hover{background-color:#f3d17a;background-image:-moz-linear-gradient(to bottom,#f3c17a,#f3e97a);background-image:-ms-linear-gradient(to bottom,#f3c17a,#f3e97a);background-image:-webkit-gradient(linear,0 0,0 100%,from(#f3c17a),to(#f3e97a));background-image:-webkit-linear-gradient(to bottom,#f3c17a,#f3e97a);background-image:-o-linear-gradient(to bottom,#f3c17a,#f3e97a);background-image:linear-gradient(to bottom,#f3c17a,#f3e97a);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f3c17a', endColorstr='#f3e97a', GradientType=0);border-color:#f3e97a #f3e97a #edde34;border-color:rgba(0,0,0,.1) rgba(0,0,0,.1) rgba(0,0,0,.25);filter:progid:DXImageTransform.Microsoft.gradient(enabled=false);-webkit-border-radius:0;-moz-border-radius:0;border-radius:0}.datepicker table tr td.range.today.active,.datepicker table tr td.range.today.disabled,.datepicker table tr td.range.today.disabled.active,.datepicker table tr td.range.today.disabled.disabled,.datepicker table tr td.range.today.disabled:active,.datepicker table tr td.range.today.disabled:hover,.datepicker table tr td.range.today.disabled:hover.active,.datepicker table tr td.range.today.disabled:hover.disabled,.datepicker table tr td.range.today.disabled:hover:active,.datepicker table tr td.range.today.disabled:hover:hover,.datepicker table tr td.range.today.disabled:hover[disabled],.datepicker table tr td.range.today.disabled[disabled],.datepicker table tr td.range.today:active,.datepicker table tr td.range.today:hover,.datepicker table tr td.range.today:hover.active,.datepicker table tr td.range.today:hover.disabled,.datepicker table tr td.range.today:hover:active,.datepicker table tr td.range.today:hover:hover,.datepicker table tr td.range.today:hover[disabled],.datepicker table tr td.range.today[disabled]{background-color:#f3e97a}.datepicker table tr td.range.today.active,.datepicker table tr td.range.today.disabled.active,.datepicker table tr td.range.today.disabled:active,.datepicker table tr td.range.today.disabled:hover.active,.datepicker table tr td.range.today.disabled:hover:active,.datepicker table tr td.range.today:active,.datepicker table tr td.range.today:hover.active,.datepicker table tr td.range.today:hover:active{background-color:#efe24b\9}.datepicker table tr td.selected,.datepicker table tr td.selected.disabled,.datepicker table tr td.selected.disabled:hover,.datepicker table tr td.selected:hover{background-color:#9e9e9e;background-image:-moz-linear-gradient(to bottom,#b3b3b3,grey);background-image:-ms-linear-gradient(to bottom,#b3b3b3,grey);background-image:-webkit-gradient(linear,0 0,0 100%,from(#b3b3b3),to(grey));background-image:-webkit-linear-gradient(to bottom,#b3b3b3,grey);background-image:-o-linear-gradient(to bottom,#b3b3b3,grey);background-image:linear-gradient(to bottom,#b3b3b3,grey);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#b3b3b3', endColorstr='#808080', GradientType=0);border-color:grey grey #595959;border-color:rgba(0,0,0,.1) rgba(0,0,0,.1) rgba(0,0,0,.25);filter:progid:DXImageTransform.Microsoft.gradient(enabled=false);color:#fff;text-shadow:0 -1px 0 rgba(0,0,0,.25)}.datepicker table tr td.selected.active,.datepicker table tr td.selected.disabled,.datepicker table tr td.selected.disabled.active,.datepicker table tr td.selected.disabled.disabled,.datepicker table tr td.selected.disabled:active,.datepicker table tr td.selected.disabled:hover,.datepicker table tr td.selected.disabled:hover.active,.datepicker table tr td.selected.disabled:hover.disabled,.datepicker table tr td.selected.disabled:hover:active,.datepicker table tr td.selected.disabled:hover:hover,.datepicker table tr td.selected.disabled:hover[disabled],.datepicker table tr td.selected.disabled[disabled],.datepicker table tr td.selected:active,.datepicker table tr td.selected:hover,.datepicker table tr td.selected:hover.active,.datepicker table tr td.selected:hover.disabled,.datepicker table tr td.selected:hover:active,.datepicker table tr td.selected:hover:hover,.datepicker table tr td.selected:hover[disabled],.datepicker table tr td.selected[disabled]{background-color:grey}.datepicker table tr td.selected.active,.datepicker table tr td.selected.disabled.active,.datepicker table tr td.selected.disabled:active,.datepicker table tr td.selected.disabled:hover.active,.datepicker table tr td.selected.disabled:hover:active,.datepicker table tr td.selected:active,.datepicker table tr td.selected:hover.active,.datepicker table tr td.selected:hover:active{background-color:#666\9}.datepicker table tr td.active,.datepicker table tr td.active.disabled,.datepicker table tr td.active.disabled:hover,.datepicker table tr td.active:hover{background-color:#006dcc;background-image:-moz-linear-gradient(to bottom,#08c,#04c);background-image:-ms-linear-gradient(to bottom,#08c,#04c);background-image:-webkit-gradient(linear,0 0,0 100%,from(#08c),to(#04c));background-image:-webkit-linear-gradient(to bottom,#08c,#04c);background-image:-o-linear-gradient(to bottom,#08c,#04c);background-image:linear-gradient(to bottom,#08c,#04c);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#08c', endColorstr='#0044cc', GradientType=0);border-color:#04c #04c #002a80;border-color:rgba(0,0,0,.1) rgba(0,0,0,.1) rgba(0,0,0,.25);filter:progid:DXImageTransform.Microsoft.gradient(enabled=false);color:#fff;text-shadow:0 -1px 0 rgba(0,0,0,.25)}.datepicker table tr td.active.active,.datepicker table tr td.active.disabled,.datepicker table tr td.active.disabled.active,.datepicker table tr td.active.disabled.disabled,.datepicker table tr td.active.disabled:active,.datepicker table tr td.active.disabled:hover,.datepicker table tr td.active.disabled:hover.active,.datepicker table tr td.active.disabled:hover.disabled,.datepicker table tr td.active.disabled:hover:active,.datepicker table tr td.active.disabled:hover:hover,.datepicker table tr td.active.disabled:hover[disabled],.datepicker table tr td.active.disabled[disabled],.datepicker table tr td.active:active,.datepicker table tr td.active:hover,.datepicker table tr td.active:hover.active,.datepicker table tr td.active:hover.disabled,.datepicker table tr td.active:hover:active,.datepicker table tr td.active:hover:hover,.datepicker table tr td.active:hover[disabled],.datepicker table tr td.active[disabled]{background-color:#04c}.datepicker table tr td.active.active,.datepicker table tr td.active.disabled.active,.datepicker table tr td.active.disabled:active,.datepicker table tr td.active.disabled:hover.active,.datepicker table tr td.active.disabled:hover:active,.datepicker table tr td.active:active,.datepicker table tr td.active:hover.active,.datepicker table tr td.active:hover:active{background-color:#039\9}.datepicker table tr td span{display:block;width:23%;height:54px;line-height:54px;float:left;margin:1%;cursor:pointer;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px}.datepicker table tr td span.focused,.datepicker table tr td span:hover{background:#eee}.datepicker table tr td span.disabled,.datepicker table tr td span.disabled:hover{background:0 0;color:#999;cursor:default}.datepicker table tr td span.active,.datepicker table tr td span.active.disabled,.datepicker table tr td span.active.disabled:hover,.datepicker table tr td span.active:hover{background-color:#006dcc;background-image:-moz-linear-gradient(to bottom,#08c,#04c);background-image:-ms-linear-gradient(to bottom,#08c,#04c);background-image:-webkit-gradient(linear,0 0,0 100%,from(#08c),to(#04c));background-image:-webkit-linear-gradient(to bottom,#08c,#04c);background-image:-o-linear-gradient(to bottom,#08c,#04c);background-image:linear-gradient(to bottom,#08c,#04c);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#08c', endColorstr='#0044cc', GradientType=0);border-color:#04c #04c #002a80;border-color:rgba(0,0,0,.1) rgba(0,0,0,.1) rgba(0,0,0,.25);filter:progid:DXImageTransform.Microsoft.gradient(enabled=false);color:#fff;text-shadow:0 -1px 0 rgba(0,0,0,.25)}.datepicker table tr td span.active.active,.datepicker table tr td span.active.disabled,.datepicker table tr td span.active.disabled.active,.datepicker table tr td span.active.disabled.disabled,.datepicker table tr td span.active.disabled:active,.datepicker table tr td span.active.disabled:hover,.datepicker table tr td span.active.disabled:hover.active,.datepicker table tr td span.active.disabled:hover.disabled,.datepicker table tr td span.active.disabled:hover:active,.datepicker table tr td span.active.disabled:hover:hover,.datepicker table tr td span.active.disabled:hover[disabled],.datepicker table tr td span.active.disabled[disabled],.datepicker table tr td span.active:active,.datepicker table tr td span.active:hover,.datepicker table tr td span.active:hover.active,.datepicker table tr td span.active:hover.disabled,.datepicker table tr td span.active:hover:active,.datepicker table tr td span.active:hover:hover,.datepicker table tr td span.active:hover[disabled],.datepicker table tr td span.active[disabled]{background-color:#04c}.datepicker table tr td span.active.active,.datepicker table tr td span.active.disabled.active,.datepicker table tr td span.active.disabled:active,.datepicker table tr td span.active.disabled:hover.active,.datepicker table tr td span.active.disabled:hover:active,.datepicker table tr td span.active:active,.datepicker table tr td span.active:hover.active,.datepicker table tr td span.active:hover:active{background-color:#039\9}.datepicker table tr td span.new,.datepicker table tr td span.old{color:#999}.datepicker .datepicker-switch{width:145px}.datepicker .datepicker-switch,.datepicker .next,.datepicker .prev,.datepicker tfoot tr th{cursor:pointer}.datepicker .datepicker-switch:hover,.datepicker .next:hover,.datepicker .prev:hover,.datepicker tfoot tr th:hover{background:#eee}.datepicker .cw{font-size:10px;width:12px;padding:0 2px 0 5px;vertical-align:middle}.input-append.date .add-on,.input-prepend.date .add-on{cursor:pointer}.input-append.date .add-on i,.input-prepend.date .add-on i{margin-top:3px}.input-daterange input{text-align:center}.input-daterange input:first-child{-webkit-border-radius:3px 0 0 3px;-moz-border-radius:3px 0 0 3px;border-radius:3px 0 0 3px}.input-daterange input:last-child{-webkit-border-radius:0 3px 3px 0;-moz-border-radius:0 3px 3px 0;border-radius:0 3px 3px 0}.input-daterange .add-on{display:inline-block;width:auto;min-width:16px;height:18px;padding:4px 5px;font-weight:400;line-height:18px;text-align:center;text-shadow:0 1px 0 #fff;vertical-align:middle;background-color:#eee;border:1px solid #ccc;margin-left:-5px;margin-right:-5px}
    .ship-title{
        font-size: 24px;
        font-weight: bold;
        color: #464646;
    }
    .inside-box.ship-departure-dates{
        margin-top: -36px;
        position: relative;
    }
    .ships-container{
        padding-bottom: 80px;
    }
    .submit-button{
        display: block;
        margin: 36px auto;
        margin-top: 8px;
        border: none;
        border-radius: 2px;
        background: darkorange;
        clear: both;
        text-align: left;
        color: white;
        line-height: 1;
        font-size: 12px;
        padding: 14px 17px;
    }
    .submit-button span{
        display: block;
        text-transform: uppercase;
    }
    .submit-button .next-step-title{
        font-size: 16px;
    }
    /*---------------*/

    /* CHECK AVAILABILITY VIEW */
    .ship-thumbnail{
        max-height: 220px;
        overflow: hidden;
        display: flex;
        justify-content: flex-end;
        align-items: flex-end;
    }
    .ship-thumbnail img{
        height: 100%;
        width: 100%;
    }
    .cabins-available-list{
        margin: 0;
        margin-top: 28px;
        padding: 0;
        list-style: none;
    }
    .cabins-available-list .cabin-list-item{
        display: table;
        width: 100%;
        margin-bottom: 8px;
    }
    .square-box{
        position: relative;
        border-radius: 6px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        min-width: 48px;
        min-height: 48px;
        background: dimgray;
        margin-bottom: 10px;
    }
    /* departures */
    .departure-placeholder{
        font-size: 12px;
        display: block;
        width: 100%;
        text-align: center;
        overflow: hidden;
        position: relative;
    }
    .departure-placeholder.selected{
        background: darkorange;
    }
    .departure-placeholder-promo{
        position: absolute;
        bottom: -3px;
        right: 5px;
        font-size: 8px;
        margin-bottom: 5px;
    }
    .departure-placeholder.selected .departure-placeholder-month{
        background: #272727;
    }
    .ship-departure-dates-list{
        display: flex;
        width: 100%;
        overflow: scroll;
    }
    .ship-departure-dates-list.shown{
        display: block;
    }
    .departure-placeholder-date{
        font-size: 18px;
    }
    /* duration */
    .duration-list{
        display: flex;
        justify-content: space-between;
    }
    .duration-list li:last-child .duration-placeholder .duration-placeholder-date{
        background: dimgray;
        font-size: 14px;
    }
    .duration-placeholder-date{
        font-size: 24px;
        line-height: 24px;
        background: #1f1f1f;
        margin: 0px;
    }
    .duration-placeholder.open .duration-placeholder-date{
        background: #1f1f1f;
        background: darkorange;
        box-shadow: 0px 2px 8px rgba(105, 105, 105, 0.3);
    }
    .days-word{
        font-size: 12px;
        line-height: 1;
    }
    .durarion-placeholder-info-box{
        display: none;
        margin: 0 auto;
        margin-top: -5px;
        width: 44px;
        height: 32px;
        background: darkorange;
        align-items: center;
        justify-content: space-around;
        border-radius: 6px;
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
        transition: top ease-in .2s;
        padding-top: 5px;
        color: white;
        cursor: pointer;
    }
    .duration-placeholder.open .durarion-placeholder-info-box{
        display: flex;
    }
    /*---------------*/
    /*--- PAX COUNTER ---*/
    .datepicker-control{
        margin-bottom: 18px;
    }
    .datepicker-control-label{
        margin: 18px auto;
    }
    .counter-operation{
        display: inline-flex;
        width: 24px;
        background: white;
        height: 42px;
        justify-content: center;
        align-items: center;
    }
    .counter-operation.add{
        transform: translateX(3px) translateY(-6px);
        border-radius: 6px 0px 0px 6px;
    }
    .counter-operation.subtract{
        transform: translateX(-3px) translateY(-6px);
        border-radius: 0px 6px 6px 0px;
    }
    .pax-counter{
        border:none;
        text-align: center;
        font-size: 28px;
        border-left: 1px solid #e8e8e8;
        border-right: 1px solid #e8e8e8;
    }
    .filter-search-placeholder button,
    .filter-search-placeholder .more-than-nine{
        display: inline-block;
        margin: 18px 0;
    }
    .filter-control-select{
        margin-bottom: 12px;
        border: none;
    }
    .offer-search-filter-placeholder label{
        transform: translateY(-6px);
    }
    .offer-search-filter-placeholder span{
        display: inline-flex;
        border: 1px solid #ccc;
        width: 34px;
        height: 34px;
        margin-left: 12px;
        padding: 5px;
        align-content: center;
        justify-content: center;
        background: white;
    }
    .offer-search-filter-placeholder span:before{
        content: '';
        position: relative;
        width: 100%;
        height: 100%;
        background: darkorange;
        display: none;
        
    }
    .offer-search-filter-placeholder input[type=checkbox]:checked + span:before{
        display:block;
    }
    .offer-search-filter-checkbox{
        display: none;
    }
</style>
<form id="set-date-form" method="post" action="<?= home_url('accommodation') ?>/">
    <div class="container">
        <?php
            $args = array(
                'post_type' => 'ggships',
                'posts_per_page' => 2,
                'orger_by' => 'post_date',
                'order' => 'DESC'
            );
            $barcos = get_posts($args);
            //        echo '<pre>';
            //        var_dump($barcos);
            //        echo '</pre>';
        ?>
        <div class="row top-filters">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 text-center datepicker-control">
                        <label for="dtp_input2" class="col-md-2 datepicker-control-label">Select dates</label>
                        <div class="input-daterange input-group" id="datepicker">
                            <input type="text" class="input-sm form-control" name="date-start" value="<?= date('Y-m-d', strtotime("+7 days"))?>" />
                            <span class="input-group-addon"><?= _e('to','gogalapagos') ?></span>
                            <input type="text" class="input-sm form-control" name="date-end" value="<?= date('Y-m-d', strtotime("+37 days")) ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-5 col-xs-offset-1 text-center">
                                <div class="counter-controller">
                                    <div class="counter-operation counter-adults add">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <input id="adults-counter" class="pax-counter" type="number" name="adults" min="0" max="9" value="2">
                                    <div class="counter-operation counter-adults subtract">
                                        <i class="fas fa-minus"></i>
                                    </div>
                                </div>
                                <p><?= _e('Adults', 'gogalapagos') ?></p>
                            </div>
                            <div class="col-xs-5 text-center">
                               <div class="counter-controller">
                                    <div class="counter-operation counter-children add">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <input id="children-counter" class="pax-counter" type="number" name="children" min="0" max="7" value="0">
                                    <div class="counter-operation counter-children subtract">
                                        <i class="fas fa-minus"></i>
                                    </div>
                                </div>
                                <p><?= _e('Children', 'gogalapagos') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 text-right filter-search-placeholder">
                        <a id="more-than-nine" class="btn btn-warning more-than-nine hidden" href="<?= home_url() ?>"><?= _e('Are you more than 9?') ?></a>
                        <button class="btn btn-default" id="more-filters" type="button"><i class="fas fa-sliders-h"></i></button>
                        <button class="btn btn-warning" id="search-dates" type="button"><?= _e('Search', 'gogalapagos') ?></button> 
                    </div>
                    <div class="col-xs-10 col-xs-offset-1">
                        <div id="filter-controls-placeholder" class="filter-controls-placeholder" style="display: none;">
                            <select name="duration-search-filter" class="form-control filter-control-select">
                                <option value="0"><?= _e('All Durations', 'gogalapagos') ?></option>
                                <option value="4">4 <?= _e('Days', 'gogalapagos') ?></option>
                                <option value="8">8 <?= _e('Days', 'gogalapagos') ?></option>
                                <option value="12">12 <?= _e('Days', 'gogalapagos') ?></option>
                            </select>
                            <select name="ship-search-filter" class="form-control filter-control-select">
                                <option value="0"><?= _e('All Ships', 'gogalapagos') ?></option>
                                <option value="BAR003">Galapagos Legend</option>
                                <option value="BAR001">Coral Yacths</option>
                            </select>
                            <div class="form-group text-right">
                                <div class="offer-search-filter-placeholder">
                                    <label class="offer-search-filter-label" for="offer-search-filter"><?= _e('Offers Only') ?></label>
                                    <input class="offer-search-filter-checkbox" type="checkbox" name="offer-search-filter" id="offer-search-filter">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="cart-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1 class="cart-title">1. <?= _e('Ships', 'gogalapagos') ?></h1>
                    <p class="cart-subtitle"><?= _e('Choose your ship and departure') ?></p>
                </div>
            </div>            
        </div>
    </div>

    <input id="input-ship" type="hidden" name="ship" value="">
    <input id="input-departure" type="hidden" name="departure" value="">
    <input id="input-promo" type="hidden" name="promo" value="">
    <input id="input-duration" type="hidden" name="duration" value="">
    <div class="ships-container">
            <?php foreach ($barcos as $barco){ ?>
            <?php 
                $args = array(
                    'post_type' => 'ggcabins',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        array(
                            'key'     => $prefix . 'cabin_ship_id',
                            'value'   => $barco->ID,
                            'compare' => 'LIKE',
                        ),
                    ),
                );
                $cabinas = get_posts($args);
            ?>
        <div id="bar<?= $barco->ID ?>" class="ship-container" data-shipcode="<?= get_post_meta($barco->ID, $prefix . 'dispo_ID', true) ?>">
            <div class="ship-thumbnail">
                <img src="<?= get_post_meta($barco->ID, $prefix . 'ship_wiki_image', true) ?>" class="img-responsive" alt="<?= $barco->post_title ?>">
            </div>
            <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="inside-box ship-departure-dates">
                                <h2 class="ship-title"><?= $barco->post_title ?></h2>
                                <h3><?= _e('Departure Dates', 'gogalapagos') ?></h3>
                                <p class="text-right"><span class="see-all-dates"><?= _e('See all Dates', 'gogalapagos') ?></span><span class="hide-all-dates text-right hidden"><?= _e('Hide Dates', 'gogalapagos') ?></span></p>
                                <ul class="list-inline ship-departure-dates-list">
                                    <li>
                                        <div class="square-box departure-placeholder" data-departure="2018-06-05" data-promo="1207">
                                            <div class="departure-placeholder-month"><?= _e('Jun', 'gogalapagos') ?></div>
                                            <div class="departure-placeholder-date">5</div>
                                            <div class="departure-placeholder-promo"><i class="fa fa-star"></i></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="square-box departure-placeholder" data-departure="2018-06-12" data-promo="1207">
                                            <div class="departure-placeholder-month"><?= _e('Jun', 'gogalapagos') ?></div>
                                            <div class="departure-placeholder-date">12</div>
                                            <div class="departure-placeholder-promo"><i class="fa fa-star"></i></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="square-box departure-placeholder" data-departure="2018-06-18">
                                            <div class="departure-placeholder-month"><?= _e('Jun', 'gogalapagos') ?></div>
                                            <div class="departure-placeholder-date">18</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="square-box departure-placeholder" data-departure="2018-06-25">
                                            <div class="departure-placeholder-month"><?= _e('Jun', 'gogalapagos') ?></div>
                                            <div class="departure-placeholder-date">25</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="square-box departure-placeholder" data-departure="2018-06-30" data-promo="1218">
                                            <div class="departure-placeholder-month"><?= _e('Jun', 'gogalapagos') ?></div>
                                            <div class="departure-placeholder-date">30</div>
                                            <div class="departure-placeholder-promo"><i class="fa fa-star"></i></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="square-box departure-placeholder" data-departure="2018-07-02" data-promo="1207">
                                            <div class="departure-placeholder-month"><?= _e('Jul', 'gogalapagos') ?></div>
                                            <div class="departure-placeholder-date">2</div>
                                            <div class="departure-placeholder-promo"><i class="fa fa-star"></i></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="square-box departure-placeholder" data-departure="2018-07-08">
                                            <div class="departure-placeholder-month"><?= _e('Jul', 'gogalapagos') ?></div>
                                            <div class="departure-placeholder-date">8</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="square-box departure-placeholder" data-departure="2018-07-16" data-promo="1218">
                                            <div class="departure-placeholder-month"><?= _e('Jul', 'gogalapagos') ?></div>
                                            <div class="departure-placeholder-date">16</div>
                                            <div class="departure-placeholder-promo"><i class="fa fa-star"></i></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="square-box departure-placeholder" data-departure="2018-07-23">
                                            <div class="departure-placeholder-month"><?= _e('Jul', 'gogalapagos') ?></div>
                                            <div class="departure-placeholder-date">23</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="square-box departure-placeholder" data-departure="2018-07-30">
                                            <div class="departure-placeholder-month"><?= _e('Apr', 'gogalapagos') ?></div>
                                            <div class="departure-placeholder-date">30</div>
                                        </div>
                                    </li>
                                </ul>
                                <div id="promo-name" class="promo-name"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="inside-box duration-box hidden">
                                <h3><?= _e('Duration', 'gogalapagos')?></h3>
                                <ul class="list-inline duration-list">
                                    <li>
                                        <div class="duration-placeholder" data-duration="4">
                                            <div class="square-box duration-placeholder-date">
                                                <span>4</span>
                                                <div class="days-word"><?= _e('Days', 'gogalapagos') ?></div>
                                            </div>
                                            <div class="durarion-placeholder-info-box">
                                                <i class="fa fa-info-circle"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="duration-placeholder" data-duration="8">
                                            <div class="square-box duration-placeholder-date">
                                                <span>8</span>
                                                <div class="days-word"><?= _e('Days', 'gogalapagos') ?></div>
                                            </div>
                                            <div class="durarion-placeholder-info-box">
                                                <i class="fa fa-info-circle"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="duration-placeholder" data-duration="12">
                                            <div class="square-box duration-placeholder-date">
                                                <span>12</span>
                                                <div class="days-word"><?= _e('Days', 'gogalapagos') ?></div>
                                            </div>
                                            <div class="durarion-placeholder-info-box">
                                                <i class="fa fa-info-circle"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#more-days-info">
                                            <div id="more-days-btn" class="duration-placeholder">
                                                <div class="square-box duration-placeholder-date">
                                                    <i class="fas fa-plus"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="inside-box cabins-box hidden">                
                                <h3><?= _e('Cabins available on this date', 'gogalapagos') ?></h3>
                                <ul class="cabins-available-list">
                                    <?php foreach( $cabinas as $cabina ){ ?>
                                    <li class="cabin-list-item"><span class="pull-left cabin-list-name"><?= $cabina->post_title ?></span> <span class="pull-right cabin-list-price">$ 3250</span></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } // FIN bucle barcos ?>
            <div id="error-message" class="container" style="display: none;">
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 text-center text-danger">
                        <div id="message-placeholder" class="message-placeholder">
                           <p><strong><?= _e('Please check the selection of the cruise departure date and duration. Thank you.','gogalapagos') ?></strong></p>
                        </div>
                    </div>
                </div>
            </div>
        <button id="set-date" name="availability" value="true" class="text-center submit-button submit-button-cabin" type="submit">
            <span class="next-step"><?= _e('Next Step', 'gogalapagos') ?></span>
            <span class="next-step-title"><?= _e('Select Your Cabin', 'gogalapagos') ?></span>
        </button>
    </div>
</form>
<!-- Modal MORE DAYS INFO -->
<div class="modal fade" id="more-days-info" tabindex="-1" role="dialog" aria-labelledby="moreDaysInfo">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close pull-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-chevron-left"></i></span></button>
                <h4 class="modal-title" id="myModalLabel"><?= _e('13 days or more', 'gogalapagos') ?></h4>
            </div>
            <div class="modal-body text-center">
                <?= _e('If you want to consult itineraries of 13 days or more, please fill out the following form and one of our agent will contact you.','gogalapagos') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary text-center"><?= _e('Go to the form', 'gogalapagos')?></button>
            </div>
        </div>
    </div>
</div>
<?php
    
    // RECUPERAR LAS PROMOCIONES
    
    $args = array(
        'post_type'         => 'ggspecialoffer',
        'posts_per_page'    => -1
    );
    $ofertas = get_posts($args);
    
    foreach($ofertas as $oferta){
?>
<!-- Modal PROMO PLACEHOLDER -->
<div class="modal fade ggspecialoffer" id="<?= $oferta->ID ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $oferta->ID ?>">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close pull-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-chevron-left"></i></span></button>
                <h4 class="modal-title" id="offerTitle<?= $oferta->ID ?>"><?= $oferta->post_title ?></h4>
            </div>
            <div class="modal-body text-center">
                <p><?= esc_html($oferta->post_excerpt) ?></p>
                <img style="margin: 0 auto;" class="img-responsive" src="<?= get_the_post_thumbnail_url( $oferta->ID, 'medium' ) ?>" alt="<?= $oferta->post_title ?>">
            </div>
        </div>
    </div>
</div>
<?php } // Fin bucle modales para ofertas ?>