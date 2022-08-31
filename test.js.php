  //console.log($("#nws_years_options_id").val());	
    //       $('.nws_search_template').hide();
    $(".nws_search_template").hide();
    $.ajax({
      url: "https://console.autooutletllc.com/autominiapp_search/getting_ajax__years.php",
      type: "POST",
      data: {},
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        var DATA_resp = JSON.parse(data);
        data_for_Updating = DATA_resp.data;
        if (DATA_resp.status == "Success") {
          //console.log(DATA_resp.data);
          $("#nws_years_options_id").html("");
          $("#nws_make_options_id").html("");
          $("#nws_model_options_id").html("");
          $("#nws_years_options_id").append(`<option value="">select</option>`);
          $("#nws_make_options_id").append(`<option value="">select</option>`);
          $("#nws_model_options_id").append(`<option value="">select</option>`);

          $(".nws_search_template").show();

          DATA_resp.data.forEach(function(element) {
            $("#nws_years_options_id").append(
              `<option value="` + element[0] + `">` + element[0] + `</option>`
            );
          });
          if ($("#nws_years_options_id").val() == "") {
            $("#nws_make_options_id").html("");
            $("#nws_make_options_id").append(`<option value="">Select</option>`);

            $("#nws_model_options_id").html("");
            $("#nws_model_options_id").append(`<option value="">Select</option>`);

            $("#nws_make_options_id").attr("disabled", "disabled");
            $("#nws_model_options_id").attr("disabled", "disabled");
          }
          ////////////////////////////////////////////////
        } else {
          $(".nws_search_template").show();
          $("#nws_years_options_id").html("");
          $("#nws_years_options_id").append(`<option value="">Select</option>`);

          $("#nws_make_options_id").html("");
          $("#nws_make_options_id").append(`<option value="">Select</option>`);

          $("#nws_model_options_id").html("");
          $("#nws_model_options_id").append(`<option value="">Select</option>`);
        }
      },
      error: function(e) {
        $(".nws_search_template").show();
        $("#nws_years_options_id").html("");
        $("#nws_years_options_id").append(`<option value="">Select</option>`);

        $("#nws_make_options_id").html("");
        $("#nws_make_options_id").append(`<option value="">Select</option>`);

        $("#nws_model_options_id").html("");
        $("#nws_model_options_id").append(`<option value="">Select</option>`);
      },
    });

    //       $("#nws_years_options_id").on("change", function () {
    $("#nws_years_options_id").change(function() {
      if ($("#nws_years_options_id :selected").val() != "") {
        $("#nws_make_options_id").prop("disabled", false);

        $("#nws_make_options_id").html("");
        $("#nws_make_options_id").append(`<option value="">Select</option>`);
        $("#nws_model_options_id").html("");
        $("#nws_model_options_id").append(`<option value="">Select</option>`);

        $.ajax({
          url: "https://console.autooutletllc.com/autominiapp_search/getting_ajax__make.php",
          type: "POST",
          data: {
            fyear___: $("#nws_years_options_id :selected").val(),
          },
          // contentType: false,
          // cache: false,
          // processData: false,
          success: function(data) {
            var DATA_resp = JSON.parse(data);
            data_for_Updating = DATA_resp.data;
            if (DATA_resp.status == "Success") {
              //  console.log(DATA_resp.data);
              DATA_resp.data.forEach(function(element) {
                $("#nws_make_options_id").append(
                  `<option value="` + element[0] + `">` + element[0] + `</option>`
                );
              });
              if ($("#nws_years_options_id").val() == "") {
                $("#nws_model_options_id").html("");
                $("#nws_model_options_id").append(
                  `<option value="">Select</option>`
                );

                $("#nws_model_options_id").attr("disabled", "disabled");
              }
              /////////////////////////////////////////////////////////////////////
            } else {
              $("#nws_make_options_id").html("");
              $("#nws_make_options_id").append(`<option value="">Select</option>`);

              $("#nws_model_options_id").html("");
              $("#nws_model_options_id").append(`<option value="">Select</option>`);
              $("#nws_model_options_id").attr("disabled", "disabled");
            }
          },
          error: function(e) {
            $("#nws_make_options_id").html("");
            $("#nws_make_options_id").append(`<option value="">Select</option>`);

            $("#nws_model_options_id").html("");
            $("#nws_model_options_id").append(`<option value="">Select</option>`);
            $("#nws_model_options_id").attr("disabled", "disabled");
          },
        });
      } else {
        $("#nws_make_options_id").html("");
        $("#nws_make_options_id").append(`<option value="">Select</option>`);

        $("#nws_model_options_id").html("");
        $("#nws_model_options_id").append(`<option value="">Select</option>`);
        $("#nws_model_options_id").attr("disabled", "disabled");
      }
    });

    $("#nws_make_options_id").on("change", function() {
      if ($("#nws_make_options_id :selected").val() != "") {
        $("#nws_model_options_id").prop("disabled", false);

        $("#nws_model_options_id").html("");
        $("#nws_model_options_id").append(`<option value="">Select</option>`);

        $.ajax({
          url: "https://console.autooutletllc.com/autominiapp_search/getting_ajax__model.php",
          type: "POST",
          data: {
            fyear___: $("#nws_years_options_id :selected").val(),
            fmake___: $("#nws_make_options_id :selected").val(),
          },
          // contentType: false,
          // cache: false,
          // processData: false,
          success: function(data) {
            var DATA_resp = JSON.parse(data);
            data_for_Updating = DATA_resp.data;
            if (DATA_resp.status == "Success") {
              //  console.log(DATA_resp.data);
              DATA_resp.data.forEach(function(element) {
                $("#nws_model_options_id").append(
                  `<option value="` + element[0] + `">` + element[0] + `</option>`
                );
              });
              if ($("#nws_make_options_id").val() == "") {
                $("#nws_model_options_id").html("");
                $("#nws_model_options_id").append(
                  `<option value="">Select</option>`
                );

                $("#nws_model_options_id").attr("disabled", "disabled");
              }
              /////////////////////////////////////////////////////////////////////
            } else {
              $("#nws_model_options_id").html("");
              $("#nws_model_options_id").append(`<option value="">Select</option>`);
              $("#nws_model_options_id").attr("disabled", "disabled");
            }
          },
          error: function(e) {
            $("#nws_make_options_id").html("");
            $("#nws_make_options_id").append(`<option value="">Select</option>`);

            $("#nws_model_options_id").html("");
            $("#nws_model_options_id").append(`<option value="">Select</option>`);
            $("#nws_model_options_id").attr("disabled", "disabled");
          },
        });
      } else {
        $("#nws_model_options_id").html("");
        $("#nws_model_options_id").append(`<option value="">Select</option>`);
        $("#nws_model_options_id").attr("disabled", "disabled");
      }
    });
    
    
    
    var products_gotWith_search = ``;
    $(".nws_sarch_form_submit").on("click", function() {
      window.location = "https://autospartoutlet.com/pages/nws-search?years=" + $("#nws_years_options_id").val() + "&make=" + $("#nws_make_options_id").val() + "&model=" + $("#nws_model_options_id").val();

      // if (window.location.href == "https://autospartoutlet.com/" || window.location.href == "https://autospartoutlet.com") {
      //   if (window.location.search != '?years=&make=&model=') {
      //     if (window.location.pathname == '/pages/nws-search' && window.location.search != '') {
      //       var $nws_year_1 = (((window.location.search).replace("?", "").split('&')[0]).split('=')[1]).toLowerCase();
      //       var $nws_make_2 = ((((window.location.search).replace("?", "").split('&')[1]).split('=')[1]).toLowerCase());
      //       var $nws_model_3 = ((((window.location.search).replace("?", "").split('&')[2]).split('=')[1]).toLowerCase());
      //       //  alert(".nws_search_products." + decodeURI($nws_year_1) + "." + (decodeURI($nws_make_2)).replace(" ", ".") + "." + (decodeURI($nws_model_3)).replace(" ", "."));
      //       //  var $d = $(".nws_search_products." + $nws_year_1 + "." + $nws_make_2 + "." + $nws_model_3).css("display","block");
      //       $(".nws_search_products." + decodeURI($nws_year_1) + "." + (decodeURI($nws_make_2)).replace(" ", ".") + "." + (decodeURI($nws_model_3)).replace(" ", ".")).show();
      //     }

      //     window.location = "https://autospartoutlet.com/pages/nws-search?years=" + $("#nws_years_options_id").val() + "&make=" + $("#nws_make_options_id").val() + "&model=" + $("#nws_model_options_id").val();

      //   } else {
      //     window.location = "https://autospartoutlet.com/pages/nws-search";
      //   }
      // } else {
      //   if (window.location.search != '?years=&make=&model=') {
      //     if (window.location.pathname == '/pages/nws-search' && window.location.search != '') {
      //       var $nws_year_1 = (((window.location.search).replace("?", "").split('&')[0]).split('=')[1]).toLowerCase();
      //       var $nws_make_2 = ((((window.location.search).replace("?", "").split('&')[1]).split('=')[1]).toLowerCase());
      //       var $nws_model_3 = ((((window.location.search).replace("?", "").split('&')[2]).split('=')[1]).toLowerCase());
      //       //  alert(".nws_search_products." + decodeURI($nws_year_1) + "." + (decodeURI($nws_make_2)).replace(" ", ".") + "." + (decodeURI($nws_model_3)).replace(" ", "."));
      //       //  var $d = $(".nws_search_products." + $nws_year_1 + "." + $nws_make_2 + "." + $nws_model_3).css("display","block");
      //       $(".nws_search_products." + decodeURI($nws_year_1) + "." + (decodeURI($nws_make_2)).replace(" ", ".") + "." + (decodeURI($nws_model_3)).replace(" ", ".")).show();
      //     }
      //   }
      // }

    });




    $(window).ready(function() {
      $('.nws_search_products').show();
      $('.search_product_grid').html('');
      $('.search_product_grid').html("No product Found.");
      // var products_gotWith_search = '';
      if (window.location.search == '?years=&make=&model=') {
        window.location = "https://autospartoutlet.com/pages/nws-search";
        $('.search_product_grid').html("No product Found.");
      }

      if (window.location.pathname == '/pages/nws-search' && window.location.search != '') {
        // $(".nws_search_products").hide();
        if (window.location.search != '?years=&make=&model=') {
          $(".nws_search_products." + (decodeURI((((window.location.search).replace("?", "").split('&')[0]).split('=')[1]).toLowerCase())).replace(" ", ".") + "." + (decodeURI((((window.location.search).replace("?", "").split('&')[1]).split('=')[1]).toLowerCase())).replace(" ", ".") + "." + (decodeURI((((window.location.search).replace("?", "").split('&')[2]).split('=')[1]).toLowerCase())).replace(" ", ".")).show();

          ///////////////////////////////////////////////////////////////////////
          fetch(window.Shopify.routes.root + "search/suggest.json?q=" + (decodeURI((((window.location.search).replace("?", "").split('&')[0]).split('=')[1]).toLowerCase())) + " " + (decodeURI((((window.location.search).replace("?", "").split('&')[1]).split('=')[1]).toLowerCase())) + " " + (decodeURI((((window.location.search).replace("?", "").split('&')[2]).split('=')[1]).toLowerCase())) + "&resources[type]=product&resources[options][unavailable_products]=hide&resources[options][fields]=title,product_type,variants.title,body,product_type")
            .then((response) => response.json())
            .then((suggestions) => {
              const productSuggestions = suggestions.resources.results.products;

              if (productSuggestions.length > 0) {
                // const firstProductSuggestion = productSuggestions[0];
                // console.log( productSuggestions );
                var products_gotWith_search = '';
                for (let index = 0; index < productSuggestions.length; index++) {
                  // $(".nws_search_products ."+productSuggestions[index].id).show();
                  jQuery.getJSON(window.Shopify.routes.root + "products/" + productSuggestions[index].handle + '.js', function(product) {
                    // console.log(product);
                    // $(".nws_search_products." + product['variants'][0].sku).show();
                    // $(".nws_search_products." + product['variants'][0].id).show();
                    // console.log( ('<a class="nws_search_products" href="'+ window.location.origin+ product["url"] +'"><img src="'+ "https://"+ product["featured_image"]  +'"><h2>'+ product["title"] +'</h2></a>') );
                    products_gotWith_search = products_gotWith_search + ('<a class="nws_search_products" href="'+ window.location.origin+ product["url"] +'"><img src="'+ "https://"+ product["featured_image"]  +'"><h2>'+ product["title"] +'</h2></a>');
                    $('.search_product_grid').html(products_gotWith_search);
                    $('.search_product_grid').show();
                    $('.nws_search_products').show();
                  });
                }
                // console.log(products_gotWith_search);
              }else{
                $('.search_product_grid').html("No product Found.");
              }
            });

          ///////////////////////////////////////////////////////////////////////
        }
      }
    });
    
    
