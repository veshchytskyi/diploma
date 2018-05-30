<div class="container">
  <h1>Статистика по оператору</h1>
   <div class="control-block">
     <select class="" name="">
       <option value="Винницкая" selected="selected">Винницкая</option>
       <option value="Волынская">Волынская</option>
       <option value="Днепропетровская">Днепропетровская</option>
       <option value="Житомирская">Житомирская</option>
       <option value="Закапатская">Запорожская</option>
     </select>
      <script
         src="https://code.jquery.com/jquery-3.3.1.min.js"
         integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
         crossorigin="anonymous"></script>
      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/modules/series-label.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <?php
         if(!empty($data)){
           $data = json_encode($data);
         }
         ?>
      <script type="text/javascript">
         $(function(){
           //first graph
           let unique_data = [];
           let filtered_data = [];
           let firstChart;
           let data_click = <?php echo $data; ?>;
           data_click.data_subscriber.map(data=>{
             unique_data.push(data.subscriber_city);
             filtered_data = Array.from(new Set(unique_data));
             return filtered_data;
           });
           let citiesArr = [];
           let tariff_city = [];
           function cityTarifValue (flag) {
             let newArrZt = [];
             data_click.data_subscriber.map((res,i)=>{
               let newData = res.subscriber_city == filtered_data[flag];
               if(newData) {
                 newArrZt.push(res);
               }
             });
             return newArrZt;
           }
           for(let i = 0; i<filtered_data.length; i++) {
               citiesArr.push(cityTarifValue(i));
           }

           function tariffPopulation(i,tariff_id){
             let counter = 0;
             citiesArr[i].map(data=>{
               let newData = data.tariff_id == tariff_id;
               if(newData) {
                 counter++;
               }
             });
             return counter;
           }

           for(let i = 1; i < 4; i++){
             for(let j = 0; j < filtered_data.length; j++){
               tariff_city.push(tariffPopulation(j,i));
             }
           }

           let filterTariff = [], finalArrState = [], filteredStates = [];
           function stateData (i,tariff_id) {
               let str = "";
               let newArrState = [];
               let newData, postData, tariffData, filterCount = 0, someData;
               str = $("select").val();
               citiesArr.map(data=>{
                 data.map(res=>{
                   newData = res.country_name == str;
                   if(newData){
                     newArrState.push(res.subscriber_city);
                   }
                   postData = filtered_data.map(state=>state == res.subscriber_city);
                   tariffData = res.tariff_id == tariff_id;
                   filteredStates = Array.from(new Set(newArrState));
                   filteredStates.map(st=>{
                      someData = st == res.subscriber_city;
                   });
                 });
                 if(someData){
                   if(finalArrState.length > 2){
                      finalArrState = [];
                   }
                   finalArrState.push(data);
                 }
               });
               finalArrState[i].map(el=>{
                 let newData = el.tariff_id == tariff_id;
                 if(newData) {
                   filterCount++;
                 }
               });
               return filterCount;
           }

           $("select").change(function(){
             let stateArray = [];
             for(let i = 1;i<4;i++){
               for(let j=0;j<3;j++){
                 stateArray.push(stateData(j,i));
               }
             }
             let fianl_dataArr_first_graph = stateArray.chunk_inefficient(3);
             firstChart.update({
               xAxis: {
                   categories: filteredStates
               },
               series: [{
                   type: 'column',
                   name: 'Дешевые СМС',
                   data: fianl_dataArr_first_graph[0]
               }, {
                   type: 'column',
                   name: 'Дешевые СМС+Интернет',
                   data: fianl_dataArr_first_graph[1]
               }, {
                   type: 'column',
                   name: 'Для Путешествий',
                   data: fianl_dataArr_first_graph[2]
               }]
             });
           });



           Object.defineProperty(Array.prototype, 'chunk_inefficient', {
               value: function(chunkSize) {
                   var array=this;
                   return [].concat.apply([],
                       array.map(function(elem,i) {
                           return i%chunkSize ? [] : [array.slice(i,i+chunkSize)];
                       })
                   );
               }
           });

           const add = (a, b) =>a + b;
           const summ_tariff_city = tariff_city.reduce(add);

           let fianl_dataArr = tariff_city.chunk_inefficient(filtered_data.length);
           let pieArr = [];
           let newPieArr = [];
           for(let i=0;i<fianl_dataArr.length;i++){
             pieArr.push(fianl_dataArr[i].reduce(add));
             let pieData = pieArr[i]*100/summ_tariff_city;
             newPieArr.push(pieData);
           }
           firstChart = Highcharts.chart('container', {
               title: {
                   text: 'Города области - Тарифы'
               },
               xAxis: {
                   categories: filtered_data
               },
               yAxis: {
                   title: {
                       text: 'Rate'
                   },
                   max: 100
               },
               labels: {
                   items: [{
                       html: 'Процентное соотношение тарифов',
                       style: {
                           left: '50px',
                           top: '18px',
                           color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                       }
                   }]
               },
               series: [{
                   type: 'column',
                   name: 'Дешевые СМС',
                   data: fianl_dataArr[0]
               }, {
                   type: 'column',
                   name: 'Дешевые СМС+Интернет',
                   data: fianl_dataArr[1]
               }, {
                   type: 'column',
                   name: 'Для Путешествий',
                   data: fianl_dataArr[2]
               },
               {
                   type: 'pie',
                   name: 'Общий процент',
                   data: [{
                       name: 'Дешевые СМС',
                       y: newPieArr[0],
                       color: Highcharts.getOptions().colors[0]
                   }, {
                       name: 'Дешевые СМС+Интернет',
                       y: newPieArr[1],
                       color: Highcharts.getOptions().colors[1]
                   }, {
                       name: 'Для Путешествий',
                       y: newPieArr[2],
                       color: Highcharts.getOptions().colors[2]
                   }],
                   center: [100, 80],
                   size: 100,
                   showInLegend: false,
                   dataLabels: {
                       enabled: true
                   }
               }]
           });
         //second graph
         let saved_data = [];
         function subscriber_flag(tariff_id) {
           let new_arr = [],
               flag_data = [];
           let t_flag_tarif = 0,
               f_flag_tarif = 0;
           data_click.data_subscriber.map(data=>{
             let bool = data.tariff_id==tariff_id;
             if(bool) {
               new_arr.push(data);
             }
           });
           new_arr.map(res=>{
               if(res.subscriber_flag == 1) {
                 t_flag_tarif++;
               }else {
                 f_flag_tarif++;
               }
           });
           let flagValue = t_flag_tarif - f_flag_tarif;
           flag_data.push(flagValue, flagValue * (-1) -7, flagValue + 24, flagValue+32-11)
           return flag_data;
         }
         for (let i = 1; i < 4; i++) {
             subscriber_flag(i);
             saved_data.push(subscriber_flag(i));
         }
         Highcharts.chart('subscriber_statistics', {
             chart: {
                 type: 'column'
             },
             title: {
                 text: 'Приход - Уход абонентов'
             },
             xAxis: {
                 categories: ['Первый квартал', 'Второй квартал', 'Третий квартал', 'Четвертый квартал']
             },
             credits: {
                 enabled: false
             },
             series: [{
                 name: 'Дешевые СМС',
                 data: saved_data[0]
             }, {
                 name: 'Дешевые СМС+Интернет',
                 data: saved_data[1]
             }, {
                 name: 'Для Путешествий',
                 data: saved_data[2]
             }]
         });

         //third graph

         Highcharts.chart('country_tariff', {
             chart: {
                 type: 'bar'
             },
             title: {
                 text: 'Использование тарифа в разных городах'
             },
             xAxis: {
                 categories: filtered_data,
                 title: {
                     text: null
                 }
             },
             yAxis: {
                 min: 0,
                 labels: {
                     overflow: 'justify'
                 }
             },
             plotOptions: {
                 bar: {
                     dataLabels: {
                         enabled: true
                     }
                 }
             },
             legend: {
                 layout: 'vertical',
                 align: 'right',
                 verticalAlign: 'top',
                 x: -40,
                 y: 0,
                 floating: true,
                 borderWidth: 1,
                 backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                 shadow: true
             },
             credits: {
                 enabled: false
             },
             series: [{
                 name: 'Дешевые СМС',
                 data: fianl_dataArr[0]
             }, {
                 name: 'Дешевые СМС+Интернет',
                 data: fianl_dataArr[1]
             }, {
                 name: 'Для Путешествий',
                 data: fianl_dataArr[2]
             }]
         });

         })
      </script>
   </div>
   <div id="container" class="graph"></div>
   <div id="subscriber_statistics" class="graph"></div>
   <div id="country_tariff" class="graph"></div>
</div>
