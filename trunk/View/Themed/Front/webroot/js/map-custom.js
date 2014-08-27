$(function(){

    var areas = [
        {"code": 1 , "name":"北海道",         "color":"#ca93ea", "hoverColor":"#e0b1fb", "prefectures":[1]},
        {"code": 2 , "name":"東北",           "color":"#a7a5ea", "hoverColor":"#d6d4fd", "prefectures":[2,3,4,5,6,7]},
        {"code": 3, "name": "北関東",         "color": "#84b0f6", "hoverColor": "#c1d8fd", "prefectures": [8, 9, 10] },
        {"code": 4, "name": "南関東",         "color": "#84b0f6", "hoverColor": "#c1d8fd", "prefectures": [11, 12, 13, 14] },
        {"code": 5, "name": "甲信越",         "color": "#52d49c", "hoverColor": "#93ecc5", "prefectures": [15, 19, 20] },
        {"code": 6, "name": "北陸",          "color": "#52d49c", "hoverColor": "#93ecc5", "prefectures": [16, 17, 18] },
        {"code": 7, "name":"東海",           "color":"#77e18e", "hoverColor":"#aff9bf", "prefectures":[21,22,23,24]},
        {"code": 8, "name":"山陰・山陽",     "color":"#f2db7b", "hoverColor":"#f6e8ac", "prefectures":[25,26,27,28,29,30]},
        {"code": 9, "name":"近畿",           "color":"#f9ca6c", "hoverColor":"#ffe5b0", "prefectures":[31,32,33,34,35]},
        {"code": 10, "name":"四国",           "color":"#fbad8b", "hoverColor":"#ffd7c5", "prefectures":[36,37,38,39]},
        {"code": 11, "name":"九州",           "color":"#f7a6a6", "hoverColor":"#ffcece", "prefectures":[40,41,42,43,44,45,46]},
        {"code": 12, "name":"沖縄",           "color":"#ea89c4", "hoverColor":"#fdcae9", "prefectures":[47]}
    ];

    $("#map").japanMap(
        {
            areas  : areas,
            selection : "prefecture",
            borderLineWidth: 0.25,
            drawsBoxLine : false,
            movesIslands : true,
            showsAreaName : true,
            width: 370,
            //height: 242,
            font : "MS Mincho",
            fontSize : 12,
            fontColor : "areaColor",
            fontShadowColor : "black",
            onSelect:function(data){
                window.location = '/filters/pref/' + data.code;
            },
            onHover:function(data){
                $("#text").html(data.area.name + "　" + data.name);
                $("#text").css("background", data.area.color);
            }
        }
    );
});