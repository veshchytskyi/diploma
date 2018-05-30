<div class="container">
    <div class="control-block" <?php if($param['user_type']==="User") echo "style='display: none;'"?>>
        <form action="/tariffs/add_tariff" method="post" class="form-add-item">
            <header class="form-head">
                <p>Добавить</p>
            </header>
            <div class="form-elem">
                <label>
                    Название тарифа:
                    <input type="text" name="tariff_name" required>
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Стоимость звонков грн/мин:
                    <input type="text" name="call_price" required>
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Стоимость sms грн/шт:
                    <input type="text" name="sms_price" required>
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Стоимость интернета грн/мб:
                    <input type="text" name="internet_price" required>
                </label>
            </div>
            <div class="form-elem">
                <button class="btn" type="submit">Отправить</button>
            </div>
        </form>
    </div>
    <div class="select-block">
        <table class="select-list">
            <caption>Тарифы</caption>
            <tr>
                <th>Название</th>
                <th>Звонки грн/мин</th>
                <th>SMS грн/шт</th>
                <th>Интернет грн/мб</th>
                <?php if($param['user_type']==="Administrator"){?>
                    <th>Функции</th>
                <?php } ?>
            </tr>
            <?php if(!empty($data)){
                foreach ($data as $key=>$value){?>
                    <tr>
                        <td><?=$data[$key]['tariff_name']?></td>
                        <td><?=$data[$key]['call_price']?></td>
                        <td><?=$data[$key]['sms_price']?></td>
                        <td><?=$data[$key]['internet_price']?></td>
                        <?php if($param['user_type']==="Administrator"){?>
                            <td><a href="/tariffs/edit_form/<?=$data[$key]['tariff_id']?>">Edit</a>/<a href="/tariffs/delete_tariffs/<?=$data[$key]['tariff_id']?>">Delete</a></td>
                        <?php } ?>
                    </tr>
                <?php }}?>
        </table>
    </div>
</div>