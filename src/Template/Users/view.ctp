<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions') ?></li>
        <li><?php echo $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?php echo $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?php echo $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?php echo $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?php echo h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?php echo __('Email') ?></th>
            <td><?php echo h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Password') ?></th>
            <td><?php echo h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Id') ?></th>
            <td><?php echo $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Created') ?></th>
            <td><?php echo h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Modified') ?></th>
            <td><?php echo h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?php echo __('Related Articles') ?></h4>
        <?php if (!empty($user->articles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?php echo __('Id') ?></th>
                <th scope="col"><?php echo __('User Id') ?></th>
                <th scope="col"><?php echo __('Title') ?></th>
                <th scope="col"><?php echo __('Slug') ?></th>
                <th scope="col"><?php echo __('Body') ?></th>
                <th scope="col"><?php echo __('Published') ?></th>
                <th scope="col"><?php echo __('Created') ?></th>
                <th scope="col"><?php echo __('Modified') ?></th>
                <th scope="col" class="actions"><?php echo __('Actions') ?></th>
            </tr>
            <?php foreach ($user->articles as $articles): ?>
            <tr>
                <td><?php echo h($articles->id) ?></td>
                <td><?php echo h($articles->user_id) ?></td>
                <td><?php echo h($articles->title) ?></td>
                <td><?php echo h($articles->slug) ?></td>
                <td><?php echo h($articles->body) ?></td>
                <td><?php echo h($articles->published) ?></td>
                <td><?php echo h($articles->created) ?></td>
                <td><?php echo h($articles->modified) ?></td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), ['controller' => 'Articles', 'action' => 'view', $articles->id]) ?>
                    <?php echo $this->Html->link(__('Edit'), ['controller' => 'Articles', 'action' => 'edit', $articles->id]) ?>
                    <?php echo $this->Form->postLink(__('Delete'), ['controller' => 'Articles', 'action' => 'delete', $articles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
