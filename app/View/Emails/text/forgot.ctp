
Merci de vous êtes inscrit sur Dezordre

email : <?= $email;?>


lien d'activation : <?= $this->Html->url(array('controller' => 'users', 'action' => 'password', $id, $token), true); ?>

