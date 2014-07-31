{$this->beginContent('//layouts/main')}
<script type="text/javascript">
    $(document).ready(function(){
        $("body").removeClass().addClass("html not-front delivery-city");
    });
</script>
{$content}
{$this->endContent()}