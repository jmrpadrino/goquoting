<?php

global $post;

add_action( 'admin_menu', 'add_gquote_menu_bubble' );
function add_gquote_menu_bubble() {
    global $menu;

    $args = array(
        'post_type' => 'gquote',
        'posts_per_page' => -1,
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'quote_status',
                'value' => 0
            )
        )
    );
    $quotes = get_posts($args);
    if ( $quotes ) {
        foreach ( $menu as $key => $value ) {
            if ( $menu[$key][2] == 'edit.php?post_type=gquote' ) {
                $menu[$key][0] .= ' <span class="gquote-not">' . count($quotes) . '</span>';
                return;
            }
        }
    }
}

add_action( 'admin_init' , 'inicializa_columnas' );
function inicializa_columnas(){
    add_filter('manage_posts_columns', 'pedidos_columnas');
}
add_action('manage_posts_custom_column', 'pedidos_columnas_contenido', 10, 2);

function pedidos_columnas( $defaults )
{
    if ( $_GET['post_type'] == 'gquote' ){
        $defaults['title'] = 'Quote ID';
        $defaults['quoting_status'] = __('Status', 'gogalapagos');
        $defaults['quoting_total'] = __('Total', 'gogalapagos');        

        unset($defaults['language']);
        unset($defaults['ratings']);
    }
    return $defaults;
}

function pedidos_columnas_contenido($column_name, $post_ID){
    if ($column_name == 'quoting_status') {
        echo ($cabin_eligos_id = get_post_meta( $post_ID, 'quote_status', TRUE )) == 0 ? '<p class="bg-warning text-center">FOLLOW</p>' : '<p class="bg-primary text-center">CONFIRMED</p>';        
    }
}

function gquote_get_bootstrap(){
    global $post_type;
    if( 'gquote' == $post_type ){
        wp_enqueue_style( 'gquote-bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
        wp_enqueue_script( 'gquote-bootstrap-script', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' );
    }
    ?>
    <style>
        #adminmenu .gquote-not{
            display: inline-block;
            vertical-align: top;
            margin: 1px 0 0 2px;
            padding: 0 5px;
            min-width: 7px;
            height: 17px;
            border-radius: 11px;
            background-color: orange;
            color: #000;
            font-size: 9px;
            line-height: 17px;
            text-align: center;
            z-index: 26;
        }
    </style>
    <?php
}
add_action( 'admin_head', 'gquote_get_bootstrap' );

function gquote_register_meta_boxes_callback($post){

    $countries = array
        (
        'AF' => 'Afghanistan',
        'AX' => 'Aland Islands',
        'AL' => 'Albania',
        'DZ' => 'Algeria',
        'AS' => 'American Samoa',
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AI' => 'Anguilla',
        'AQ' => 'Antarctica',
        'AG' => 'Antigua And Barbuda',
        'AR' => 'Argentina',
        'AM' => 'Armenia',
        'AW' => 'Aruba',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BJ' => 'Benin',
        'BM' => 'Bermuda',
        'BT' => 'Bhutan',
        'BO' => 'Bolivia',
        'BA' => 'Bosnia And Herzegovina',
        'BW' => 'Botswana',
        'BV' => 'Bouvet Island',
        'BR' => 'Brazil',
        'IO' => 'British Indian Ocean Territory',
        'BN' => 'Brunei Darussalam',
        'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso',
        'BI' => 'Burundi',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'CV' => 'Cape Verde',
        'KY' => 'Cayman Islands',
        'CF' => 'Central African Republic',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CX' => 'Christmas Island',
        'CC' => 'Cocos (Keeling) Islands',
        'CO' => 'Colombia',
        'KM' => 'Comoros',
        'CG' => 'Congo',
        'CD' => 'Congo, Democratic Republic',
        'CK' => 'Cook Islands',
        'CR' => 'Costa Rica',
        'CI' => 'Cote D\'Ivoire',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'GQ' => 'Equatorial Guinea',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'ET' => 'Ethiopia',
        'FK' => 'Falkland Islands (Malvinas)',
        'FO' => 'Faroe Islands',
        'FJ' => 'Fiji',
        'FI' => 'Finland',
        'FR' => 'France',
        'GF' => 'French Guiana',
        'PF' => 'French Polynesia',
        'TF' => 'French Southern Territories',
        'GA' => 'Gabon',
        'GM' => 'Gambia',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GR' => 'Greece',
        'GL' => 'Greenland',
        'GD' => 'Grenada',
        'GP' => 'Guadeloupe',
        'GU' => 'Guam',
        'GT' => 'Guatemala',
        'GG' => 'Guernsey',
        'GN' => 'Guinea',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HM' => 'Heard Island & Mcdonald Islands',
        'VA' => 'Holy See (Vatican City State)',
        'HN' => 'Honduras',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran, Islamic Republic Of',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IM' => 'Isle Of Man',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JE' => 'Jersey',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'Kenya',
        'KI' => 'Kiribati',
        'KR' => 'Korea',
        'KW' => 'Kuwait',
        'KG' => 'Kyrgyzstan',
        'LA' => 'Lao People\'s Democratic Republic',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LS' => 'Lesotho',
        'LR' => 'Liberia',
        'LY' => 'Libyan Arab Jamahiriya',
        'LI' => 'Liechtenstein',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MO' => 'Macao',
        'MK' => 'Macedonia',
        'MG' => 'Madagascar',
        'MW' => 'Malawi',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MH' => 'Marshall Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MU' => 'Mauritius',
        'YT' => 'Mayotte',
        'MX' => 'Mexico',
        'FM' => 'Micronesia, Federated States Of',
        'MD' => 'Moldova',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MS' => 'Montserrat',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NR' => 'Nauru',
        'NP' => 'Nepal',
        'NL' => 'Netherlands',
        'AN' => 'Netherlands Antilles',
        'NC' => 'New Caledonia',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NE' => 'Niger',
        'NG' => 'Nigeria',
        'NU' => 'Niue',
        'NF' => 'Norfolk Island',
        'MP' => 'Northern Mariana Islands',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PW' => 'Palau',
        'PS' => 'Palestinian Territory, Occupied',
        'PA' => 'Panama',
        'PG' => 'Papua New Guinea',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PN' => 'Pitcairn',
        'PL' => 'Poland',
        'PT' => 'Portugal',
        'PR' => 'Puerto Rico',
        'QA' => 'Qatar',
        'RE' => 'Reunion',
        'RO' => 'Romania',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'BL' => 'Saint Barthelemy',
        'SH' => 'Saint Helena',
        'KN' => 'Saint Kitts And Nevis',
        'LC' => 'Saint Lucia',
        'MF' => 'Saint Martin',
        'PM' => 'Saint Pierre And Miquelon',
        'VC' => 'Saint Vincent And Grenadines',
        'WS' => 'Samoa',
        'SM' => 'San Marino',
        'ST' => 'Sao Tome And Principe',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SC' => 'Seychelles',
        'SL' => 'Sierra Leone',
        'SG' => 'Singapore',
        'SK' => 'Slovakia',
        'SI' => 'Slovenia',
        'SB' => 'Solomon Islands',
        'SO' => 'Somalia',
        'ZA' => 'South Africa',
        'GS' => 'South Georgia And Sandwich Isl.',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SD' => 'Sudan',
        'SR' => 'Suriname',
        'SJ' => 'Svalbard And Jan Mayen',
        'SZ' => 'Swaziland',
        'SE' => 'Sweden',
        'CH' => 'Switzerland',
        'SY' => 'Syrian Arab Republic',
        'TW' => 'Taiwan',
        'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania',
        'TH' => 'Thailand',
        'TL' => 'Timor-Leste',
        'TG' => 'Togo',
        'TK' => 'Tokelau',
        'TO' => 'Tonga',
        'TT' => 'Trinidad And Tobago',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'TC' => 'Turks And Caicos Islands',
        'TV' => 'Tuvalu',
        'UG' => 'Uganda',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'GB' => 'United Kingdom',
        'US' => 'United States',
        'UM' => 'United States Outlying Islands',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VU' => 'Vanuatu',
        'VE' => 'Venezuela',
        'VN' => 'Viet Nam',
        'VG' => 'Virgin Islands, British',
        'VI' => 'Virgin Islands, U.S.',
        'WF' => 'Wallis And Futuna',
        'EH' => 'Western Sahara',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe',
    );

    $prefix = 'gg_';
    $cabinas = get_post_meta($post->ID, 'quote_cabins', false); 
    $cabinas = array_shift($cabinas);
    $extrasArray = get_post_meta($post->ID, 'quote_extras', false); 
    $extrasArray = array_shift($extrasArray);
    $travelers = get_post_meta($post->ID, 'quote_traveler', false); 
    $travelers = array_shift($travelers);
?>
<div id="print-area">
    <div class="row">
        <div class="col-xs-12">
            <h3 style="color: #2980b9; font-size: 28px; margin: 0; margin-bottom: 18px;"><?= _e('Quote Details', 'gogalapagos') ?> #<?= get_post_meta($post->ID, 'quote_ID', true) ?></h3>
            <button class="btn btn-default pull-right" id="print-quote" type="button" onclick="printDiv()"><i class="glyphicon glyphicon-print"></i></button>
            <button class="btn btn-default pull-right" id="send-quote" type="button"><i class="glyphicon glyphicon-envelope"></i></button>
        </div>
    </div>
    <div class="row" style="margin-top: 18px;">
        <div class="col-xs-4">
            <h3 style="margin: 0; margin-bottom: 18px;"><?= _e('General', 'gogalapagos')?></h3>
            <h4><?= _e('Quote Creation date', 'gogalapagos')?></h4>
            <p><?= $post->post_date ?></p>
            <h4><?= _e('Quote status', 'gogalapagos')?></h4>
            <select id="quote_status" name="quote_status">
                <?php 
                    $status = get_post_meta($post->ID, 'quote_status', true);
                ?>
                <option value="0" <?= ($status == 0) ? 'selected' : '' ?>>Follow</option>
                <option value="1" <?= ($status == 1) ? 'selected' : '' ?>>Confirmed</option>
            </select>
        </div>
        <div class="col-xs-4">
            <h3 style="margin: 0; margin-bottom: 18px;"><?= _e('Quote', 'gogalapagos')?></h3>
            <ul>
                <li><strong><?= _e('Ship', 'gogalapagos') ?></strong><br /><?= get_post_meta($post->ID, 'quote_ship', true) ?></li>
                <li><strong><?= _e('Departure', 'gogalapagos') ?></strong><br /><?= get_post_meta($post->ID, 'quote_departure', true) ?></li>
                <li><strong><?= _e('Applied Promo', 'gogalapagos') ?></strong><br /><?= get_the_title(get_post_meta($post->ID, 'quote_promo', true)) ?></li>
                <li><strong><?= _e('Duration', 'gogalapagos') ?></strong><br /><?= get_post_meta($post->ID, 'quote_duration', true) ?></li>
                <li><strong><?= _e('Adults', 'gogalapagos') ?></strong> <?= get_post_meta($post->ID, 'quote_adults', true) ?> - <strong> <?= _e('Children', 'gogalapagos') ?></strong><?= get_post_meta($post->ID, 'quote_children', true) ?></li>
            </ul>
        </div>
        <div class="col-xs-4">
            <h3 style="margin: 0; margin-bottom: 18px;"><?= _e('Contact & Billing', 'gogalapagos')?></h3>
            <?php $travelers = get_post_meta($post->ID, 'quote_traveler', false) ?>
            <ul>
                <li><strong><?= _e('Name', 'gogalapagos') ?></strong><br /><?= $travelers[0][1]['title'] ?> <?= $travelers[0][1]['fname'] ?> <?= $travelers[0][1]['lname'] ?></li>
                <li><strong><?= _e('Email', 'gogalapagos') ?></strong><br /><a href="mailto:<?= $travelers[0][1]['email'] ?>"><?= $travelers[0][1]['email'] ?></a></li>
                <li><strong><?= _e('Phone', 'gogalapagos') ?></strong><br /><a href="tel:<?= $travelers[0][1]['phone'] ?>"><?= $travelers[0][1]['phone'] ?></a></li>
                <li><hr /></li>
                <li><?= get_post_meta($post->ID, 'quote_billing_address', true) ?>, <?= get_post_meta($post->ID, 'quote_billing_city', true) ?>, <?= get_post_meta($post->ID, 'quote_billing_state', true) ?>.</li>
                <li><?= $countries[get_post_meta($post->ID, 'quote_billing_country', true)] ?> - <?= get_post_meta($post->ID, 'quote_billing_zipcode', true) ?>.</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <hr />
            <div class="row">
                <div class="col-xs-6">
                    <h3 style="margin: 0; margin-bottom: 18px;"><?= _e('Cabins list', 'gogalapagos')?></h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?= _e('Cabin Name', 'gogalapagos')?></th>
                                    <th><?= _e('Cabin Code', 'gogalapagos')?></th>
                                    <th><?= _e('Accommodation', 'gogalapagos')?></th>
                                    <th><?= _e('People inside', 'gogalapagos')?></th>
                                    <th align="right" style="text-align: right;"><?= _e('Total Estimated', 'gogalapagos')?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                    foreach($cabinas as $cabina){
                        $precioTotal += $cabina['precioCabina'];
                        echo '<tr>';
                        echo '<td>' . $cabina['nombreCabina'] . '</td>';
                        echo '<td>' . $cabina['codigoCabina'] . '</td>';
                        echo '<td>' . $cabina['acomodacionTexto'] . '</td>';
                        echo '<td>' . $cabina['personasEnCabina'] . '</td>';
                        echo '<td align="right">' . $cabina['precioCabina'] . '</td>';
                        echo '</tr>';
                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xs-6">
                    <h3 style="margin: 0; margin-bottom: 18px;"><?= _e('Travelers Extras', 'gogalapagos')?></h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?= _e('Extra', 'gogalapagos')?></th>
                                    <th><?= _e('Amount', 'gogalapagos')?></th>
                                    <th><?= _e('Subtotal', 'gogalapagos')?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $items = 0;
    $extrassubtotal = 0;
    foreach($extrasArray as $extras){
        foreach($extras as $extra => $cantidad){
            if($cantidad > 0){
                $onboardservice = goGetPostBySlug($extra);
                $onboard_price = get_post_meta($onboardservice[$items]->ID, $prefix . 'onboard_service_price', true);
                echo '<tr>';
                echo '<td>' . esc_html($onboardservice[$items]->post_title) . '</td>';
                echo '<td>' . $cantidad . '</td>';
                echo '<td>' . $onboard_price * $cantidad . '</td>';
                echo '</tr>';
            }
        }
        $items++;
    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <hr />
                    <h3 style="margin: 0; margin-bottom: 18px;"><?= _e('Travelers Information', 'gogalapagos')?></h3>
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <?php
                                    $tab = 0;
    foreach ($travelers[0] as $pax){
        echo '<li role="presentation" class="';
        echo ($tab == 0) ? 'active' : '';
        $number = $tab + 1;
        echo '"><a href="#pax-'. $tab .'" aria-controls="pax-'. $tab .'" role="tab" data-toggle="tab">Pax '. $number .'</a></li>';    
        $tab++;
    }
                            ?>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <?php
    $tab = 0;
    foreach ($travelers[0] as $pax){
        echo '<div role="tabpanel" class="tab-pane ';
        echo ($tab == 0) ? 'active' : 'fade';
        $number = $tab + 1;
        echo '" id="pax-'. $tab .'">';    
        // IMPRIMIR EL ARRAY DEL PAX
                            ?>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h4 style="margin: 0; margin: 16px 0;"><?= _e('Personal Information', 'gogalapagos')?></h4>
                                    <ul>
                                        <li><strong>Title</strong> <?= $pax['title'] ?></li>
                                        <li><strong>Full Name</strong> <?= $pax['fname'] ?> <?= $pax['lname'] ?></li>
                                        <li><strong>Gender</strong> <?= ($pax['gender'] == 'm') ? 'Male' : ' Female' ?></li>
                                        <li><strong>Birth Date</strong> <?= $pax['dirthdate'] ?>/<?= $pax['dirthmonth'] ?>/<?= $pax['dirthyear'] ?></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <h4 style="margin: 0; margin: 16px 0;"><?= _e('Contact Information', 'gogalapagos')?></h4>
                                    <ul>
                                        <li><strong>Address</strong> <?= $pax['streetaddress'] ?></li>
                                        <li><strong>City</strong> <?= $pax['city'] ?></li>
                                        <li><strong>State</strong> <?= $pax['citystate'] ?></li>
                                        <li><strong>Country</strong> <?= $countries[$pax['country']] ?></li>
                                        <li><strong>Phone</strong> <?= $pax['phone'] ?></li>
                                        <li><strong>Email</strong> <?= $pax['email'] ?></li>
                                    </ul>
                                </div>
                                <div class="col-sm-3">
                                    <h4 style="margin: 0; margin: 16px 0;"><?= _e('Additional Information', 'gogalapagos')?></h4>
                                    <ul>
                                        <li>
                                            <strong>Diet</strong><br />
                                            <p><?= $pax['diet'] ?></p>
                                        </li>
                                        <li>
                                            <strong>Medical Conditions</strong><br />
                                            <p><?= $pax['medical'] ?></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php
                                //-------------------------//
                                echo '</div>';
        $tab++;
    }
                            ?>
                        </div>
                    </div>
                    <?php
    //    echo '<pre>';
    //    var_dump($travelers[0]);
    //    echo '</pre>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function printDiv() 
    {
        var divToPrint=document.getElementById('print-area');
        var newWin=window.open('','Print-Window');
        var vistaPrint = '';
        vistaPrint += '<html>';
        vistaPrint += '<head>';
        vistaPrint += '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
        vistaPrint += '</head>';
        vistaPrint += '<body onload="window.print()">';
        vistaPrint += divToPrint.innerHTML;
        vistaPrint += '</body>';
        vistaPrint += '</html>';

        console.log(vistaPrint);

        newWin.document.open();
        newWin.document.write(vistaPrint);
        //newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();},10);
    }
</script>
<?php    
}
function gquote_register_meta_boxes() {
    add_meta_box( 'goquitong-quote-data', __( 'Quote Info', 'textdomain' ), 'gquote_register_meta_boxes_callback', 'gquote' );
}
add_action( 'add_meta_boxes', 'gquote_register_meta_boxes' );


function goGetPostBySlug($slug){
    $args = array(
        'name'        => $slug,
        'post_type'   => 'ggonboardservices',
        'post_status' => 'publish',
        'numberposts' => 1
    );
    $my_onboardservice = get_posts($args);
    return $my_onboardservice;
}
?>