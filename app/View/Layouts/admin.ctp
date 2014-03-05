                            <?php
                            // Si admin
                            if($this->Session->read('Auth.User.role') >= 90):
                            ?>
                               <li>
                                <?php echo $this->Html->link(
                                        'Admin Users',
                                        array(
                                            'controller' => 'users',
                                            'action' => 'admin_index',
                                            'full_base' => true
                                        )
                                    );?>
                                </li>   

                                <li>
                                <?php echo $this->Html->link(
                                        'Admin Bacs',
                                        array(
                                            'controller' => 'bacs',
                                            'action' => 'admin_index',
                                            'full_base' => true
                                        )
                                    );?>
                                </li>  
                                                             
                                <li>
                                <?php echo $this->Html->link(
                                        'Admin Commandes',
                                        array(
                                            'controller' => 'orders',
                                            'action' => 'admin_index',
                                            'full_base' => true
                                        )
                                    );?>
                                </li>

                               <li>
                                <?php echo $this->Html->link(
                                        'Admin Deliveries',
                                        array(
                                            'controller' => 'deliveries',
                                            'action' => 'admin_index',
                                            'full_base' => true
                                        )
                                    );?>
                                </li>   
                            <?php
                            endif;
                            ?>

                            
        <?= $this->Session->flash();?>
        <?= $this->Session->flash('auth');?>

      	<?= $this->fetch('content'); ?>