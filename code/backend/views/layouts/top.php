<?php $this->beginContent('//layouts/root'); ?>
<script>
if (window.parent !== window.self) {
    document.write = '';
    window.parent.location.href = window.self.location.href;
    setTimeout(function () {
        document.body.innerHTML = '';
    }, 0);
}
</script>
<?php echo $content; ?>
<?php $this->endContent(); ?>