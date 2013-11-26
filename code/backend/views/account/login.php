<script>
// 防iframe嵌套
if (window.parent !== window.self) {
        document.write = '';
        window.parent.location.href = window.self.location.href;
        setTimeout(function () {
                document.body.innerHTML = '';
        }, 0);
}
</script>
<?php Resource::loadCss( 'admin_login' );?>
