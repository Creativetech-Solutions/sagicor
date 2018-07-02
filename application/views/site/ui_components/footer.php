<footer class="footer">

    <p>&copy; 2016 Sunlinc. All rights reserved. <span class="pull-right">

            <?php
            if(isset($this->data['loggedinuser']) && !empty($this->data['loggedinuser'])){
                if(intval($this->data['loggedinuser']->userlevel) === 9){
                    echo '<a href="'.base_url().'admin/"> Admin Panel</a> | <a href="admin-panel/reg-list.php">Registration Manager</a> | ';
                }
                echo '<a href="'.base_url().'login/logout">Logout</a>';
            }

            ?>


    </span></p>

</footer>


</div> <!-- /container -->



<script type="text/javascript" src="<?=base_url();?>assets/site/js/jquery.gridrotator.js"></script>
<script type="text/javascript">
    $(function() {

        $( '#ri-grid' ).gridrotator( {
            w1024			: {
                rows	: 3,
                columns	: 6
            },
            w768			: {
                rows	: 3,
                columns	: 7
            },
            w480			: {
                rows	: 3,
                columns	: 5
            },
            w320			: {
                rows	: 2,
                columns	: 4
            },
            w240			: {
                rows	: 2,
                columns	: 3
            }
        } );

    });
</script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="<?=base_url();?>assets/site/js/bootstrap/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/site/js/bootstrap/bootstrap-formhelpers.min.js"></script>

</body>

</html>