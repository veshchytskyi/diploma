<div class="container">
    <div class="select-block">
        <table class="select-list">
            <caption>Журнал сообщений абонентов</caption>
            <tr>
                <th>Телефон абонента</th>
                <th>Отправлено на номер</th>
                <th>Время отпавления</th>
            </tr>
            <?php if(!empty($data)){
                foreach ($data as $key=>$value){?>
                    <tr>
                        <td><?=$data[$key]['subscriber_phone']?></td>
                        <td><?=$data[$key]['message_phone']?></td>
                        <td><?=$data[$key]['message_date']?></td>
                    </tr>
                <?php }}?>
        </table>
    </div>
</div>