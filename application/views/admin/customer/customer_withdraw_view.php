                                            <?php foreach($withdraw_data as $val) : ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $val->username; ?></td>
                                                    <td><?php echo $val->payment_method; ?></td>
                                                    <td><?php echo $val->account_number; ?></td>
                                                    <td><?php echo $val->payment_type; ?></td>
                                                    <td><?php echo $val->from_no; ?></td>
                                                    <!-- <td><?php //echo get_user_current_balance($val->c_user_id); ?></td> -->
                                                    <td><?php echo $val->amount; ?></td>
                                                    <td><?php echo $val->created_at; ?></td>
                                                    <td>
                                                        <?php
                                                            $date = strtotime($val->updated_at);
                                                            echo ($date != '-62170005700') ? $val->updated_at : "";
                                                        ?>
                                                    </td>
                                                    <td>

                                                        <?php if($val->status=='PENDING') { ?>
                                                            <span class="badge badge-warning">pending</span>
                                                        <?php } else if($val->status=='SUCCESS') { ?>
                                                            <span class="badge badge-success">success</span>
                                                        <?php } else if($val->status=='REJECT') { ?>
                                                            <span class="badge badge-danger">reject</span>
                                                        <?php } else if($val->status=='CANCEL') { ?>
                                                            <span class="badge badge-danger">User Cancel</span>
                                                        <?php } ?>

                                                    </td>
                                                    <td style="width:150px !important">
                                                        <?php if($val->status=='PENDING') : ?>
                                                            <a class="btn btn-success btn-xs withdraw-status-modal" data-id="<?php echo $val->id; ?>" data-toggle="modal" data-target="#approveWithdrawModal" title="Approve Withdraw">
                                                                Confirm
                                                            </a>

                                                            <a style="margin-top:10px" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to reject this withdraw?');" href="<?= base_url('reject_withdraw/'.$val->id); ?>">
                                                                Reject
                                                            </a>
                                                        <?php endif; ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>