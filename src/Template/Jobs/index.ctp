<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */

$query = $this->request->getQuery();

$current_url = DS . $this->request->getParam('controller') . DS . $this->request->getParam('action') . DS;

$filter_status['all'] = $filter_order['all'] = $filter_tech['all'] = 'All';
foreach($job_statuses as $status){
    $filter_status[$status['job_status']] = $status['job_status'];
}

foreach($product_order_statuses as $status => $stat){
    $filter_order[$status] = $stat;
}

foreach($technicians as $technician => $tech){
    $filter_tech[$tech] = $tech;
}

?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions'); ?></li>
        <li><?= $this->Html->link(__('Import'), ['controller'=>'content','action' => 'index']) ?></li>
        <li><?php echo $this->Html->link(__('New Job'), ['action' => 'add']); ?></li>
    </ul>
</nav>
<div class="jobs index large-10 medium-9 columns content">
    <h3><?php echo __('Jobs'); ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?php echo $this->Paginator->sort('job_status'); ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('appointment_date'); ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('product_order_id'); ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('product_order_status'); ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('technician'); ?></th>
                <th scope="col"><?php echo $this->Paginator->sort('ship_city'); ?></th>
                <th>Image</th>
                <th scope="col" class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <tr>
                <th scope="col">
                    <?php echo $this->Form->select('filter_status', $filter_status,[
                            'id'=>'filter_status',
                            'class'=>'filter-dropdown',
                            'data-key'=>'job_status',
                            'default' => (isset($query['job_status']) ?$query['job_status']:'all')
                    ]);?>
                    </th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">
                    <?php echo $this->Form->select('filter_prod', $filter_order, [
                        'id'=>'filter_prod',
                        'data-key'=>'product_status',
                        'class'=>'filter-dropdown',
                        'default' => (isset($query['product_status']) ?$query['product_status']:'all')
                    ]);?></th>
                <th scope="col">
                    <?php echo $this->Form->select('filter_tech', $filter_tech,[
                        'id'=>'filter_tech',
                        'class'=>'filter-dropdown',
                        'data-key'=>'technician',
                        'default' => (isset($query['technician']) ?$query['technician']:'all')
                    ]);?>
                </th>
                <th scope="col">Filter</th>
                <th></th>
                <th scope="col">Filter</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job):

                if($job->id == 175)
                {
                    debug($job);
                    die();
                }

                ?>
            <tr>

                <td><?php echo h($job->job_status); ?></td>
                <td><?php echo h($job->appointment_date); ?></td>

                <td><?php echo $job->product_order_id; ?></td>
                <td><?php echo h($job->product_order_status); ?></td>
                <td><?php echo explode('-', $job->technician)[0]; ?></td>
                <td><?php echo h($job->ship_city); ?></td>
                <td><?php
                    $url = '/products/'.$job->product_asin.'.jpg';
                    echo $this->Html->image($url);?></td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), ['action' => 'view', $job->id]); ?>
                    <?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]); ?>
                    <!-- AMAZON URL https://www.amazon.com/s?k=B01ETS3EJM -->
                    <?php echo $this->Html->link(__('PRODUCT'), 'https://www.amazon.com/s?k='. $job->product_asin,['target'=>'_blank']); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?php echo $this->Paginator->first('<< ' . __('first')); ?>
            <?php echo $this->Paginator->prev('< ' . __('previous')); ?>
            <?php echo $this->Paginator->numbers(); ?>
            <?php echo $this->Paginator->next(__('next') . ' >'); ?>
            <?php echo $this->Paginator->last(__('last') . ' >>'); ?>
        </ul>
        <p><?php echo $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]); ?></p>
    </div>
</div>
<script>
    $( document ).ready(function() {
        $('.filter-dropdown').change(function () {
            var key = $(this).attr('data-key');
            changeUrlQuery(key, this.value);
        });

    });

    function changeUrlQuery(key, value){

        var newParam = key + '=' + value;
        var qs = '';
        var href = window.location.href.substring(0, window.location.href.indexOf('?'));
        if(!href){
            href = window.location.href;
            qs = '';
        } else {
            qs = window.location.href.substring(window.location.href.indexOf('?') + 1, window.location.href.length);
        }


        console.log(qs);

        if (qs.indexOf(key + '=') == -1) {
            if(qs.length > 2) qs = qs + '&';
            qs = qs + newParam;

        }
        else {
            var start = qs.indexOf(key + "=");
            var end = qs.indexOf("&", start);
            if (end == -1) {
                end = qs.length;
            }
            var curParam = qs.substring(start, end);
            qs = qs.replace(curParam, newParam);
        }

        window.location.replace(href + '?' + qs);

    };


</script>

