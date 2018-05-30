<div class="container">
    <div class="control-block" <?php if($param['user_type']==="User") echo "style='display: none;'"?>>
        <form action="/write_off/add_write_off" method="post" class="form-add-item">
            <header class="form-head">
                <p>Списать с баланса абонента</p>
            </header>
            <div class="form-elem">
                <label>
                    Анбонент:
                    <select name="subscriber_id" required>
                        <?php if(!empty($data['data_subscriber'])){
                            $data_subscriber=$data['data_subscriber'];
                            foreach ($data_subscriber as $key=>$value){?>
                                <option value="<?=$data_subscriber[$key]['subscriber_id']?>"><?=$data_subscriber[$key]['subscriber_phone']?></option>
                            <?php }}?>
                    </select>
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Сумма (грн):
                    <input type="text" name="write_off_sum" required>
                </label>
            </div>
            <div class="form-elem">
                <button class="btn" type="submit">Списать</button>
            </div>
        </form>
    </div>
    <div class="select-block">
        <table class="select-list">
            <caption>Журнал списания баланса</caption>
            <tr>
                <th>Номер абонента</th>
                <th>Дата списания</th>
                <th>Сумма списания</th>

            </tr>
            <?php if(!empty($data['data_write_off'])){
                $data_write_off=$data['data_write_off'];
                foreach ($data_write_off as $key=>$value){?>
                    <tr>
                        <td><?=$data_write_off[$key]['subscriber_phone']?></td>
                        <td><?=$data_write_off[$key]['write_off_date']?></td>
                        <td><?=$data_write_off[$key]['write_off_sum']?></td>
                    </tr>
                <?php }}?>
        </table>
    </div>
</div>
