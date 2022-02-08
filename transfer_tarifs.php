<!-- transfer_tarifs.php is responsible for displaying the calculator form, styles and calculation logic. -->
<!-- form at website: -->
 <!-- https://cargo.mps.net.ua/delivery-china-transfer/ -->
 


<style>
  .transfer-table{
    display: none;
  }
  .default-inp .input-transfer {
    height: 40px;
  }
  .transfer-descr{
    margin: 5px 0 10px;
  }
  input {
    outline: none;
  }

  .content-transfer-block div {
    margin: 3px 0;
    text-align: left;
  }

  div label {
    margin: 10px 5px 0 5px;
  }
  div .transfer-label {
    margin-left: 18px;
    font-weight: 800;
  }

  div input[type=text] {
    padding: 2px 10px;
    border-radius: 5px;
    border: 1px solid #c1c1c2;
    width: 100%;
    font-family: Roboto, sans-serif;
    height: 50px;
    box-shadow: 0 0 15px 0 silver inset;
  }

  div input[type=button] {
    padding: 6px 5px;
    border-radius: 5px;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    width: 100%;
    height: 50px;
    background-color: #549404;
    color: #fff;
    text-transform: uppercase;
    font-family: Montserrat, sans-serif;
    line-height: 1.42857143;
    position: relative;
    font-size: 12px;
    padding: 15px 30px;
    border: none;
    text-transform: uppercase;
  }

  .transfer-block {
    height: auto;
    width: 650px;
    margin: auto;
    padding: 0 10px;
  }


  @media screen and (max-width: 676px) {
    .transfer-block{
      width: auto;
      padding: 0;
    }
  }

  @media screen and (max-width: 545px) {
    .transfer-block{
      width: auto;
    }
    .transfer-block div,
    .transfer-block .col-sm-6{
      margin: 0;
      padding: 0 !important;
    }
    div input[type=text],
    div input[type=button]{
      height: 38px;
      line-height: 9px;
    }
     .transfer-item{
      margin: 10px 0 0 !important;
    }
    div .transfer-label {
      margin: 9px 0 0 ;
    }
    label,
    div input[type=text]{
      font-size: 14px;
    }
    .form-group-title{
      margin: 15px 0 0;
    }

  }

</style>


<div class="row transfer-block">
  <div class="content-transfer-block">
    <form>
      <div class="row">
        <div class="col-xs-12 col-sm-6 transfer-item">
          <div class="transfer-form">
            <div class="transfer-elem">
              <input class="transfer-input" type="text" id="china_sum" placeholder="Сума переказу в юанях" name="china_sum" />
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 transfer-item">
          <div class="transfer-form">
            <div class="transfer-elem">
              <input class="transfer-input" type="button" id="count_button" value="Розрахувати" name="count" />
              <!-- <input class="transfer-input" type="text" id="china_sum" placeholder="Сума переказу в юанях" name="china_sum" /> -->
            </div>
          </div>
        </div>
      </div>

      <div class="transfer-table" id = "transfer-table">

        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="transfer-form">
              <label class="control-label-transfer">Курс юаня до долару:</label>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="transfer-form">
              <div class="transfer-elem">
                <input class="transfer-input" type="text" id="china_sum" name="dol_china_rate" />
              </div>
            </div>
          </div>
        </div>

        <div>
          <label class="transfer-label">Сума в доларах:</label>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="transfer-form">
              <label class="control-label-transfer">Потрiбна сума для переказу:</label>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="transfer-form">
              <div class="transfer-elem">
                <input class="transfer-input" type="text" id="china_sum" name="dol_sum" />
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="transfer-form">
              <label class="control-label-transfer">Вартiсть послуги переказу:</label>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="transfer-form">
              <div class="transfer-elem">
                <input class="transfer-input" type="text" name="dol_service" />
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="transfer-form">
              <label class="control-label-transfer">Загальна сума для переказу:</label>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="transfer-form">
              <div class="transfer-elem">
                <input class="transfer-input" type="text" name="dol_amount" />
              </div>
            </div>
          </div>
        </div>


        <div>
          <label class="transfer-label">Сума в гривнi:</label>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="transfer-form">
              <label class="control-label-transfer">Потрiбна сума для переказу:</label>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="transfer-form">
              <div class="transfer-elem">
                <input class="transfer-input" type="text" name="hrn_sum" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="transfer-form">
              <label class="control-label-transfer">Вартiсть послуги переказу:</label>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="transfer-form">
              <div class="transfer-elem">
                <input class="transfer-input" type="text" name="hrn_service" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="transfer-form">
              <label class="control-label-transfer">Загальна сума для переказу:</label>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="transfer-form">
              <div class="transfer-elem">
                <input class="transfer-input" type="text" name="hrn_amount" />
              </div>
            </div>
          </div>
        </div>
      </div>


    </form>

  </div>
  </div>
  <div class="transfer-descr"> Вартiсть послуги переказу коштiв становить 1% при сумi переказу до 1 тисячi в доларовому еквiвалентi або 0,5% при сумi переказу бiльше 1 тисячi в доларовому еквiвалентi.
  </div>
</div>


<?php

// connect JavaScript
add_action('wp_footer', 'contact_form_js', 99);


// JavaScript
function contact_form_js()
{
?>

  <script>
    jQuery(function($) {
      $('#count_button').click(function() {


        // $("input[name=count]").click( function () { // Событие нажатия на кнопку "Расчёт"
          var china_sum = $("input[name=china_sum]").val();

        // leave numbers only
        china_sum = china_sum.replace(/[^0-9.]/g, '');

        let dol_sum, dol_service, dol_amount;
        let hrn_sum, hrn_service, hrn_amount;
        let service_rate;

        let dol_china_rate = cny_val;
        let dol_hrn_rate = usd_val;

        dol_sum = china_sum / dol_china_rate;

        if ((dol_sum >= 1000) && (dol_sum <= 1999.99)) {
        dol_china_rate = cny_val_1k;
        } else if ((dol_sum >= 2000) && (dol_sum <= 2999.99)) {
        dol_china_rate = cny_val_2k;
        } else if ((dol_sum >= 3000) && (dol_sum <= 4999.99)) {
        dol_china_rate = cny_val_3k;
        } else if ((dol_sum >= 5000) && (dol_sum <= 9999.99)) {
        dol_china_rate = cny_val_5k;
        } else if ((dol_sum >= 10000) && (dol_sum <= 14999.99)) {
        dol_china_rate = cny_val_10k;
        } else if (dol_sum >= 15000) {
        dol_china_rate = 6.25;
        }


        //count sum-transfer in dol
        dol_sum = parseFloat((china_sum / dol_china_rate).toFixed(2));

        //count sum-transfer in hrn
        hrn_sum = parseFloat((dol_sum * dol_hrn_rate).toFixed(2));

        //count service-rate
        if (dol_sum <= 999.99) {
            service_rate = 0.01;
        } else {
            service_rate = 0.005;
        }

        //count service-cost
        dol_service = parseFloat((dol_sum * service_rate).toFixed(2));
        dol_amount = parseFloat((dol_sum + dol_service).toFixed(2)) + ' USD';
        dol_service = dol_service + ' USD';

        hrn_service = parseFloat((hrn_sum * service_rate).toFixed(2));
        hrn_amount = parseFloat((hrn_sum + hrn_service).toFixed(2)) + ' UAH';
        hrn_sum = hrn_sum + ' UAH';
        hrn_service = hrn_service + ' UAH';

        china_sum = china_sum + ' CNY';


        if (dol_sum <= 14999.99) {
            dol_sum = dol_sum + ' USD';
        } else if (dol_sum >= 15000) {
            dol_sum = dol_service = dol_amount = hrn_sum = hrn_service = hrn_amount = dol_china_rate = 'уточнюється за запитом';
        }

     

        $("input[name=china_sum]").val(china_sum);
        $("input[name=dol_china_rate]").val(dol_china_rate);

        $("input[name=dol_sum]").val(dol_sum);
        $("input[name=dol_service]").val(dol_service);
        $("input[name=dol_amount]").val(dol_amount);

        $("input[name=hrn_sum]").val(hrn_sum);
        $("input[name=hrn_service]").val(hrn_service);
        $("input[name=hrn_amount]").val(hrn_amount);


        // $.ajax({
        //     url: 'http://wordpress.ua/myajax.php',
        //     type: 'POST',
        //     data: {
        //         count,
        //         count2
        //     },
        //     // data: {text: $('#textarea').val()},
        //     beforeSend: function( xhr ) {
        //         $( '#misha_button' ).text( 'Загрузка, 5 сек...' );	
        //     },
        //     success: function( data ) {
        //         $( '#misha_button' ).text( 'Отправить' );	
        //         alert( data );
        //     }
        // });

        $("#transfer-table").show();
        return false;

      });
    });

    // remove old value in input area
    jQuery(function($) {
        $(document).ready(function () {
            $("#china_sum").click(function(){
                $("#china_sum").val(null);
            })
        });
    });

  </script>

<?php

}
