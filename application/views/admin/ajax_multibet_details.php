<table class="table table-bordered ajax-tbl display" style="width:100%">
    <thead>
    <tr role="row">
        <th>Match</th>
        <th>Question</th>
        <th>Answer</th>
        <!-- <th>Amount</th> -->
        <th>Return Rate</th>
        <!-- <th>Return Amount [Won]</th> -->
        <th>Win/Loss</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($get_data as $val) : ?>
            <tr>
                <td style="width: 400px !important;text-align:justify;">
                  <?= $val->title; ?> => <?= $val->league_title; ?> <= <?= date("D j F Y, => g.iA", strtotime($val->ending_time)); ?>
                </td>
                <td><?= $val->match_option_title; ?></td>
                <td><?= $val->option_title; ?></td>
                <!-- <td><?php //echo $val->bet_coin; ?></td> -->
                <td><?= $val->option_coin; ?></td>
                <!-- <td><?php //echo $val->total_coin; ?></td> -->
                <td>
                    <?php if($val->bet_status=='MATCH_RUNNING') { ?>
                        <span class="badge badge-warning">pending</span>
                    <?php } else if($val->bet_status=='WIN') { ?>
                        <span class="badge badge-success">win</span>
                    <?php } else if($val->bet_status=='USER_CANCEL') { ?>
                        <span class="badge badge-danger">reject</span>
                    <?php } else if($val->bet_status=='CANCEL_ADMIN') { ?>
                        <span class="badge badge-danger">cancel</span>
                    <?php } else if($val->bet_status=='LOST') { ?>
                        <span class="badge badge-danger">lost</span>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
