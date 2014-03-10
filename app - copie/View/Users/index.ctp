    <div class="image_de_fond">
        <div class="container-fluid">
            <div class="row section">
                <p><br></p>
                <a href="<?= $this->Html->url(array('controller' => 'bacs', 'action' => 'index'));?>">
                <button type"submit"="" class="btn-lg" style="background-color:#65b7f2;color:white">Mes affaires en stock</button>
                </a>

                <p><br></p>

                <a href="<?= $this->Html->url(array('controller' => 'orders', 'action' => 'add'));?>">
                <button type"submit"="" class="btn-lg" style="background-color:#65b7f2;color:white">Commander des bacs</button>
                </a>

            </div>
        </div>
    </div>