<div class="container">
    <div class="select-block">
        <table class="select-list">
            <caption>Журнал использования интернет трафика</caption>
            <tr>
                <th>Телефон абонента</th>
                <th>Количество трафика (мб)</th>
                <th>Дата использования</th>
            </tr>
            <?php if(!empty($data)){
                foreach ($data as $key=>$value){?>
                    <tr>
                        <td><?=$data[$key]['subscriber_phone']?></td>
                        <td><?=$data[$key]['traffic']?></td>
                        <td><?=$data[$key]['use_date']?></td>
                    </tr>
                <?php }}?>
        </table>
    </div>
</div>