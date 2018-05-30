<div class="container">
    <div class="select-block">
        <table class="select-list">
            <caption>Журнал звонков абонентов</caption>
            <tr>
                <th>Телефон абонента</th>
                <th>Номер вызова</th>
                <th>Начало вызова</th>
                <th>Конеч вызова</th>
            </tr>
            <?php if(!empty($data)){
                foreach ($data as $key=>$value){?>
                    <tr>
                        <td><?=$data[$key]['subscriber_phone']?></td>
                        <td><?=$data[$key]['call_phone']?></td>
                        <td><?=$data[$key]['call_start']?></td>
                        <td><?=$data[$key]['call_finish']?></td>
                    </tr>
                <?php }}?>
        </table>
    </div>
</div>