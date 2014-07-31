{$this->beginContent('//layouts/main')}
<script type="text/javascript">
    $(document).ready(function(){
        $("body").removeClass().addClass("html not-front detailed-ordering-page");
    });
</script>
{$content}
{$this->endContent()}