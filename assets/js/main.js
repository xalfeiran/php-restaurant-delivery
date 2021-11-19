function addToCart(t) { var a = $("#menu_" + t).val();
    updateCart(t, $("#meal_" + t).text(), $("#price_" + t).val(), a), updateTotal() }

function newuser() { $(".register_user").removeClass("d-none"), $(".name").show(), $(".address").show() }

function olduser() { $(".register_user").removeClass("d-none"), $(".name").hide(), $(".address").hide() }

function updateCart(t, a, e, r) { if ((i = $("#cart_" + t)).length > 0) i.find(".qty").text(r), i.find(".price").text("$" + e * r);
    else { var i = $("#menu_" + t),
            c = '<div class="row mt-1" id="cart_' + t + '">';
        c += '<div class="col-sm-6">' + a + "</div>", c += '<div class="col-sm-2 qty">' + r + "</div>", c += '<div class="col-sm-2 price">$' + r * e + "</div>", c += '<div class="col-sm-2"><button type="button" class="btn btn-danger btn-sm" onclick="removeFromCart(' + t + ');">Remove</button></div>', c += "</div>"; var d = '<div class="row mt-1" id="cart_' + t + '">';
        d += '<div class="col-sm-6">' + a + "</div>", d += '<div class="col-sm-2 qty">' + r + "</div>", d += '<div class="col-sm-2 price">$' + r * e + "</div>", d += "</div>", $("#cart_modal").append(d), $("#cart").append(c) } }

function removeFromCart(t) { $("#cart_" + t).remove(), updateTotal() }

function updateTotal() { var t = 0;
    $("#cart").find("[id^=cart_]").each(function() { $(this).attr("id").replace("cart_", ""); var a = $(this).find(".price").text().replace("$", "");
        t += parseFloat(a) }), $("#mptotal").text("$" + t.toFixed(2)), t = 0, $("#cart_modal").find("[id^=cart_]").each(function() { $(this).attr("id").replace("cart_", ""); var a = $(this).find(".price").text().replace("$", "");
        t += parseFloat(a) }), $("#ptotal").text("$" + t.toFixed(2)) }

function checkout() { $("#cartModal").modal("show") }