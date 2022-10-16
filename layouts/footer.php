
    
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/profile.js"></script>
    <script src="js/alertify.min.js"></script>

    <script>
        <?php if(isset($_SESSION['success'])) : ?>
            alertify.set('notifier','position', 'top-right');
            alertify.success('<?= $_SESSION['success'] ?>');
        <?php endif; unset($_SESSION['success']); ?>
        // alertify.success('Current position : ' + alertify.get('notifier','position'));
    </script>
</body>
</html>