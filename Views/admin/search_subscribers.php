<div class="container">
    <div class="control-block">
        <form action="/subscribers/search" method="get" class="form-add-item">
            <header class="form-head">
                <p>Поиск абонента</p>
            </header>
            <div class="form-elem">
                <label>
                    Телефон:
                    <input type="text" name="subscriber_phone" >
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Имя:
                    <input type="text" name="subscriber_name" >
                </label>
            </div>
            <div class="form-elem">
                <label>
                  Область:
                  <select name="subscriber_country">
                      <?php if(!empty($data['data_country'])){
                          $data_country=$data['data_country'];
                          foreach ($data_country as $key=>$value){?>
                              <option value="<?=$data_country[$key]['country_id']?>"><?=$data_country[$key]['country_name']?></option>
                          <?php }}?>
                  </select>
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Город:
                    <input type="text" name="subscriber_city" >
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Баланс:
                    <input type="text" name="subscriber_balance" >
                </label>
            </div>
            <div class="form-elem">
                <label>
                    Тариф:
                    <select name="tariff_id" >
                        <?php if(!empty($data['data_tariff'])){
                            $data_tariff=$data['data_tariff'];
                            foreach ($data_tariff as $key=>$value){?>
                                <option value="<?=$data_tariff[$key]['tariff_id']?>"><?=$data_tariff[$key]['tariff_name']?></option>
                            <?php }}?>
                    </select>
                </label>
            </div>
            <div class="form-elem">
                <input type="hidden" value="search" name="search">
                <button class="btn" type="submit">Найти</button>
            </div>
        </form>
    </div>
    <div class="select-block">
        <?php if(!empty($data['data_subscriber'])){ ?>
        <table class="select-list">
            <caption>Абоненты</caption>
            <tr>
                <th>Телефон</th>
                <th>Имя</th>
                <th>Страна</th>
                <th>Город</th>
                <th>Баланс</th>
                <th>Тариф</th>
                <?php if($param['user_type']==="Administrator"){?>
                    <th>Функции</th>
                <?php } ?>
            </tr>
                <?php
                $data_subscriber=$data['data_subscriber'];
                foreach ($data_subscriber as $key=>$value){?>
                    <tr>
                        <td><?=$data_subscriber[$key]['subscriber_phone']?></td>
                        <td><?=$data_subscriber[$key]['subscriber_name']?></td>
                        <td><?=$data_subscriber[$key]['country_name']?></td>
                        <td><?=$data_subscriber[$key]['subscriber_city']?></td>
                        <td><?=$data_subscriber[$key]['subscriber_balance']?></td>
                        <td><?=$data_subscriber[$key]['tariff_name']?></td>
                        <?php if($param['user_type']==="Administrator"){?>
                            <td><a href="/subscribers/edit_form/<?=$data_subscriber[$key]['subscriber_id']?>">Edit</a>/<a href="/subscribers/delete_subscriber/<?=$data_subscriber[$key]['subscriber_id']?>">Delete</a></td>
                        <?php } ?>
                    </tr>
                <?php }}?>
        </table>
    </div>


</div>
