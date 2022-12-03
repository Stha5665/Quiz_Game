<table class="table">
  <thead>
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Player Name</th>
      <th scope="col">Total Question</th>
      <th scope="col">Score</th>
      <th scope="col">Correct/Attempted/Total</th>
      <th scope="col">Date Time</th>
      <th scope="col">Total Time taken</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($quizPlayed as $data){
    ?>
            <tr>
            <th scope="row"><?=$data['player_id']?></th>
            <td><?=$data['player_name']?></td>
            <td>5</td>
            <td><?=$data['score']?></td>
            <td><?=$data['evaluation']?></td>
            <td><?=$data['played_date_time']?></td>
            <td><?=$data['total_time_taken']?></td>
            <td><button type="button" class="btn btn-primary preview" value="<?=$data['player_id']?>">PREVIEW</button></td>
            </tr>

    <?php
        }
    ?>
  </tbody>
</table>

