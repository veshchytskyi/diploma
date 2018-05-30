<div class="container" style=" padding: 30px; text-align: center;">
    <div class="control-block" style="display: inline-block;width: 30%; text-align: left;">
        <form action="/client/call" method="post" class="form-add-item">
            <header class="form-head">
                <p>Позвонить</p>
            </header>
            <div class="form-elem">
                <label>
                    Ваш номер:
                    <select name="subscriber_id" required>
                        <?php if(!empty($data)){
                            foreach ($data as $key=>$value){?>
                                <option value="<?=$data[$key]['subscriber_id']?>"><?=$data[$key]['subscriber_phone']?></option>
                            <?php }}?>
                    </select>
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Номер
                    <input type="text" name="call_phone" required>
                </label>
            </div>
            <div class="form-elem">
                <button class="btn" type="button" id="call-btn">Вызов</button>
            </div>
            <div class="form-elem">
                <input type="hidden" name="call_start" value="">
                <input type="hidden" name="call_finish" value="">
                <button class="btn" type="submit" id="call-finish-btn">Завершить звонок</button>
            </div>
        </form>
        <div class="timer"></div>
    </div>
    <div class="control-block" style="display: inline-block;width: 30%;text-align: left;">
        <form action="/client/message" method="post" class="form-add-item">
            <header class="form-head">
                <p>SMS</p>
            </header>
            <div class="form-elem">
                <label>
                    Ваш номер:
                    <select name="subscriber_id" required>
                        <?php if(!empty($data)){
                            foreach ($data as $key=>$value){?>
                                <option value="<?=$data[$key]['subscriber_id']?>"><?=$data[$key]['subscriber_phone']?></option>
                            <?php }}?>
                    </select>
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Номер
                    <input type="text" name="message_phone" required>
                </label>
            </div>

            <div class="form-elem">
                <button class="btn" type="submit">Отправить</button>
            </div>
        </form>
    </div>
    <div class="control-block" style="display: inline-block;width: 30%;text-align: left;">
        <form action="/client/internet" method="post" class="form-add-item">
            <header class="form-head">
                <p>Интернет</p>
            </header>
            <div class="form-elem">
                <label>
                    Ваш номер:
                    <select name="subscriber_id" required>
                        <?php if(!empty($data)){
                            foreach ($data as $key=>$value){?>
                                <option value="<?=$data[$key]['subscriber_id']?>"><?=$data[$key]['subscriber_phone']?></option>
                            <?php }}?>
                    </select>
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Трафик
                    <input type="text" disabled name="trafic" required>
                </label>
            </div>
            <div class="form-elem">
                <button class="btn" type="button" id="internet-btn">Начать</button>
            </div>
            <div class="form-elem">
                <input type="hidden" name="traffic" value="">
                <button class="btn" type="submit" id="internet-finish-btn">Завершить</button>
            </div>
        </form>
    </div>

</div>
<script>
    $(document).ready(function () {
        var flagCallStart=false,flagInternetStart=false;
        var interval1ID,interval2ID;
        $("#call-btn").on('click',function () {
            if(flagCallStart==false){
                var date=new Date();
                $("input[name='call_start']").val(date.toISOString());
                flagCallStart=true;
                var timer = 0;
                var hour = 0;
                var minute = 0;
                var second = 0;
                interval1ID=setInterval(function(){
                    ++timer;
                    hour   = Math.floor(timer / 3600);
                    minute = Math.floor((timer - hour * 3600) / 60);
                    second = timer - hour * 3600 - minute * 60;
                    if (hour < 10) hour = '0' + hour;
                    if (minute < 10) minute = '0' + minute;
                    if (second < 10) second = '0' + second;
                    $('.timer').html(hour + ':' + minute + ':' + second);
                }, 1000);
            }
        });
        $("#call-finish-btn").on('click',function () {
            flagCallStart=false;
            clearInterval(interval1ID);
            var date=new Date();
            $("input[name='call_finish']").val(date.toISOString());
        });
        $("#internet-btn").on('click',function () {
            if(flagInternetStart==false){
                flagInternetStart=true;
                var timer = 0;
                interval2ID=setInterval(function(){
                    ++timer;
                    $("input[name='trafic']").val(timer);
                    $("input[name='traffic']").val(timer);
                }, 1000);
            }
        });
        $("#internet-finish-btn").on('click',function () {
            flagCallStart=false;
            clearInterval(interval2ID);
        });

    });
</script>
