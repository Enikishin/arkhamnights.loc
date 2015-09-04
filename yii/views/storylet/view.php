

<div>
  <div id="storylet_headline"><?=$model->storylet_name;?><br>
    
          <div id="storylet_creator_createdate">
          <table>
          <tr>
          <td id="storylet_h1">Статус:</td>
          <td><?= $model->StatusName ?></td>
     
          </tr>
          <tr>
          
          <td id="storylet_h1">Создатель:</td>
          <td id="storylet_h2"><?=$model->owner->username;?></td>
          </tr>
          <tr>
          <td id="storylet_h1">Создано:</td>
          <td id="storylet_h2"><?= Yii::$app->formatter->asDate($model->created_at) ; ?></td>
           </tr>
            <tr>
          <td id="storylet_h1">Система:</td>
          <td id="storylet_h2">sfsdf</td>
          </tr>
           </table>
          </div>
</div>

<div id="storylet_menu">
      <ul>
        <li>
      <a href=#>Вступить в игру</a>
        </li>
      
        <li>
      <a href=#>На страницу игры</a>
        </li>
        <li>
      <a href=#>Следить за игрой</a>
        </li>
        <li>
      <a href=#>Редактировать</a>
        </li>
      </div>

</div>
<div id="storylet_img">
<?='<img src=/images/'.$model->storylet_id.'/'.$model->storylet_img.'>';?>
</div>
<div class="body">
<p><?=$model->storylet_desc;?></p>
</div>
