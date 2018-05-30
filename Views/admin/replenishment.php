<div class="container">
    <div class="control-block" <?php if($param['user_type']==="User") echo "style='display: none;'"?>>
        <form action="/replenishment/replenish" method="post" class="form-add-item">
            <header class="form-head">
                <p>Пополнить баланс абонента</p>
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
                    <input type="text" name="replenishment_sum" required>
                </label>
            </div>
            <div class="form-elem">
                <button class="btn" type="submit">Начислить</button>
            </div>
        </form>
    </div>
    <div class="select-block">
        <table class="select-list">
            <caption>Журнал начислений</caption>
            <tr>
                <th>Номер абонента</th>
                <th>Дата списания</th>
                <th>Сумма списания</th>

            </tr>
            <?php if(!empty($data['data_replenishment'])){
                $data_replenishment=$data['data_replenishment'];
                foreach ($data_replenishment as $key=>$value){?>
                    <tr>
                        <td><?=$data_replenishment[$key]['subscriber_phone']?></td>
                        <td><?=$data_replenishment[$key]['replenishment_date']?></td>
                        <td><?=$data_replenishment[$key]['replenishment_sum']?></td>
                    </tr>
                <?php }}?>
        </table>
    </div>
</div>
