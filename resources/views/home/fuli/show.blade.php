<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>我的福利</title>
    <style>
        #lottery {
            width: 570px;
            height: 510px;
            margin: 0px auto;
            border: 4px solid #ba1809;
        }

        #lottery table {
            background-color: yellow;
        }

        #lottery table td {
            position: relative;
            width: 190px;
            height: 170px;
            text-align: center;
            color: #333;
            font-index: -999
        }

        #lottery table td img {
            display: block;
            width: 190px;
            height: 160px;
        }

        #lottery table td a {
            width: 190px;
            height: 190px;
            display: block;
            text-decoration: none;
            background: url(./choujiang/lottery1.jpg) no-repeat top center;
        }

        #lottery table td a:hover {
            background-image: url(./choujiang/lottery2.jpg);
        }

        #lottery table td.active .mask {
            display: block;
        }

        .mask {
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            background-color: rgba(252, 211, 4, 0.5);
            display: none;
        }
    </style>
</head>

<body class="keBody">
    <!--效果html开始-->
    <div id="lottery">
        <table border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td class="lottery-unit lottery-unit-0"><img src="{{$yhj[0]['yhj_pic']}}">
                    <div class="mask"></div>
                    <div>劵码:{{$yhj[0]['yhj_id']}}</div>
                </td>
                <td class="lottery-unit lottery-unit-1"><img src="{{$yhj[1]['yhj_pic']}}">
                    <div class="mask"></div>
                    <div>劵码:{{$yhj[1]['yhj_id']}}</div>
                </td>
                <td class="lottery-unit lottery-unit-2"><img src="{{$yhj[2]['yhj_pic']}}">
                    <div class="mask"></div>
                    <div>劵码:{{$yhj[2]['yhj_id']}}</div>
                </td>
            </tr>
            <tr>
                <td class="lottery-unit lottery-unit-7"><img src="{{$yhj[3]['yhj_pic']}}">
                    <div class="mask"></div>
                    <div>劵码:{{$yhj[3]['yhj_id']}}</div>
                </td>
                <td><a href="#"></a></td>
                <td class="lottery-unit lottery-unit-3"><img src="{{$yhj[4]['yhj_pic']}}">
                    <div class="mask"></div>
                    <div>劵码:{{$yhj[4]['yhj_id']}}</div>
                </td>
            </tr>
            <tr>
                <td class="lottery-unit lottery-unit-6"><img src="{{$yhj[5]['yhj_pic']}}">
                    <div class="mask"></div>
                    <div>劵码:{{$yhj[5]['yhj_id']}}</div>
                </td>
                <td class="lottery-unit lottery-unit-5"><img src="{{$yhj[6]['yhj_pic']}}">
                    <div class="mask"></div>
                    <div>劵码:{{$yhj[6]['yhj_id']}}</div>
                </td>
                <td class="lottery-unit lottery-unit-4"><img src="{{$yhj[7]['yhj_pic']}}">
                    <div class="mask"></div>
                    <div>劵码:{{$yhj[7]['yhj_id']}}</div>
                </td>
            </tr>
        </table>
    </div>
    <script src="http://www.jq22.com/jquery/jquery-latest.js"></script>
    <script type="text/javascript">
    var lottery = {
        index: -1, //当前转动到哪个位置，起点位置
        count: 8, //总共有多少个位置
        timer: 0, //setTimeout的ID，用clearTimeout清除
        speed: 1, //初始转动速度
        times: 0, //转动次数
        cycle: {{$yhj[1]['cycle']}}, //转动基本次数：即至少需要转动多少次再进入抽奖环节
        prize: {{$yhj[1]['prize']}}, //中奖位置
        init: function(id) {
            if ($("#" + id).find(".lottery-unit").length > 0) {
                $lottery = $("#" + id);
                $units = $lottery.find(".lottery-unit");
                this.obj = $lottery;
                this.count = $units.length;
                $lottery.find(".lottery-unit-" + this.index).addClass("active");
            };
        },
        roll: function() {
            var index = this.index;
            var count = this.count;
            var lottery = this.obj;
            $(lottery).find(".lottery-unit-" + index).removeClass("active");
            index += 1;
            if (index > count - 1) {
                index = 0;
            };
            $(lottery).find(".lottery-unit-" + index).addClass("active");
            this.index = index;
            return false;
        },
        stop: function(index) {
            this.prize = index;
            return false;
        }
    };

    function roll() {
        lottery.times += 1;
        lottery.roll(); //转动过程调用的是lottery的roll方法，这里是第一次调用初始化
        if (lottery.times > lottery.cycle + 10 && lottery.prize == lottery.index) {
            clearTimeout(lottery.timer);
            lottery.prize = -1;
            lottery.times = 0;
            click = false;
        } else {
            if (lottery.times < lottery.cycle) {
                lottery.speed -= 10;
            } else if (lottery.times == lottery.cycle) {
                var index = Math.random() * (lottery.count) | 0; //中奖物品通过一个随机数生成
                lottery.prize = index;
            } else {
                if (lottery.times > lottery.cycle + 10 && ((lottery.prize == 0 && lottery.index == 7) || lottery.prize == lottery.index + 1)) {
                    lottery.speed += 110;
                } else {
                    lottery.speed += 20;
                }
            }
            if (lottery.speed < 40) {
                lottery.speed = 40;
            };
            //console.log(lottery.times+'^^^^^^'+lottery.speed+'^^^^^^^'+lottery.prize);
            lottery.timer = setTimeout(roll, lottery.speed); //循环调用
        }
        return false;
    }

    var click = false;

    window.onload = function() {
        lottery.init('lottery');
        $("#lottery a").click(function() {
            if (click) { //click控制一次抽奖过程中不能重复点击抽奖按钮，后面的点击不响应
                return false;
            } else {
                lottery.speed = 100;
                roll(); //转圈过程不响应click事件，会将click置为false
                click = true; //一次抽奖完成后，设置click为true，可继续抽奖
                return false;
            }
        });
    };
    </script>
    <!--效果html结束-->

</body>

</html>