    <!-- Footer -->
    <footer style="background-color: #000;overflow: hidden;position:relative;bottom:0;left:0;right:0;">
        <div class="container align-items-center">
            <p class="text-muted pt-3">Copyright &copy; Real Estate WebApp. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/2112736a95.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".nav-item").on('click', function() {
                $(".nav-item").removeClass("activeItem");
                $(this).addClass("activeItem");
            })

            $(function() {
                $("#example1").DataTable();
            });

        })
    </script>
</body>

</html>