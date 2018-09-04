<?php
extract($_POST);

if (!isset($view) && empty($view)) {
    header("location:" . site_url());
}
?>
<!DOCTYPE html>
<html>
    <?php $this->load->view('includes/head'); ?>
    <body class="">

        <?php
        if (isset($dados)) {
            $this->load->view($view, $dados);
        } else {
            $this->load->view($view);
        }
        ?>

        <?php //$this->load->view('includes/footer');  ?>

    </div>
    <!--            //Scripts-->
    <?php //$this->load->view('includes/scripts');  ?>
    <!-- //Custom Script -->
    <?php
    $this->load->view(lcfirst($this->uri->segment(1) . "/" . strtolower($this->uri->segment(2)) . "/custom"));
    ?>
</body>
</html>