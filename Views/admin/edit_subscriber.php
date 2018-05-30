<div class="container">
    <div class="control-block">
        <form action="/subscribers/edit_subscriber/<?=$data['data_subscriber']['subscriber_id']?>" method="post" class="form-add-item">
            <header class="form-head">
                <p>Редактировать</p>
            </header>
            <div class="form-elem">
                <label>
                    Телефон:
                    <input type="text" name="subscriber_phone" value="<?=$data['data_subscriber']['subscriber_phone']?>" required>
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Имя:
                    <input type="text" name="subscriber_name" value="<?=$data['data_subscriber']['subscriber_name']?>" required>
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Страна:
                    <input type="text" name="subscriber_country" value="<?=$data['data_subscriber']['subscriber_country']?>" required>
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Город:
                    <input type="text" name="subscriber_city" value="<?=$data['data_subscriber']['subscriber_city']?>" required>
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Тариф:
                    <select name="tariff_id" required>
                        <?php if(!empty($data['data_tariff'])){
                            $data_tariff=$data['data_tariff'];
                            foreach ($data_tariff as $key=>$value){?>
                                <option value="<?=$data_tariff[$key]['tariff_id']?>"><?=$data_tariff[$key]['tariff_name']?></option>
                            <?php }}?>
                    </select>
                </label>
            </div>
            <div class="form-elem">
                <button class="btn" type="submit">Сохранить</button>
            </div>
        </form>
    </div>
</div>
