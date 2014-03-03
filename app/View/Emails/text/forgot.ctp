
Merci de vous êtes inscrit sur Dezordre

email : <?= $email;?>


lien d'activation : <?= $this->Html->url(array('controller' => 'users', 'action' => 'forgot', $id, $token), true); ?>

