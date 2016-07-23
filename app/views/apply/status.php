<?php
    $application = new Applications();
    if( $application->data()->payment === '1' ){  ?>

        <p>Hello <b><?php echo $application->data()->name; ?></b>.Your Payment Confirmed.</P>
        <p>Click the following button to download admit card.</P>
        <a href="#" class="btn btn-primary">Download Admit Card</a>


<?php    }else{  ?>

        <p>Hello <b><?php echo $application->data()->name; ?></b>. Please Finish your payment for download admit card.</p>
        <a href="#" class="btn btn-primary btn-lg">Pay Online</a>
        <a href="<?php echo SITE_URL;?>/payment/instruction" class="btn btn-info btn-lg">Payment Instruction</a>

<?php    } ?>
