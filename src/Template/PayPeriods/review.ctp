<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayPeriod $payPeriod
 */




?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions') ?></li>
        <li><?php echo $this->Html->link(__('Auto Pay Period'), ['controller'=>'payments', 'action' => 'auto', $payPeriod->id]) ?> </li>
    </ul>
</nav>

<div class="payPeriods view large-10 medium-10 columns content">
    <h3><?php echo h($payPeriod->start_date) . ' - '. h($payPeriod->end_date) ?></h3>

    <button class="button" data-open="exampleModal1">Close Pay Period</button>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?php echo __('Id') ?></th>
            <td><?php echo $payPeriod->id ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Status') ?></th>
            <td><?php echo h($payPeriod->status) ?></td>
        </tr>

        <tr>
            <th scope="row"><?php echo __('Contractors Used') ?></th>
            <td><?php echo $this->Number->format($payPeriod->contractors_used) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Jobs Completed') ?></th>
            <td><?php echo $this->Number->format($payPeriod->jobs_completed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Jobs Cancelled') ?></th>
            <td><?php echo $this->Number->format($payPeriod->jobs_cancelled) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Jobs Pending') ?></th>
            <td><?php echo $this->Number->format($payPeriod->jobs_pending) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Calculated') ?></th>
            <td><?php echo h($payPeriod->calculated) ?></td>
        </tr>

    </table>
    <h3><?php echo h('Jobs'); ?></h3>
    <table>
        <thead>
        <tr>
            <th scope="col"><?php echo $this->Paginator->sort('appointment_date'); ?></th>
            <th scope="col"><?php echo $this->Paginator->sort('technician'); ?></th>
            <th scope="col"><?php echo $this->Paginator->sort('service_order_id'); ?></th>
            <th scope="col">Net</th>
            <th>Expense(s)</th>
            <th>Profit</th>
            <th scope="col" class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($jobs as $job):
            $profit = 0;

            $split = explode(" ", $job->technician);
            $tech = $split[1];
            // Set Total if not set
            if(isset($job->payments[0]['total'])){
                $contractors[$tech]->total += (isset($contractors[$tech]->total))?$job->payments[0]['total']:0;
            }

            // Add Total
            $contractors[$tech]->job_total += 1;

            ?>
            <tr>

                <td><?php echo h($job->appointment_date); ?></td>
                <td><?php echo explode('-', $job->technician)[0]; ?></td>
                <td><?php echo $job->service_order_id; ?></td>
                <td>
                    <?php if(!empty($job['payments'])){?>

                        <?php foreach($job['payments'] as $payment):
                            $profit += str_replace('$', '', $payment->total);

                            ?>
                            <div><?php echo $payment->total;?></div>
                        <?php endforeach; ?>
                    <?php } else {
                        // No Payment File
                    } ?>
                </td>
                <td>
                    <?php if(!empty($job['account_payments'])) {
                        $payments_total = 0;
                        foreach ($job['account_payments'] as $payment):
                            $payments_total += $payment->amount;
                        endforeach;
                        $profit = $profit - $payments_total;
                        echo '$' . $payments_total;
                    }

                    ?>
                </td>
                <?php $class = $profit < 0 ? 'danger': ''; ?>
                <td ><div class="<?php echo $class; ?>"><?php echo $profit;?></div></td>
                <td class="actions">
                    <?php echo  $this->Html->link(__('View'), ['controller'=>'jobs', 'action' => 'view', $job->id]) ?>
                    <?php if(!empty($job['payments'])){echo ' | ' .$this->Html->link(__('Make Payment'), ['controller'=>'account-payments', 'action' => 'add', $job->id]);}  ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php // Prepare the model results

$td_rows = '';

    foreach ($contractors as $contractor){

        $td_rows .= $this->Html->tableCells([
            $contractor->first_name . ' ' . $contractor->last_name,
                    $contractor->job_total,
                    $contractor->total
        ]);

    }


?>


<div class="reveal" id="exampleModal1" data-reveal>
    <span><a href="#" class="close-button" data-close aria-label="Close modal" type="button">X</a></span>
    <h3><?php echo h($payPeriod->start_date) . ' - '. h($payPeriod->end_date) ?></h3>

    <table>
        <thead>
        <td>Name</td>
        <td>Jobs</td>
        <td>Payment</td>
        </thead>
        <tbody>
        <?php echo $td_rows;?>
        </tbody>
    </table>

    <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>

    <?php echo  $this->Form->create($payPeriod, ['type' => 'post']); ?>
    <fieldset>
        <legend><?php echo  __('Close Pay Period') ?></legend>
        <?php
        echo $this->Form->hidden('id');
        echo $this->Form->hidden('business_id');
        echo $this->Form->control('status', ['options'=>array('closed'=>'closed')]);
        ?>
        <?php echo $this->Form->control('confirmed', ['value'=>'confirmed', 'type'=>'checkbox','label'=>'Confirm Payments to Contractors']);?>

    </fieldset>
    <?php echo  $this->Form->button(__('Close Pay Period'), ['id'=>'submitModalBtn','class'=>'my-modal-form']) ?>
    <?php echo  $this->Form->end() ?>

</div>

<script>

    $("#submitModalBtn").click( function(event)
        {

            if($("#confirmed").prop('checked')){

            } else {
                alert('You must Confirm Payments to Contractors to Close');
               event.preventDefault();
            }
        }
    );

</script>