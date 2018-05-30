<div class="container">
    <div class="control-block">
        <form action="/tariffs/edit_tariff/<?=$data['tariff_id']?>" method="post" class="form-add-item">
            <header class="form-head">
                <p>Редактировать</p>
            </header>

            <div class="form-elem">
                <label>
                    Название тарифа:
                    <input type="text" name="tariff_name" value="<?=$data['tariff_name']?>" required>
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Стоимость звонков грн/мин:
                    <input type="text" name="call_price" value="<?=$data['call_price']?>" required>
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Стоимость sms грн/шт:
                    <input type="text" name="sms_price" value="<?=$data['sms_price']?>" required>
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Стоимость интернета грн/мб:
                    <input type="text" name="internet_price" value="<?=$data['internet_price']?>" required>
                </label>
            </div>
            <div class="form-elem">
                <button class="btn" type="submit">Отправить</button>
            </div>
        </form>
    </div>
</div>