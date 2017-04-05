var arrId = new Array();
$(document).ready(function() {
    var h2 = $("article h2");
    if (h2.size() == 0) {
        var hi = $('.yxdme_catalog').parent().parent('.widget').hide();
    }
    for (var index = 0; index < h2.size(); index++) {
        var idValue = h2.eq(index).attr("id");
        if (idValue == undefined) {
            h2.eq(index).attr("id", index);
            arrId[index] = index;
        } else {
            arrId[index] = idValue;
        }
        $(".yxdme_catalog dl").append('<dt class="yxd_catalog_dt"><a href=#' + arrId[index] + '>' + h2.eq(index).text() + '</a></dt>');
        yxdme_getH3(index);
    }
})
function yxdme_getH3(h2Id) {
    var arr = new Array();
    var h3 = $("article h2").eq(h2Id).nextUntil("h2", "h3");
    for (var i = 0; i < h3.size(); i++) {
        var idValueH3 = h3.eq(i).attr("id");
        if (idValueH3 == undefined) {
            h3.eq(i).attr("id", "h2ID_" + i);
            arr[i] = i;
        } else {
            arr[i] = idValueH3;
        }
        $(".yxdme_catalog dl").append('<dd class="yxd_catalog_dd">&nbsp;&nbsp;&nbsp;&nbsp;<a href=#' + arr[i] + '>' + h3.eq(i).text() + '</a></dt>');
    }
}
