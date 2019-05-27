<?php

$amazon_total = $payout_total = $profit_total = 0;
$payout_table = '';

foreach($preparedPay['jobs'] as $job){
    $amazon_total += $job['total'];
    $payout_total += $job['amount'];
    $profit = $job['total'] - $job['amount'];
    $profit_total += $profit;
    $payout_table .= $this->Html->tableCells([
        [
            $job['job_id'],
            $job['order_id'],
            $job['technician_id'],
            $job['total'] . ' / '.$amazon_total,
            $job['amount'] . ' / ' . $payout_total,
            $profit . ' / '. $profit_total,
        ]
    ]);
}


?>

<div class="tlhtJobs index large-10 medium-12 columns content">
    <div class="box no-shadow ">
        <div class="box-header bg-transparent">
            <!-- tools box -->
            <div class="pull-right box-tools"> <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i>
                                    </span> <span class="box-btn" data-widget="remove"><i class="icon-cross"></i>
                                    </span> </div>
            <h3 class="box-title"><i class="ti-view-list"></i>
                <?php echo $this->Html->link('Pay Period', ['controller' => 'pay_periods', 'action' => 'index', '_full' => true]);?>
                <strong><?php echo $updatedPayPeriod['start_date'] . ' - ' . $updatedPayPeriod['end_date']; ?></strong>
            </h3> </div>
        <!-- /.box-header -->
        <div class="box-body">
            <!-- modal -->
            <div class="row">

                <div class="large-12 columns">
                    <table cellpadding="0" cellspacing="0">
                        <?php

                        echo $this->Html->tableHeaders(['Ends', 'Status', 'Completed', 'Cancelled', 'Pending', 'Payment(s)']);

                            echo $this->Html->tableCells([
                                [
                                    $updatedPayPeriod['end_date'],
                                    $updatedPayPeriod['status'],
                                    $updatedPayPeriod['jobs_completed'],
                                    $updatedPayPeriod['jobs_cancelled'],
                                    $updatedPayPeriod['jobs_pending'],
                                    $this->Html->link('PAY', ['controller'=>'payments', 'action' => 'auto', $updatedPayPeriod['id']])
                                ]
                            ]);
                        ?>
                    </table>

                    <h4 style="margin-bottom:0;">Payouts:</h4>
                    <table>
                        <?php
                            $pay_total = 0;
                        echo $this->Html->tableHeaders(['Contractor', 'Amount', 'FEE']);
                        foreach($preparedPay['technicians_total'] as $name => $total){

                            $pay_total += $total;
                            echo $this->Html->tableCells([
                                [
                                    $name,
                                    $total,
                                    ''
                                ]
                            ]);
                        }
                        echo $this->Html->tableCells([
                            [
                                    'Total',
                                $pay_total,
                                $preparedPay['profit_total'],
                            ]
                        ]);
                        ?>
                    </table>


                    <h4 style="margin-bottom:0;">Pay Table</h4>
                    <table>
                    <?php

                    echo $this->Html->tableHeaders(['Job', 'Order', 'Technician', 'Total', 'Amount', 'Profit']);

                    echo $payout_table;

                    echo $this->Html->tableCells([
                        [
                            '',
                            '',
                            '',
                            $amazon_total,
                            $payout_total,
                            $profit_total,
                        ]
                    ]);

                    ?>
                    </table>

                </div>
            </div>
            <!-- end Modal -->
        </div>
        <!-- /.box-body -->
    </div>
</div>