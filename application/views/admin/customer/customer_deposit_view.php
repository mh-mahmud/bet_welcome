                                            <?php foreach($get_data as $val) : ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $val->created_at; ?></td>
                                                    <td><?php echo $val->username; ?></td>
                                                    <td><?php echo $val->user_phone; ?></td>
                                                    <td><?php echo $val->admin_account; ?></td>
                                                    <td><?php echo $val->amount; ?></td>
                                                    <td><?php echo $val->transaction_id; ?></td>
                                                    <td><?php echo $val->payment_method; ?></td>
                                                    <td>
                                                        <?php if($val->status=='PENDING') { ?>
                                                            <span class="badge badge-warning">pending</span>
                                                        <?php } else if($val->status=='SUCCESS') { ?>
                                                            <span class="badge badge-success">success</span>
                                                        <?php } else if($val->status=='CANCEL') { ?>
                                                            <span class="badge badge-danger">reject</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if($val->status=='PENDING') : ?>
                                                            <a class=" btn btn-primary btn-xs" onclick="return confirm('Are you sure to confirm this deposit?');" href="<?= base_url('confirm_deposit/'.$val->id); ?>">
                                                                Confirm
                                                            </a>

                                                            <a style="margin-top:10px" class="deposit-reject-modal btn btn-danger btn-xs" data-id="<?php echo $val->id; ?>" data-coin="<?php echo $val->amount; ?>" data-toggle="modal" data-target="#rejectDepositModal">
                                                                Reject
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>