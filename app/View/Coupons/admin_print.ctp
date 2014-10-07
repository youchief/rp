<?php $this->layout = 'print'?>
<div class="people index">
        <h2>Gagnant du concours <?php echo $people[0]['Coupon']['name'] ?></h2>
        <table cellpadding="0" cellspacing="0" class="table">
                <tr>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>NPA</th>
                        <th>Ville</th>
                        <th>Email</th>

                </tr>
                <?php foreach ($people as $person): ?>
                        <tr>
                                <td><?php echo h($person['Person']['firstname']); ?>&nbsp;</td>
                                <td><?php echo h($person['Person']['lastname']); ?>&nbsp;</td>
                                <td><?php echo h($person['Person']['address']); ?>&nbsp;</td>
                                <td><?php echo h($person['Person']['zip']); ?>&nbsp;</td>
                                <td><?php echo h($person['Person']['city']); ?>&nbsp;</td>
                                <td><?php echo h($person['Person']['email']); ?>&nbsp;</td>

                        </tr>
                <?php endforeach; ?>
        </table>
        
     
</div>
