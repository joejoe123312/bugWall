</div>

<!-- jQuery -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/mdb.min.js"></script>

<!-- Url ajax post requests -->
<?php
$Bugs = base_url() . "Bugs";
$tableChange = base_url() . "Bugs/tableChange";
$ajaxUpdateTable = base_url() . "Dashboard/ajaxUpdateTable";
$deleteBug = base_url() . "Dashboard/deleteBug";
?>
<!-- Url ajax post requests -->

<?php if (isset($currentBugsCount)) { ?>
    <script>
        //update dom table bugs
        function updateBugsTable() {
            $("#bugsTbody").load("http://localhost/bugWall/Dashboard/ajaxUpdateTable");
        }

        let state = {
            numRowBugs: 0,
            domCurrentBugsCount: "<?= $currentBugsCount ?>"
        };

        // update the bugs table when there is a change in num rows of bugs table
        $(document).ready(function() {
            setInterval(function() {
                let execCounter = state.counter;
                $.post("<?= $tableChange ?>", function(data) {
                    state.numRowBugs = data;
                });

                //exec this only once

                if (state.numRowBugs != state.domCurrentBugsCount) {

                    //execute change table
                    $("#bugsTbody").load("http://localhost/bugWall/Dashboard/ajaxUpdateTable");

                    //update the state
                    state.domCurrentBugsCount = state.numRowBugs;
                }


            }, 100);
        });
    </script>
<?php } ?>

<!-- Your custom scripts (optional) -->
<script type="text/javascript">
    $(document).ready(function() {

        //toggle dark mode and light mode
        $('#toggleDarkMode').click(function() {
            $('body').toggleClass("bg-dark");
            $('body').toggleClass("text-white");
            $('#dashboardTable').toggleClass("text-white");

            //change text 
            $(this).text($(this).text() == 'Dark mode' ? 'Light mode' : 'Dark mode');

        });

        //hide confirmatino modal insert


        //insert bug
        $('#reportBugForm').submit(function(event) {
            event.preventDefault();
            //--> get input data
            let bugDescription = $('#insertDescription').val();
            let bugUrl = $('#insertBugUrl').val();
            $.post("<?= $Bugs ?>", {
                url: bugUrl,
                description: bugDescription
            }, function() {
                $('#modalLoginForm').modal('toggle');
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Bug reported successfully',
                    showConfirmButton: false,
                    timer: 1500
                });

                //update table
                updateBugsTable();

            });
        });

        //delete a bug
        $('#bugsTbody').delegate('.deleteBug', 'click', function() {
            alert('hello world');
            //get the id of the bug
            let bug_id = $(this).val();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("<?= $deleteBug ?>", {
                        bugId: bug_id
                    }, function() {
                        updateBugsTable();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                    });
                }
            })

        });
    });
</script>

</body>

</html>